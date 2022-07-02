<?php

namespace App\Providers;

use App\Repository\Eloquent\{
    BaseRepository,
    UserRepository,
    PermissionRepository,
    RoleRepository

};
use App\Repository\{
    EloquentRepositoryInterface,
    UserRepositoryInterface,
    PermissionRepositoryInterface,
    RoleRepositoryInterface,

};
use Illuminate\Support\ServiceProvider;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
    {
       $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
       $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
       $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }
}
