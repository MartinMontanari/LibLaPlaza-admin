<?php


namespace App\Application\Commands\Stock;


class UpdateStockCommand
{
    private int $stock_id;
    private int $product_id;
    private int $quantity;

    /**
     * UpdateStockCommand constructor.
     * @param int $stock_id
     * @param int $product_id
     * @param int $quantity
     */
    public function __construct(int $stock_id, int $product_id, int $quantity)
    {
        $this->stock_id = $stock_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getStockId(): int
    {
        return $this->stock_id;
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
