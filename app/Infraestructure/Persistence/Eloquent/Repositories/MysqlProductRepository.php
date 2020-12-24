<?php


namespace App\Infraestructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Product;
use App\Domain\Interfaces\ProductRepository;

class MysqlProductRepository implements ProductRepository
{
    /**
     * @param Product $product
     */
    public function persist(Product $product): void
    {
        $product->save();
    }
}
