<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_document_attribute()
    {
        $customer = new \App\Models\Customer();
        $customer->document = '12345678901';
        $this->assertEquals('123.456.789-01', $customer->document);
    }

    public function test_birthdate_attribute()
    {
        $customer = new \App\Models\Customer();
        $customer->birthdate = '2021-01-01';
        $this->assertEquals('01/01/2021', $customer->birthdate);
    }

    public function test_phone_attribute()
    {
        $customer = new \App\Models\Customer();
        $customer->phone = '11987654321';
        $this->assertEquals('(11) 98765-4321', $customer->phone);
    }

    public function test_create_customer()
    {
        $customer = \App\Models\Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);
    }

    public function test_update_customer()
    {
        $customer = \App\Models\Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

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
        $customer = \App\Models\Customer::create([
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $customer->delete();

        $this->assertDatabaseMissing('customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);
    }

    public function test_list_customers()
    {
        $customers = \App\Models\Customer::factory()->count(10)->create();

        $this->assertCount(10, $customers);
    }

    public function test_show_customer()
    {
        $customer = \App\Models\Customer::factory()->create();

        $this->assertDatabaseHas('customers', $customer->getAttributes());
    }

    public function test_search_customer_by_name_or_document()
    {
        $customer = \App\Models\Customer::factory()->create();

        $search = \App\Models\Customer::where('name', 'like', "%{$customer->name}%")
            ->orWhere('document', 'like', "%{$customer->document}%")
            ->first();

        $this->assertDatabaseHas('customers', $customer->getAttributes());
    }
}
