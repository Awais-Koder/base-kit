<?php

namespace App\Providers;

use App\Repositories\categoriesRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind('App\Repositories\categoriesRepository', function ($app) {
            return new \App\Repositories\categoriesRepository(new \App\Models\categories());
        });
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // if (env('CATEGORIES_PUBLISH') == true) {
            \Illuminate\Support\Facades\View::composer(
                'layouts.right-sidebar',
                \App\Http\View\Composers\RightSidebarComposer::class
            );
        // }
    }
}
