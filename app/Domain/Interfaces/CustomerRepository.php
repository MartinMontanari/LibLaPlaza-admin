<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Customer;

interface CustomerRepository
{
    /**
     * @param int $id
     * @return Customer|null
     */
    public function getCustomerById(int $id) : ?Customer;

    /**
     * @param string $fullName
     * @return Customer|null
     */
    public function getCustomerByFullName(string $fullName) : ?Customer;

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function persist(Customer $customer);
}
