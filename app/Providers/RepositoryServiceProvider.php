<?php

namespace Taller\Providers;

use Illuminate\Support\ServiceProvider;
use Taller\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {        
        $this->app->bind(\Taller\Repositories\BusinessRepository::class, \Taller\Repositories\BusinessRepositoryEloquent::class);        
        $this->app->bind(\Taller\Repositories\CategoryRepository::class, \Taller\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\ProductRepository::class, \Taller\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\TypeProductRepository::class, \Taller\Repositories\TypeProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\StatusProductRepository::class, \Taller\Repositories\StatusProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\ConfigurationRepository::class, \Taller\Repositories\ConfigurationRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\OrderRepository::class, \Taller\Repositories\OrderRepositoryEloquent::class);

    }
}
