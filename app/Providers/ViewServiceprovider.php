<?php

namespace App\Providers;

use App\Cat;
use App\setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('Front.inc.header',function ($view)
        {
            $view->with('cats',Cat::select('id','name')->get());
            $view->with('sittings',setting::select('logo','name','favicon')->first());
        });
        view()->composer('Front.inc.footer',function ($view)
        {
            $view->with('sittings',setting::first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
