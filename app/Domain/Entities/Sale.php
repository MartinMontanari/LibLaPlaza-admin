<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Money\Currency;
use Money\Money;

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
     * @param string $billType
     */
    public function setBillType(string $billType): void
    {
        $this->billType = $billType;
    }

    /**
     *
     */
    public function getBillType(): string
    {
        return $this->billType;
    }

    /**
     * @param string $billSerieAndBillNumber
     */
    public function setBillSerieAndBillNumber(string $billSerieAndBillNumber): void
    {
        $this->billSerieAndBillNumber = $billSerieAndBillNumber;
    }

    /**
     * @param Money $amount
     */
    public function setTotalAmount(Money $amount)
    {
        $this->amount_value = $amount->getAmount();
        $this->amount_currency = $amount->getCurrency()->getCode();
    }

    /**
     * @return Money
     */
    public function getTotalAmount(): Money
    {
        return new Money($this->amount_value, new Currency($this->amount_currency));
    }

    /**
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer()->associate($customer);
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(ProductSale::class);
    }

}
