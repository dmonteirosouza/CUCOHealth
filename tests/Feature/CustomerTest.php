<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_create_customer()
    {
        $response = $this->post('/api/customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $response->assertStatus(201);
    }

    public function test_update_customer()
    {
        $this->post('/api/customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $response = $this->put('/api/customers/1', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $response->assertStatus(204);
    }

    public function test_delete_customer()
    {
        $this->post('/api/customers', [
            'name' => 'John Doe',
            'document' => '12345678901',
            'birthdate' => '2021-01-01',
            'phone' => '11987654321',
        ]);

        $response = $this->delete('/api/customers/1');

        $response->assertStatus(204);
    }

    public function test_get_customers()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
    }

    public function test_get_customers_with_filters()
    {
        $response = $this->get('/api/customers?name=John&document=12345678901&birthdate=2021-01-01&phone=11987654321');

        $response->assertStatus(200);
    }
}
