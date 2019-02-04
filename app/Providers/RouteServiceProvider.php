<?php

namespace App\Providers;
use Closure;

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->macroAdminRoutes();
        $this->shouldAuthenticate();

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
            $this->mapApiRoutes();
            $this->mapWebRoutes();
            $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }


     /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware('web')
             ->namespace($this->adminNamespace)
             ->group(base_path('routes/admin.php'));
    }

    

    protected function macroAdminRoutes()
    {
        $provider = $this;
        $this->app['router']->macro('adminAuthRoutes', function () use($provider){
            $provider->getAdminAuthRoutes($this);
        });
    }

    protected function shouldAuthenticate()
    {
        $this->app['router']->macro('shouldAuthenticate', function (Closure $router){   
            return $this->group(['middleware'=> 'auth'],function () use($router){
                $router($this);
            });
        });
    }

    public function getAdminAuthRoutes(Router $router)
    {
        // Authentication Routes...
        $router->get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        $router->post('login', 'Auth\LoginController@login');
        $router->post('logout', 'Auth\LoginController@logout')->name('admin.logout');

        // Registration Routes...
        $router->get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
        //$router->get('register', 'Auth\RegisterController@create');

        // Password Reset Routes...
        $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        $router->post('password/reset', 'Auth\ResetPasswordController@reset');
    }
}
