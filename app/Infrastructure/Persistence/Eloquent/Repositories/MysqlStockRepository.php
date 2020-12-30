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
}
