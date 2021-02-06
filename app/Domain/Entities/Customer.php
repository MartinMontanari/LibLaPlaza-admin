<?php


namespace App\Domain\Entities;


class Customer
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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
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
