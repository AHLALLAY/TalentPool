<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\PosteRepository;
use App\Reposotories\Interfaces\AuthRepositoryInterface as InterfacesAuthRepositoryInterface;
use App\Reposotories\Interfaces\PosteRepositoryInterface as InterfacesPosteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfacesAuthRepositoryInterface::class,AuthRepository::class);
        $this->app->bind(InterfacesPosteRepositoryInterface::class, PosteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
