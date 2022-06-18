<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BaseService;
use App\Services\ServiceInterface\PermissionServiceInterface;
use App\Services\PermissionService;
use App\Services\ServiceInterface\ServiceInterface;
use App\Services\UserService;
use App\Services\ServiceInterface\UserServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ServiceInterface::class, BaseService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
    }
}
