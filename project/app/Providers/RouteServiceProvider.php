<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');

        foreach(glob(base_path('routes/ui/*.php')) as $routeFile) {
            Route::middleware('web')->group($routeFile);
        }

        foreach(glob(base_path('routes/api/*.php')) as $routeFile) {
            Route::middleware('api')
                ->prefix('api')
                ->group($routeFile);
        }
    }
}
