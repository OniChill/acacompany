<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Repositories\Front\Interfaces\ProductRepositoryInterface;
use App\Repositories\Front\ProductRepository;

use App\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Front\CategoryRepository;

class ShopServiceProvider extends ServiceProvider
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
    }
}