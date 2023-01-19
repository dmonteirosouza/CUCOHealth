<?php

namespace App\Repositories;

use App\Entities\CustomerEntity;
use App\Models\Customer;
use App\Http\Requests\CustomerSearchRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerRepository
{
    public function all(): array
    {
        $customers = Customer::all();

        return $customers->map(function ($customer) {
            return new CustomerEntity($customer);
        })->toArray();
    }

    public function create(CustomerStoreRequest $request): CustomerEntity
    {
        return new CustomerEntity(Customer::create($request->all()));
    }

    public function search(CustomerSearchRequest $request)
    {
        $document = preg_replace('/\D/', '', $request->document);

        $customers = Customer::findByNameOrCpf($request->name, $document);

        return $customers->map(function ($customer) {
            return new CustomerEntity($customer);
        })->toArray();
    }

    public function update(CustomerUpdateRequest $request, int $id): CustomerEntity
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return new CustomerEntity($customer);
    }

    public function delete(int $id): CustomerEntity
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return new CustomerEntity($customer);
    }
}
