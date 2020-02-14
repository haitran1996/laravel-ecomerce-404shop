<?php

namespace App\Providers;

use App\Contracts\Controller\UserControllerInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\UserController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(
//            \App\Services\UserServiceInterface::class,
//            \App\Services\UserServiceImpl::class
//        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(UserControllerInterface::class, UserController::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
