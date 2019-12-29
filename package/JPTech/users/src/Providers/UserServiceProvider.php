<?php
namespace JPTech\Users\Providers;

use Illuminate\Support\ServiceProvider;
use JPTech\Users\Repositories\GroupRepository;
use JPTech\Users\Repositories\Interfaces\GroupRepositoryInterface;
use JPTech\Users\Repositories\Interfaces\RoleRepositoryInterface;
use JPTech\Users\Repositories\Interfaces\UserRepositoryInterface;
use JPTech\Users\Repositories\RoleRepository;
use JPTech\Users\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(dirname(__DIR__, 2) . "/routes/api.php");

        $this->loadRoutesFrom(__DIR__ . "/../../routes/web.php");

        $this->loadViewsFrom(__DIR__ . "/../../resources/view", "users");

        $this->loadMigrationsFrom(__DIR__ . "/../../database/migrations");

        $this->loadTranslationsFrom(__DIR__ . "/../../resources/lang", "post");
    }

    /**
     * Register.
     *
     * @return void
     */
    public function register()
    {
        //Load Hepler
        foreach (glob(__DIR__ . '/../../helpers/*.php') as $filename) {
            require_once $filename;
        }

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            GroupRepositoryInterface::class,
            GroupRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        //Merge Config
        //$this->mergeConfigFrom(__DIR__."/../../config/general.php", "general");
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__ . '/../../config/*.php'));
        foreach ($configs as $key => $row) {
            $this->mergeConfigFrom($row, $key);
        }
    }
}
