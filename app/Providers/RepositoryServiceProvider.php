<?php

namespace App\Providers;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ProjectRoleRepositoryInterface;
use App\Interfaces\SprintRepositoryInterface;
use App\Interfaces\StatusRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectRoleRepository;
use App\Repositories\SprintRepository;
use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(ProjectRoleRepositoryInterface::class, ProjectRoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(SprintRepositoryInterface::class, SprintRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
