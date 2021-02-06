<?php


namespace App\Domain\Interfaces;


interface CustomerRepository
{
    public function getCustomerById();
    public function getCustomerByFullName();
    public function getCustomerBy();
}
