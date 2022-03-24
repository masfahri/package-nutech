<?php

namespace Masfahri\Nutech;

use Masfahri\Nutech\App\NutechInstall;
use Illuminate\Support\ServiceProvider;

class NutechServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/main.php', 'core');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'nutech');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'\Public\assets' => public_path('vendor/masfahri/nutech/assets')
        ]);
        // $this->publishes([
        //     __DIR__.'/public/uploads/files' => public_path('uploads/files', 'uploads')
        // ]);
        $this->commands([
            NutechInstall::class
        ]);
    }
}
