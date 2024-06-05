<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerMiddlewares();
    }

    protected function registerMiddlewares()
    {
        Route::aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        Route::aliasMiddleware('superadmin', \App\Http\Middleware\SuperAdminMiddleware::class);
        Route::aliasMiddleware('user', \App\Http\Middleware\UserMiddleware::class);
        Route::aliasMiddleware('guest', \App\Http\Middleware\RedirectIfAuthenticated::class);
    }
}
