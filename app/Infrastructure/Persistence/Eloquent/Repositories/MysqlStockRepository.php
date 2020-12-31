<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Stock;
use App\Domain\Interfaces\StockRepository;

class MysqlStockRepository implements StockRepository
{

    /**
     * @param Stock $stock
     */
    public function persist(Stock $stock): void
    {
        $stock->save();
    }

    /**
     * @param int $product_id
     * @return Stock
     */
    public function getProductStock(int $product_id): Stock
    {
        return Stock::query()
            ->where('product_id', '=', $product_id)
            ->first();
    }
}
