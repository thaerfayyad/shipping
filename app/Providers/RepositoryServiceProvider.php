<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MenuRepository;
use App\Repositories\EventRepository;
use App\Repositories\UserInfoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventRepository::class);
        $this->app->bind(MenuRepository::class);
        $this->app->bind(UserInfoRepository::class);

    }
}
