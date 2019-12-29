<?php

namespace JPTech\Users\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function activeDeactive(int $data, int $id);

    // public function listUser(string $order = 'id', string $sort = 'desc'): Collection;

    // public function createUser(array $params) : User;

    // public function updateUser(array $params) : bool;

    // public function listUserByRole(int $role_id, $limit = 15);

    // public function findUserById(int $id) : User;

    // public function syncRoles(array $roleIds);

    // public function listRoles() : Collection;

    // public function hasRole(string $roleName) : bool;

    // public function isAuthUser(User $User): bool;

    // public function getUserByRole($role, $limit);

    // public function save($data = array(), $id = null);

    // public function search($search = array(), $status = null, int $limit = 15);
}
