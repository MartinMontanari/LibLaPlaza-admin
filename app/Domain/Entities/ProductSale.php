<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSale extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_sales';


    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product()->associate($product);
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @param Sale $sale
     */
    public function setSale(Sale $sale): void
    {
        $this->product()->associate($sale);
    }

    /**
     * @return BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

}
