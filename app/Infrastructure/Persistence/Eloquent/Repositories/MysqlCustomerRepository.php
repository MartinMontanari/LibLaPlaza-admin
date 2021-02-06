<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Customer;
use App\Domain\Interfaces\CustomerRepository;

class MysqlCustomerRepository implements CustomerRepository
{

    /**
     * @param string $fullName
     * @return Customer|null
     */
    public function getCustomerByFullName(string $fullName): ?Customer
    {
        return Customer::query()
            ->where('name','like', '%'.$fullName.'%')
            ->orWhere('lastname','like', '%'.$fullName.'%')
            ->get();
    }

    /**
     * @param int $id
     * @return Customer|null
     */
    public function getCustomerById(int $id): ?Customer
    {
        return Customer::query()
            ->where('id','=',$id)
            ->first();
    }

    /**
     * @param int $dni
     * @return Customer|null
     */
    public function getCustomerByDni(int $dni) : ?Customer
    {
        return Customer::query()
            ->where('dni','=',$dni)
            ->first();
    }

    /**
     * @param Customer $customer
     * @return mixed|void
     */
    public function persist(Customer $customer)
    {
        $customer->save();
    }
}
