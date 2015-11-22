<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar 
     */
    private function composeNavigation()
    {
        view()->composer(
            'layouts.nav', \App\Http\ViewComposers\NavbarComposer::class
        );
    }
}
