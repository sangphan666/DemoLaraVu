<?php
namespace JPTech\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class MediaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/../../routes/api.php");
        $this->loadRoutesFrom(__DIR__."/../../routes/web.php");
        $this->loadViewsFrom(__DIR__."/../../resources/view", "media");
        $this->loadMigrationsFrom(__DIR__."/../../database/migrations");
        $this->loadTranslationsFrom(__DIR__."/../../resources/lang", "media");
        Passport::routes();

    }

    public function register()
    {
        //Load Hepler
        foreach (glob(__DIR__.'/../../helpers/*.php') as $filename) {
            require_once $filename;
        }

        /*$this->app->bind('JPTech\Media\Repository\MediaRepositoryInterface', 'JPTech\Media\Repository\MediaRepository');*/
        
        //Merge Config
        //$this->mergeConfigFrom(__DIR__."/../../config/general.php", "general");
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__ . '/../../config/*.php'));
        foreach ($configs as $key => $row) {
            $this->mergeConfigFrom($row, $key);
        }
    }
}