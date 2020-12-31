<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Stock;

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
}
