<?php

namespace JPTech\Users\Repositories;

use App\Repositories\BaseRepository;
use JPTech\Users\Models\Group;
use JPTech\Users\Repositories\Interfaces\GroupRepositoryInterface;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    /**
     * PermissionRepository constructor.
     *
     * @param Group $model
     */
    public function __construct(Group $model)
    {
        $this->model = $model;
    }
}
