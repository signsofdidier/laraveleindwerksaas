<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

class TenantRouteServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        Route::middleware([
            'web',
            InitializeTenancyByDomain::class,
            PreventAccessFromCentralDomains::class,
        ])->group(function () {
            $this->mapTenantRoutes();
        });
    }

    /**
     * Define the tenant routes.
     */
    protected function mapTenantRoutes(): void
    {
        Route::middleware(['web'])
            ->group(base_path('routes/tenant.php'));
    }
}
