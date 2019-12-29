<?php

namespace JPTech\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use JPTech\Users\Models\Group;
use JPTech\Users\Models\User;

class Role extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jpa_roles';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'permissions',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Relationship.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'jpa_users_roles', 'user_id', 'role_id');
    }

    /**
     * Relationship.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'jpa_groups_roles', 'group_id', 'role_id');
    }

    /**
     * Checks if Role has access to permissions.
     */
    public function hasAccess(string $permission): bool
    {
        if ($this->hasPermission($permission)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if User has role.
     */
    public function hasRole(string $slug): bool
    {
        if ($this->hasSlug($slug)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if Role has permissions.
     */
    private function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions);
    }

    /**
     * Checks if User has permissions.
     */
    private function hasSlug(string $slug): bool
    {
        return $this->slug == $slug;
    }
}
