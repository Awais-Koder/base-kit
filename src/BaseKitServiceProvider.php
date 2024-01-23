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
        ], 'basekit-assets');

        $this->copyApp($filesystem);
        $this->copyCache($filesystem);
        $this->copyConfig($filesystem);
        $this->copyDb($filesystem);
        $this->copyLang($filesystem);
        $this->copyPublic($filesystem);
        $this->copyRoutes($filesystem);
        $this->copyResources($filesystem);
        $this->copyEnv($filesystem);
    }
    private function copyEnv(Filesystem $filesystem)
    {
        $sourceFile = __DIR__ . '/.env';
        $targetFile = base_path('.env');

        $filesystem->copy($sourceFile, $targetFile);
    }
    private function copyApp(Filesystem $filesystem)
    {
        $targetDirectory = base_path('app');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/app', $targetDirectory);
    }
    private function copyCache(Filesystem $filesystem)
    {
        $targetDirectory = base_path('bootstrap/cache');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/cache', $targetDirectory);
    }
    private function copyConfig(Filesystem $filesystem)
    {
        $targetDirectory = base_path('config');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/config', $targetDirectory);
    }
    private function copyDb(Filesystem $filesystem)
    {
        $targetDirectory = base_path('database');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/database', $targetDirectory);
    }
    private function copyLang(Filesystem $filesystem)
    {
        $targetDirectory = base_path('lang');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/lang', $targetDirectory);
    }
    private function copyPublic(Filesystem $filesystem)
    {
        $targetDirectory = base_path('public');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/public', $targetDirectory);
    }
    private function copyRoutes(Filesystem $filesystem)
    {
        $targetDirectory = base_path('routes');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/routes', $targetDirectory);
    }
    private function copyResources(Filesystem $filesystem)
    {
        $targetDirectory = base_path('resources');
        if (!$filesystem->exists($targetDirectory)) {
            $filesystem->makeDirectory($targetDirectory, 0755, true);
        }
        $filesystem->copyDirectory(__DIR__ . '/resources', $targetDirectory);
    }
}
