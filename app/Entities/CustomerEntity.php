<?php

namespace App\Entities;

use App\Models\Customer;

class CustomerEntity
{
    protected Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function create(array $data): Customer
    {
        $this->customer->create($data);

        return $this;
    }

    public function update(array $data): Customer
    {
        $this->customer->update($data);

        return $this;
    }

    public function delete(): Customer
    {
        $this->customer->delete();

        return $this;
    }

    public function get(): CustomerModel
    {
        return $this->customer;
    }
}
