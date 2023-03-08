<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
          $view->with('dashboard_composer', \App\Models\Dashboard::first());
        });
        view()->composer('*', 'App\ViewComposer\ViewComposer');

        // view()->composer('*', function($view){
        //   $view->with('destinationListing', \App\Models\Destination::published()->inRandomOrder()->take('6')->get());
        // });
        
        // view()->composer('*', function($view){
        //   $view->with('composer_treks_destinationType', \App\Models\Destinationtype::where('slug','treks')->first());
        // });

        // view()->composer('*', function($view){
        //   $view->with('composer_tours_destinationType', \App\Models\Destinationtype::where('slug','tours')->first());
        // });

        // view()->composer('*', function($view){
        //   $view->with('composer_adventure_destinationType', \App\Models\Destinationtype::where('slug','adventure')->first());
        // });

        // view()->composer('*', function($view){
        //   $view->with('composer_peakclimbing_destinationType', \App\Models\Destinationtype::where('slug','peak-climbing')->first());
        // });
        
    }
}
