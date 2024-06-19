<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Repositories\Front\Interfaces\CartRepositoryInterface;
use App\Repositories\Front\CartRepository;
use App\Repositories\Front\Interfaces\ProductRepositoryInterface;
use App\Repositories\Front\ProductRepository;

use App\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Front\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        $this->registerRepositories();
    }

    private function registerRepositories()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            CartRepositoryInterface::class,
            CartRepository::class
        );
    }
}