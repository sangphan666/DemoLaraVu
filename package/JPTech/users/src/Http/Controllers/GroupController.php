<?php

namespace JPTech\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JPTech\Users\Models\Group;
use JPTech\Users\Repositories\Interfaces\GroupRepositoryInterface;
use JPTech\Users\Requests\StoreGroupRequest;
use JPTech\Users\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    private $view = 'groups';
    private $module = 'groups';
    /**
     * @var groupRepositoryInterface
     */
    private $groupRepository;
    /**
     * @var httpStatusSucess
     */
    protected $httpStatusSucess = "200";
    /**
     * @var httpStatusFail
     */
    protected $httpStatusFail = "404";

    /**
     * GroupController constructor.
     * @param groupRepositoryInterface $groupRepository
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository
    ) {
        $this->groupRepository = $groupRepository;
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

        $groups = $this->groupRepository->all();

        return response()->json([
            'messages' => ([
                'code' => $this->httpStatusSucess,
                'msg' => 'Succesfully',
            ]),
            'data' => $groups,
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
        $groups = $this->groupRepository->all();

        return view('admin.' . $view . '.create', compact('groups', 'module', 'request', 'view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGroupRequest  $validattion
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $this->authorize('create', auth()->user());
        $view = $this->view;
        $module = $this->module;
        $userInfo = Auth::user();
        $data = $request->all();
        // $data['created_by'] = $userInfo->user_id;
        $data['created_by'] = 1;
        $data['updated_by'] = 1;
        $result = $this->groupRepository->create($data);

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
     * @param  Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $this->authorize('view', $group);

        return response()->json([
            'message' => $this->httpStatusSucess,
            'data' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        // $this->authorize('update', $user);
        $view = $this->view;
        $module = $this->module;

        return view(
            'admin.' . $view . '.edit',
            compact('group')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $this->authorize('update', $group);
        $view = $this->view;
        $module = $this->module;
        $data = $request->all();
        $result = $this->groupRepository->update($data, $group->group_id);

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
     * @param  Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);
        $view = $this->view;
        $result = $this->groupRepository->delete($group->group_id);

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
