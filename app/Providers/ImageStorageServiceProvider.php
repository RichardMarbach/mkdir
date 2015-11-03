<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageStorageServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(App\Services\ImageStorage::class, function() {
            return new App\Services\ImageStorage();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() 
    {
        return [App\Services\Contracts\ImageStorageContract::class];
    }
}
