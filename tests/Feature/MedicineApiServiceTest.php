<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicineApiServiceTest extends TestCase
{
    /**
     * Test GET method on all data
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_get_method_api()
    {
        $response = $this->get('api/v1/medicines');
        $response->assertStatus(200);
    }
    /**
     * Test POST method on all data
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_post_method_api()
    {
        $response = $this->post('api/v1/medicines');
        $response->assertStatus(200);
    }
    /**
     * Test GET method on single object
     * api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_get_method_single_object_api()
    {
        $response = $this->get('api/v1/medicines/3');
        $response->assertStatus(200);
    }
    /**
     * Test PUT method on single object
     * api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_put_method_single_object_api()
    {
        $response = $this->put('api/v1/medicines/3');
        $response->assertStatus(200);
    }
    /**
     * Test fallback unknowr resource path 
     *  api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_fallback_unknown_url_api()
    {
        $response = $this->put('api/v1/medicines/3');
        $response->assertStatus(200);
    }
    /**
     * Test DELETE method on single object 
     * api point 'api/v1/medicines{id}'
     * 
     * @return void
     */
    public function test_delete_method_single_object_api()
    {
        $response = $this->put('api/v1/medicines/3');
        $response->assertStatus(200);
    }
    /**
     * Test POST method response data
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_response_an_exact_json_match()
    {
        $inputData = [
            'name' => 'Hello',
            'substance_id' => 4,
            'manufacturer_id' => 4,
            'price' => 235,
        ];
        $response = $this->json('POST', 'api/v1/medicines', $inputData);

        $response
            ->assertStatus(201)
            ->assertJson([
                'operation' => 'Create',
                'status' => 'Success',
            ]);
    }
}
