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

    /**
     * @param int $id
     * @return Product
     */
    public function getOneByIdOrFail(int $id) : Product;

    /**
     * @param string $code
     * @return Product
     */
    public function getOneByCode(string $code) : Product;
}
