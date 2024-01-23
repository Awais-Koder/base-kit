<?php

namespace Awais\BaseKit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class BaseKitServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        // Load migrations from the package
        $this->publishes([
            __DIR__ . '/app' => base_path('app'),
            __DIR__ . '/cache' => base_path('bootstrap/cache'),
            __DIR__ . '/config' => base_path('config'),
            __DIR__ . '/database' => base_path('database'),
            __DIR__ . '/lang' => base_path('lang'),
            __DIR__ . '/public' => base_path('public'),
            __DIR__ . '/routes' => base_path('routes'),
            __DIR__ . '/resources' => base_path('resources'),
            __DIR__ . '/.env' => base_path('.env'),
        ], 'basekit-assets');
    }
}
