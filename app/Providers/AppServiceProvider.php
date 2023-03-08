<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use NunoMaduro\Collision\Adapters\Laravel\ExceptionHandler;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', 'App\ViewComposer\ViewComposer');
        View::composer('*', 'App\ViewComposer\MasterComposer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $this->app->bind(
            ExceptionHandler::class
        ); 
    }
}
