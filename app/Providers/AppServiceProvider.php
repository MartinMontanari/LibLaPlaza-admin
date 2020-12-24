<?php

namespace App\Providers;

use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Domain\Interfaces\StockRepository;
use App\Infraestructure\Persistence\Eloquent\Repositories\MysqlCategoryRepository;
use App\Infraestructure\Persistence\Eloquent\Repositories\MysqlProductRepository;
use App\Infraestructure\Persistence\Eloquent\Repositories\MysqlProviderRepository;
use App\Infraestructure\Persistence\Eloquent\Repositories\MysqlStockRepository;
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
        $this->app->bind(CategoryRepository::class, MysqlCategoryRepository::class);
        $this->app->bind(ProviderRepository::class, MysqlProviderRepository::class);
        $this->app->bind(ProductRepository::class, MysqlProductRepository::class);
        $this->app->bind(StockRepository::class, MysqlStockRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
