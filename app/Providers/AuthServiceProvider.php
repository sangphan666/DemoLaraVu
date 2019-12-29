<?php

namespace App\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use JPTech\Users\Models\Role;
use JPTech\Users\Models\User;
use JPTech\Users\Policies\RolePolicy;
use JPTech\Users\Policies\UserPolicy;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Group::class => GroupPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineSuperAdmin();

        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addHour());

        Passport::refreshTokensExpireIn(Carbon::now()->addHours(2));

        Passport::pruneRevokedTokens();
    }

    /**
     * Define super admin.
     *
     * @return boolean
     */
    public function defineSuperAdmin()
    {
        Gate::before(function ($user, $ability) {
            return $user->roles->first->hasRole('super-admin') ? true : null;
        });
    }
}
