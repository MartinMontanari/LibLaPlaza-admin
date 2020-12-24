<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Product;

interface ProductRepository
{
    /**
     * @param Product $product
     */
    public function persist(Product $product) : void;

    /**
     * @param int|null $page
     * @param int|null $size
     * @return mixed
     */
    public function getAll(?int $page, ?int $size);
}
