<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    /**
     * @var string
     */
    protected $table = 'sales';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBillSerieAndBillNumber(): string
    {
        return $this->billSerieAndBillNumber;
    }

    /**
     * @param string $billSerieAndBillNumber
     */
    public function setCode(string $billSerieAndBillNumber): void
    {
        $this->billSerieAndBillNumber = $billSerieAndBillNumber;
    }
    
    /**
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(ProductSale::class);
    }

}
