<?php


namespace App\Application\Commands\Sales;


class StoreNewSaleCommand
{
    private string $fullName;
    private int $dni;
    private string $address;
    private string $billType;
    private string $billSerie;
    private array $selectedProducts;
    private int $total;

    /**
     * StoreNewSaleCommand constructor.
     * @param string $fullName
     * @param int $dni
     * @param string $address
     * @param string $billType
     * @param string $billSerie
     * @param array $selectedProducts
     * @param int $total
     */
    public function __construct(string $fullName, int $dni, string $address, string $billType, string $billSerie, array $selectedProducts, int $total)
    {
        $this->fullName = $fullName;
        $this->dni = $dni;
        $this->address = $address;
        $this->billType = $billType;
        $this->billSerie = $billSerie;
        $this->selectedProducts = $selectedProducts;
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
     * @return array
     */
    public function getSelectedProducts(): array
    {
        return $this->selectedProducts;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

}
