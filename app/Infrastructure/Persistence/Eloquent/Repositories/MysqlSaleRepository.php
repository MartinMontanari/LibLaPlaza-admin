<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Sale;
use App\Domain\Interfaces\SaleRepository;

class MysqlSaleRepository implements SaleRepository
{
    /**
     * @param int $id
     * @return Sale|null
     */
    public function getSaleById(int $id): ?Sale
    {
        Sale::query()
            ->where('id', '=', $id)
            ->get();
    }

    /**
     * @param Sale $sale
     */
    public function persist(Sale $sale): void
    {
        $sale->save();
    }
}
