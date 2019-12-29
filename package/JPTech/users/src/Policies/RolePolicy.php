<?php

namespace JPTech\Users\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use JPTech\Users\Models\Role;
use JPTech\Users\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  JPTech\Users\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('all-role') ? true : null;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Role  $model
     * @return mixed
     */
    public function view(User $user, Role $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('view-role') ? true : null;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  JPTech\Users\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('create-role') ? true : null;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Role  $model
     * @return mixed
     */
    public function update(User $user, Role $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('update-role') ? true : null;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Role  $model
     * @return mixed
     */
    public function delete(User $user, Role $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('delete-role') ? true : null;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Role  $model
     * @return mixed
     */
    public function restore(User $user, Role $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Role  $model
     * @return mixed
     */
    public function forceDelete(User $user, Role $model)
    {
        //
    }
}
