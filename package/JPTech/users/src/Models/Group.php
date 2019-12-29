<?php

namespace JPTech\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use JPTech\Users\Models\Role;
use JPTech\Users\Models\User;

class Group extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jpa_groups';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'group_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Relationship.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relationship.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'jpa_groups_roles', 'group_id', 'role_id');
    }
}
