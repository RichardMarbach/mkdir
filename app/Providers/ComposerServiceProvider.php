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
        $this->composeDashboard();
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

    /**
     * Composes the admin dashbaord
     */
    private function composeDashboard()
    {
        view()->composer(
            'admin.management-pannels.customers', \App\Http\ViewComposers\AdminCustomerComposer::class
        );
    }
}
