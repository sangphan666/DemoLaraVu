<?php

namespace JPTech\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JPTech\Users\Models\User;
use JPTech\Users\Repositories\Interfaces\RoleRepositoryInterface;
use JPTech\Users\Repositories\Interfaces\UserRepositoryInterface;
use JPTech\Users\Requests\StoreUserRequest;
use JPTech\Users\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private $view = 'users';
    private $module = 'users';
    /**
     * @var userRepositoryInterface
     */
    private $userRepository;
    /**
     * @var roleRepositoryInterface
     */
    private $roleRepository;
    /**
     * @var httpStatusSucess
     */
    protected $httpStatusSucess = "200";
    /**
     * @var httpStatusFail
     */
    protected $httpStatusFail = "404";

    /**
     * UserController constructor.
     * @param userRepositoryInterface $userRepository
     * @param roleRepositoryInterface $roleRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', auth()->user());
        $module = $this->module;
        $view = $this->view;
        $search = [];
        $search['role'] = $request->role;
        $search['title'] = $request->search;
        $status = \Arr::wrap($request->status);

        $users = $this->userRepository->all();
        $roles = $this->roleRepository->all();

        return response()->json([
            'messages' => ([
                'code' => $this->httpStatusSucess,
                'msg' => 'Succesfully',
            ]),
            'data' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', auth()->user());
        $view = $this->view;
        $module = $this->module;
        $roles = $this->roleRepository->all();

        return view('admin.' . $view . '.create', compact('roles', 'module', 'request', 'view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $validattion
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', auth()->user());
        $view = $this->view;
        $module = $this->module;
        $userInfo = Auth::user();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        // $data['created_by'] = $userInfo->user_id;
        $data['created_by'] = 1;
        $data['updated_by'] = 1;
        $result = $this->userRepository->create($data);

        if ($result) {
            return response()->json([
                'messages' => $this->httpStatusSucess,
                'data' => $result,
            ]);
        } else {
            return response()->json([
                'messages' => 'Created failed',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return response()->json([
            'message' => $this->httpStatusSucess,
            'data' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $this->authorize('update', $user);
        $view = $this->view;
        $module = $this->module;

        return view(
            'admin.' . $view . '.edit',
            compact('user')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $view = $this->view;
        $module = $this->module;
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $result = $this->userRepository->update($data, $user->user_id);

        if ($result) {
            return response()->json([
                'messages' => $this->httpStatusSucess,
                'status' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'Updated failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $view = $this->view;
        $result = $this->userRepository->delete($user->user_id);

        if ($result) {
            return response()->json([
                'messages' => $this->httpStatusSucess,
                'status' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'Deleted failed',
            ]);
        }
    }
}
