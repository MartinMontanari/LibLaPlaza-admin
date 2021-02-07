<?php

namespace App\Providers;

use App\Domain\Interfaces\CategoryRepository;
use App\Domain\Interfaces\CustomerRepository;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ProviderRepository;
use App\Domain\Interfaces\SaleRepository;
use App\Domain\Interfaces\StockRepository;

use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlCategoryRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlCustomerRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlProductRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlProviderRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlSaleRepository;
use App\Infrastructure\Persistence\Eloquent\Repositories\MysqlStockRepository;
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
        $this->app->bind(CustomerRepository::class, MysqlCustomerRepository::class);
        $this->app->bind(SaleRepository::class, MysqlSaleRepository::class);
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
