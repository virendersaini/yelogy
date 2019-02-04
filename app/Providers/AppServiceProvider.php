<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initBladeComponents();
    Schema::defaultStringLength(191); 

        //
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

     /* 
    @alert(['type'=>'error|success|info'])
    @endalert
    */

    protected function initBladeComponents()
    {
        Blade::component('app.components.alert', 'alert');
        Blade::component('app.components.flashMessage', 'flashMessage');
        Blade::component('app.components.formErrors', 'formErrors');
    }
}
