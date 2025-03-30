<?php

namespace App\Providers;

use App\Interfaces\ApplicationInterface;
use App\Interfaces\AuthInterface;
use App\Interfaces\InfoInterface;
use App\Interfaces\PostInterface;
use App\Repositories\ApplicationRepository;
use App\Repositories\AuthRepository;
use App\Repositories\InfoRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(InfoInterface::class, InfoRepository::class);
        $this->app->bind(ApplicationInterface::class, ApplicationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
