<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //

        // Share all
        // $menuA = 'This is menu 1234';
        // View::share('menu', $menuA);

        // Share only layout.header
        View::composer(['layout.header','index'], function($view) {
            $menuA = "This is menu A";
            $menuB = "12345";
            $view->with([
                'menu' => $menuA,
                'menub' => $menuB
            ]);
        });

        // Share all
        View::composer('*', function($view){
            $menuA = 'This is menu A';
            $view->with('menu',$menuA);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
