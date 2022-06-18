<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\PermissionRepository;
use App\Repository\PermissionRepositoryInterface;
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
    }
}
