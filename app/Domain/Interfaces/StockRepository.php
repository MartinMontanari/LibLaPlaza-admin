<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Stock;
use Illuminate\Database\Eloquent\Collection;

interface StockRepository
{

    /**
     * @param Stock $stock
     */
    public function persist(Stock $stock): void;

    /**
     * @param int $product_id
     * @return Stock
     */
    public function getProductStock(int $product_id) : Stock;

    /**
     * @param int $min
     * @return mixed
     */
    public function filterProductsByStock(int $min);

    /**
     * @return mixed
     */
    public function fetchStockOfAllActiveProducts();
}
