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

    public function create(array $data): self
    {
        $this->customer->create($data);

        return $this;
    }

    public function update(array $data): self
    {
        $this->customer->update($data);

        return $this;
    }

    public function delete(): self
    {
        $this->customer->delete();

        return $this;
    }

    public function get(): Customer
    {
        return $this->customer;
    }
}
