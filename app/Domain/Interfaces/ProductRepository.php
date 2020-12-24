<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Product;

interface ProductRepository
{
    /**
     * @param Product $product
     */
    public function persist(Product $product) : void;
}
