<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;

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
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->belongsTo(Customer::class);
    }

//    /**
//     * @return Customer
//     */
//    public function setCustomerId(int $category_id)
//    {
//        return $this->;
//    }

}
