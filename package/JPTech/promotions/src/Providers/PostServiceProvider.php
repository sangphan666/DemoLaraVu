<?php
namespace JPTech\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class PostServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/../../routes/web.php");
        $this->loadViewsFrom(__DIR__."/../../resources/view", "post");
        $this->loadMigrationsFrom(__DIR__."/../../database/migrations");

        $this->loadTranslationsFrom(__DIR__."/../../resources/lang", "post");

    }

    public function register()
    {
        //Load Hepler
        foreach (glob(__DIR__.'/../../helpers/*.php') as $filename) {
            require_once $filename;
        }

        //Merge Config
        //$this->mergeConfigFrom(__DIR__."/../../config/general.php", "general");
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__ . '/../../config/*.php'));
        foreach ($configs as $key => $row) {
            $this->mergeConfigFrom($row, $key);
        }
    }
}