<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Sale;

interface SaleRepository
{
    /**
     * @return Sale|null
     */
    public function getSaleById(int $id) : ?Sale;

    /**
     * @param Sale $sale
     */
    public function persist(Sale $sale): void ;
}
