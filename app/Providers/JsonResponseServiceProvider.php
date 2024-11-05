<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class JsonResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('services', function ($payload = null, $statusCode = 200, string $error = null) use ($factory) {

            $status = $statusCode == 200;
            $body = [
                'status' => $status
            ];

            if ($status) {
                $body['payload'] = $payload;
            } else {
                $body['error'] = $error;
            }

            return $factory->json($body, $statusCode);
        });
    }
}