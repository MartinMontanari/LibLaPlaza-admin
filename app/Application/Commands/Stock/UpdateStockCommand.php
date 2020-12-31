<?php


namespace App\Application\Commands\Stock;


class UpdateStockCommand
{
    private int $product_id;
    private int $quantity;

    /**
     * UpdateStockCommand constructor.
     * @param int $product_id
     * @param int $quantity
     */
    public function __construct(int $product_id, int $quantity)
    {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

}
