<?php


namespace App\Application\Commands\Sales;


class StoreNewSaleCommand
{
    private string $fullName;
    private int $dni;
    private string $address;
    private string $billType;
    private string $billSerie;
    private string $billNumber;
    private array $products;
    private int $total;

    /**
     * StoreNewSaleCommand constructor.
     * @param string $fullName
     * @param int $dni
     * @param string $address
     * @param string $billType
     * @param string $billSerie
     * @param array $products
     * @param int $total
     */
    public function __construct(string $fullName, int $dni, string $address, string $billType, string $billSerie, string $billNumber, array $products, int $total)
    {
        $this->fullName = $fullName;
        $this->dni = $dni;
        $this->address = $address;
        $this->billType = $billType;
        $this->billSerie = $billSerie;
        $this->billNumber = $billNumber;
        $this->products = $products;
        $this->total = $total;
    }


    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return int
     */
    public function getDni(): int
    {
        return $this->dni;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getBillType(): string
    {
        return $this->billType;
    }

    /**
     * @return string
     */
    public function getBillSerie(): string
    {
        return $this->billSerie;
    }

    /**
     * @return string
     */
    public function getBillNumber(): string
    {
        return $this->billNumber;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

}
