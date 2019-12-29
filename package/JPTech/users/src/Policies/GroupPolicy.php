<?php

namespace JPTech\Users\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use JPTech\Users\Models\Group;
use JPTech\Users\Models\User;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  JPTech\Users\Models\Group  $group
     * @return mixed
     */
    public function viewAny(Group $group)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('all-group') ? true : null;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Group  $model
     * @return mixed
     */
    public function view(User $user, Group $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('view-group') ? true : null;
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
            return $role->hasAccess('create-group') ? true : null;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Group  $model
     * @return mixed
     */
    public function update(User $user, Group $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('update-group') ? true : null;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Group  $model
     * @return mixed
     */
    public function delete(User $user, Group $model)
    {
        //
        foreach ($user->roles as $role) {
            return $role->hasAccess('delete-group') ? true : null;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Group  $model
     * @return mixed
     */
    public function restore(User $user, Group $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  JPTech\Users\Models\User  $user
     * @param  JPTech\Users\Models\Group  $model
     * @return mixed
     */
    public function forceDelete(User $user, Group $model)
    {
        //
    }
}
