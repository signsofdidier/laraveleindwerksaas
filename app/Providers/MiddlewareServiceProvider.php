<?php

namespace App\Providers;

use App\Http\Middleware\EnsureCentralUserIsAuthenticated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('central_auth', EnsureCentralUserIsAuthenticated::class);
    }
}
