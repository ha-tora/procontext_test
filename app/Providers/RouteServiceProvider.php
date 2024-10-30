<?php

namespace App\Providers;

use App\Exceptions\Api\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
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
        Route::middleware('api')
        ->prefix('api')
        ->missing(function (Request $request) {
            throw new NotFoundException();
        })
        ->group(base_path('routes/api.php'));
    }
}
