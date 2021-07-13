<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

          // Using class based composers...


          View::composer(
            'layouts.website.header', 'App\Http\ViewComposers\TopNavigationComposer@compose'
        );
        View::composer(
            'layouts.admin.sidebar', 'App\Http\ViewComposers\SidebarComposer@compose'
        );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
