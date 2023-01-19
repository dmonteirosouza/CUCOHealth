<?php

namespace Entities;

use App\Entities\CustomerEntity;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerEntityTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_customer()
    {
        $customer = new CustomerEntity(Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]));

        $this->assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);
    }

    public function test_update_customer()
    {
        $customer = new CustomerEntity(Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]));

        $customer->update([
            'name' => 'Jane Doe',
            'document' => '09876543210',
            'birthdate' => '2021-01-02',
            'phone' => '11987654321',
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'Jane Doe',
            'document' => '09876543210',
            'birthdate' => '2021-01-02',
            'phone' => '11987654321',
        ]);
    }

    public function test_delete_customer()
    {
        $customer = new CustomerEntity(Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]));

        $customer->delete();

        $this->assertDatabaseMissing('customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);
    }

    public function test_get_customer()
    {
        $customer = new CustomerEntity(Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]));

        $this->assertInstanceOf(Customer::class, $customer->get());
    }
}
