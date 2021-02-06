<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return bool
     */
    public function hasStock(): bool
    {
        if ($this->getQuantity() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $quantity
     */
    public function decreaseQuantity(int $quantity)
    {
        if ($this->getQuantity() >= $quantity) {
            throw new \InvalidArgumentException('El stock no es valido');
        }
        $this->setQuantity($this->getQuantity() - $quantity);
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
