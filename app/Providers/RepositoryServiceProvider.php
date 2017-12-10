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
        $this->app->bind(\Taller\Repositories\CategoryRepository::class, \Taller\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\ProductRepository::class, \Taller\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\CommentRepository::class, \Taller\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\FavoriteRepository::class, \Taller\Repositories\FavoriteRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\CoinRepository::class, \Taller\Repositories\CoinRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\TypeProductRepository::class, \Taller\Repositories\TypeProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\StatusProductRepository::class, \Taller\Repositories\StatusProductRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\MediaRepository::class, \Taller\Repositories\MediaRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\ConfigurationRepository::class, \Taller\Repositories\ConfigurationRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\AuditRepository::class, \Taller\Repositories\AuditRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\CustomerRepository::class, \Taller\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\FaqRepository::class, \Taller\Repositories\FaqRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\BrandRepository::class, \Taller\Repositories\BrandRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\SliderRepository::class, \Taller\Repositories\SliderRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\TestimonialRepository::class, \Taller\Repositories\TestimonialRepositoryEloquent::class);
        $this->app->bind(\Taller\Repositories\SupplierRepository::class, \Taller\Repositories\SupplierRepositoryEloquent::class);
    }
}
