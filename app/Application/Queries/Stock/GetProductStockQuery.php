<?php


namespace App\Application\Queries\Stock;


class GetProductStockQuery
{
    private int $product_id;

    /**
     * GetProductStockQuery constructor.
     * @param int $product_id
     */
    public function __construct(int $product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }
}
