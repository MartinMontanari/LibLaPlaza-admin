<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * @var string
     */
    protected $table = 'customers';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $dni
     */
    public function setDni(int $dni): void
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getDni(): int
    {
        return $this->dni;
    }

    /**
     * @param Sale $sale
     */
    public function setSale(Sale $sale)
    {
        $this->sale()->associate($sale);
    }

}
