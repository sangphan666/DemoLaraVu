<?php

namespace JPTech\Users\Repositories;

use App\Repositories\BaseRepository;
use JPTech\Users\Repositories\Interfaces\UserRepositoryInterface;
use JPTech\Users\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * PermissionRepository constructor.
     *
     * @param Permission $permission
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Active user
     *
     * @param int $id
     * @return array
     */
    public function activeDeactive(int $data, int $id)
    {
        return $this->find($id)->update(['id_active' => $data]);
    }

    // /**
    //  * List all the Users
    //  *
    //  * @param string $order
    //  * @param string $sort
    //  * @return array
    //  */
    // public function listUsers(string $order = 'id', string $sort = 'desc'): Collection
    // {
    //     return $this->all(['*'], $order, $sort);
    // }

    // /**
    //  * List all the Users by role
    //  *
    //  * @param string $order
    //  * @param string $sort
    //  * @return array
    //  */
    // public function listUsersByRole(int $role_id, $limit = 15)
    // {
    //     return $this->model->whereHas('user_roles_where', function ($query) use ($role_id) {
    //         $query->where('role_id', $role_id);
    //     })->orderBy('created_at', 'DESC')->paginate($limit);
    // }

    // /**
    //  * Create the User
    //  *
    //  * @param array $params
    //  * @return User
    //  */
    // public function createUser(array $params): User
    // {
    //     $collection = collect($params);
    //     $User = new User(($collection->except('password'))->all());
    //     $User->password = bcrypt($collection->only('password'));
    //     $User->save();
    //     return $User;
    // }

    // /**
    //  * Find the User by id
    //  *
    //  * @param int $id
    //  * @return User
    //  */
    // public function findUserById(int $id): User
    // {
    //     return $this->firstOrFail($id);
    // }

    // /**
    //  * Update User
    //  *
    //  * @param array $params
    //  * @return bool
    //  */
    // public function updateUser(array $params): bool
    // {
    //     return $this->model->update($params);
    // }

    // /**
    //  * @param array $roleIds
    //  */
    // public function syncRoles(array $roleIds)
    // {
    //     $this->model->roles()->sync($roleIds);
    // }

    // /**
    //  * @return Collection
    //  */
    // public function listRoles(): Collection
    // {
    //     return $this->model->roles()->get();
    // }

    // /**
    //  * @param string $roleName
    //  * @return bool
    //  */
    // public function hasRole(string $roleName): bool
    // {
    //     return true;
    //     //     return $this->model->hasRole($roleName);
    // }

    // /**
    //  * @param User $User
    //  * @return bool
    //  */
    // public function isAuthUser(User $User): bool
    // {
    //     $isAuthUser = false;
    //     if (Auth::guard('admin')->user()->id == $User->id) {
    //         $isAuthUser = true;
    //     }
    //     return $isAuthUser;
    // }

    // /**
    //  * @param User $User
    //  * @return bool
    //  */
    // public function getUserByRole($role, $limit = 15)
    // {
    //     $users = $this->model->whereHas('user_roles_where', function ($query) use ($role) {
    //         $query->where('name', $role);
    //     })->orderBy('created_at', 'DESC')->paginate($limit);
    //     return $users;
    // }

    // /**
    //  * Find the User by id
    //  *
    //  * @param int $id
    //  * @return User
    //  */
    // public function findUserByRoleAndId(int $role_id, int $id)
    // {
    //     return $this->model->whereHas('user_roles_where', function ($query) use ($role_id) {
    //         $query->where('role_id', $role_id);
    //     })->where('id', $id)->firstOrFail();
    // }

    // public function firstOrNew($id)
    // {
    //     if (empty($id)) {
    //         return new $this->model;
    //     } else {
    //         return $this->model->where('id', intval($id))->firstOrFail();
    //     }
    // }
    

    // // Save
    // public function save($data = array(), $id = null)
    // {
    //     $object = $this->firstOrNew($id);
    //     $fillable = $object->getFillable();
    //     if (in_array('array_values', $fillable) && isset($data['array_values'])) {
    //         $data['array_values'] = json_encode($data['array_values']);
    //     }
    //     if (in_array('categories', $fillable) && isset($data['categories'])) {
    //         // Categories
    //         $categories = !empty($data['categories']) ? implode("],[", $data['categories']) : '';
    //         $data['categories'] = "[" . $categories . "]";
    //     }
    //     if (in_array('tags', $fillable) && isset($data['tags'])) {
    //         // Tags
    //         $tags = !empty($data['tags']) ? str_replace(",", "],[", $data['tags']) : '';
    //         $data['tags'] = "[" . $tags . "]";
    //     }
    //     if (in_array('status', $fillable)) {
    //         $data['status'] = $data['status'] ?? 1;
    //     }
    //     if (!empty($data['input_column']) && is_array($data['input_column'])) {
    //         foreach ($data['input_column'] as $key => $value) {
    //             if (is_array($value)) {
    //                 $temp = str_replace(",", "],[", implode(",", $value));
    //                 $data[$key] = "[" . $temp . "]";
    //             }
    //         }
    //     }
    //     $object->fill($data);
    //     if ($object->save()) {
    //         return $object;
    //     } else {
    //         return false;
    //     }
    // }

    // public function search($search = array(), $status = null, int $limit = 15)
    // {
    //     try {
    //         return $this->model
    //             ->where(function ($query) use ($status) {
    //                 if (!empty($status) || $status === 0) {
    //                     if (is_array($status)) {
    //                         $query->whereIn('status', $status);
    //                     } else {
    //                         $query->where('status', '>=', $status);
    //                     }
    //                 }
    //             })
    //             ->where(function ($query) use ($search) {
    //                 if (!empty($search['title'])) {
    //                     $query->where('name', 'like', "%" . $search['title'] . "%")
    //                         ->orWhere('email', 'like', "%" . $search['title'] . "%");
    //                 }
    //                 if (!empty($search['role'])) {
    //                     $query->whereHas('user_roles_where', function ($query) use ($search) {
    //                         $query->whereIn('role_id', \Arr::wrap($search['role']));
    //                     });
    //                 }
    //             })
    //             ->orderBy('created_at', 'DESC')->paginate($limit);
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    // public function all($search = array(), $status = null)
    // {
    //     try {
    //         return $this->model
    //             ->where(function ($query) use ($search) {
    //             })
    //             ->orderBy('created_at', 'DESC')->gset();
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
}
