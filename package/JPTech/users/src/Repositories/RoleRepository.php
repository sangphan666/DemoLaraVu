<?php

namespace JPTech\Users\Repositories;

use App\Repositories\BaseRepository;
use JPTech\Users\Repositories\Interfaces\RoleRepositoryInterface;
use JPTech\Users\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * PermissionRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}
