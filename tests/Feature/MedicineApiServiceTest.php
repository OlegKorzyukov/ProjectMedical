<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Medicine;


// test request json
// test request field
// test request empty endpoint

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
     * Test POST method insert object
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_post_method_api()
    {
        $model = Medicine::factory()->make();
        $response = $this->post('api/v1/medicines/', $model->getAttributes());

        $response->assertStatus(201);
    }
    /**
     * Test GET method on single object
     * api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_get_method_single_object_api()
    {
        $model = Medicine::factory()->create();
        $response = $this->get('api/v1/medicines/' . $model->id);
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
        $model = Medicine::factory()->create();
        $newModel = Medicine::factory()->make();
        $response = $this->put('api/v1/medicines/' . $model->id, $newModel->getAttributes());

        $response->assertStatus(201);
    }

    /**
     * Test DELETE method on single object 
     * api point 'api/v1/medicines{id}'
     * 
     * @return void
     */
    public function test_delete_method_single_object_api()
    {
        $model = Medicine::factory()->create();
        $response = $this->delete('api/v1/medicines/' . $model->id);

        $response->assertStatus(200);
    }

    /**
     * Test fallback unknown GET resource path 
     *  api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_get_fallback_unknown_url_api()
    {
        $response = $this->get('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }

    /**
     * Test fallback unknown PUT resource path 
     *  api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_put_fallback_unknown_url_api()
    {
        $response = $this->put('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }

    /**
     * Test fallback unknown DELETE resource path 
     *  api point 'api/v1/medicines{id}'
     *
     * @return void
     */
    public function test_delete_fallback_unknown_url_api()
    {
        $response = $this->delete('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }


    /**
     * Test POST method response data format
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_store_response_an_exact_json_match()
    {
        $model = Medicine::factory()->make();
        $response = $this->post('api/v1/medicines/', $model->getAttributes());
        $response
            ->assertExactJson([
                "operation" => "Create",
                "status" => "Success",
                "model" => [
                    "name" => $response->getData()->model->name,
                    "substance_id" => $response->getData()->model->substance_id,
                    "manufacturer_id" => $response->getData()->model->manufacturer_id,
                    "price" => $response->getData()->model->price,
                    "id" => $response->getData()->model->id,
                ]
            ]);
    }

    /**
     * Test GET method response data format
     * api point 'api/v1/medicines/{id}'
     *
     * @return void
     */
    public function test_show_response_an_exact_json_match()
    {
        $model = Medicine::factory()->create();
        $response = $this->get('api/v1/medicines/' . $model->id);
        $response
            ->assertExactJson([
                'data' => [
                    "name" => $response->getData()->data->name,
                    "substance_id" => $response->getData()->data->substance_id,
                    "manufacturer_id" => $response->getData()->data->manufacturer_id,
                    "price" => $response->getData()->data->price,
                    "id" => $response->getData()->data->id,
                ]
            ]);
    }

    /**
     * Test PUT method response data format
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_update_response_an_exact_json_match()
    {
        $model = Medicine::factory()->create();
        $newModel = Medicine::factory()->make();
        $response = $this->put('api/v1/medicines/' . $model->id, $newModel->getAttributes());
        $response
            ->assertExactJson([
                "operation" => "Update",
                "status" => "Success",
                "model" => [
                    "name" => $response->getData()->model->name,
                    "substance_id" => $response->getData()->model->substance_id,
                    "manufacturer_id" => $response->getData()->model->manufacturer_id,
                    "price" => $response->getData()->model->price,
                    "id" => $response->getData()->model->id,
                ]
            ]);
    }

    /**
     * Test DELETE method response data format
     * api point 'api/v1/medicines'
     *
     * @return void
     */
    public function test_delete_response_an_exact_json_match()
    {
        $model = Medicine::factory()->create();
        $response = $this->delete('api/v1/medicines/' . $model->id);
        $response
            ->assertExactJson([
                "operation" => "Destroy",
                "status" => "Success",
                "model" => [
                    "name" => $response->getData()->model->name,
                    "substance_id" => $response->getData()->model->substance_id,
                    "manufacturer_id" => $response->getData()->model->manufacturer_id,
                    "price" => $response->getData()->model->price,
                    "id" => $response->getData()->model->id,
                ]
            ]);
    }
}
