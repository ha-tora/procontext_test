<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
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
    public function boot(ResponseFactory $factory): void
    {
        $factory->macro('success', function ($data = [], int $status = 200, string $message = 'OK') use ($factory) {
            $format = [
                'status'    => true,
                'message'   => $message,
                'data'      => $data
            ];

            return $factory->make($format, $status);
        });

        $factory->macro('error', function ($errors = [], int $status = 505, string $message = 'Internal Server Error') use ($factory) {
            $format = [
                'status'    => false,
                'message'   => $message,
                'errors'    => $errors
            ];

            return $factory->make($format, $status);
        });
    }
}
