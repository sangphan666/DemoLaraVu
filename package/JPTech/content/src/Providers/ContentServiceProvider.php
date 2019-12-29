<?php
namespace JPTech\Content\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
class ContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/../../routes/api.php");
        $this->loadRoutesFrom(__DIR__."/../../routes/web.php");
        $this->loadViewsFrom(__DIR__."/../../resources/view", "content");
        $this->loadMigrationsFrom(__DIR__."/../../database/migrations");

        $this->loadTranslationsFrom(__DIR__."/../../resources/lang", "content");

    }

    public function register()
    {
        //Load Hepler
        foreach (glob(__DIR__.'/../../helpers/*.php') as $filename) {
            require_once $filename;
        }
        /*$this->app->bind(
            ContentRepositoryInterface::class,
            ContentRepository::class
        );  */
        $this->app->bind('JPTech\Content\Repository\ContentRepositoryInterface', 'JPTech\Content\Repository\ContentRepository');
        //Merge Config
        //$this->mergeConfigFrom(__DIR__."/../../config/general.php", "general");
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__ . '/../../config/*.php'));
        foreach ($configs as $key => $row) {
            $this->mergeConfigFrom($row, $key);
        }
    }
}