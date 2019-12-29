<?php

namespace JPTech\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JPTech\Users\Repositories\Interfaces\RoleRepositoryInterface;
use JPTech\Users\Requests\StoreRoleRequest;
use JPTech\Users\Requests\UpdateRoleRequest;
use JPTech\Users\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $view = 'role';
    private $module = 'role';
    /**
     * @var roleRepositoryInterface
     */
    private $roleRepository;

    /**
     * RoleController constructor.
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(
        RoleRepositoryInterface $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $module = $this->module;
        $view = $this->view;
        $role = $this->roleRepository->all();

        return response()->json([
            'message' => 201,
            'role' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $view = $this->view;
        $module = $this->module;

        return view('admin.'.$view.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $validattion
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $view = $this->view;
        $module = $this->module;
        $userInfo = Auth::user();
        $data = $request->all();
        // $data['created_by'] = $userInfo->user_id;
        $data['created_by'] = 1;
        $data['updated_by'] = 1;
        $result = $this->roleRepository->create($data);

        if ($result) {
            return response()->json([
                'messages' => 200,
                'role' => $result
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
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $view = $this->view;
        $module = $this->module;

        return response()->json([
            'message' => 201,
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $view = $this->view;
        $module = $this->module;

        return view(
            'admin.'.$view.'.edit',
            compact('role')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $validattion
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $view = $this->view;
        $module = $this->module;
        $data = $request->all();
        $result = $this->roleRepository->update($data, $role->role_id);

        if ($result) {
            return response()->json([
                'messages' => 200,
                'status' => $result
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
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $view = $this->view;

        if ($result) {
            return response()->json([
                'messages' => 200,
                'status' => $result
            ]);
        } else {
            return response()->json([
                'status' => 'Deleted failed',
            ]);
        }
    }
}
