<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BaseService;
use App\Services\{
    PermissionService,
    UserService,
    RoleService,
};
use App\Services\ServiceInterface\{
    UserServiceInterface,
    ServiceInterface,
    PermissionServiceInterface,
    RoleServiceInterface
};

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
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
    }
}
