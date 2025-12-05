<?php
namespace Tests\Feature;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    public function test_index_returns_success()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }
}
