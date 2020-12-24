<?php

namespace App\Providers;

use TusPhp\Tus\Server as TusServer;
use Illuminate\Support\ServiceProvider;

class TusServiceProvider extends ServiceProvider
{
    // ...

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tus-server', function ($app) {
            $server = new TusServer('file');
            $server
                ->setApiPath('/tus') // tus server endpoint.
                ->setUploadDir(storage_path('app/public/uploads/answers')); // uploads dir.
            return $server;
        });
    }

    // ...
}
