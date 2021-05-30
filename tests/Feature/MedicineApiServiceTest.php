<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\Medicine;
use App\Models\User;
use App\Models\Substance;
use App\Models\Manufacturer;

// TODO: Keep DRY, get out headers in other function
class MedicineApiServiceTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * Test GET method on all data
     * api point GET 'api/v1/medicines'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_get_method_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->get('api/v1/medicines');

        $response->assertStatus(200);
    }
    /**
     * Test POST method insert object
     * api point POST 'api/v1/medicines'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_post_method_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $substance = Substance::factory()->create();
        $manufacturer = Manufacturer::factory()->create();
        $model = Medicine::factory()->make();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->post('api/v1/medicines/', $model->getAttributes());
        $response->assertStatus(201);
    }
    /**
     * Test GET method on single object
     * api point GET 'api/v1/medicines{id}'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_get_method_single_object_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->get('api/v1/medicines/' . $model->id);
        $response->assertStatus(200);
    }
    /**
     * Test PUT method on single object
     * api point PUT 'api/v1/medicines{id}'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_put_method_single_object_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $newModel = Medicine::factory()->make();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->put('api/v1/medicines/' . $model->id, $newModel->getAttributes());

        $response->assertStatus(201);
    }

    /**
     * Test DELETE method on single object 
     * api point DELETE 'api/v1/medicines{id}'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_delete_method_single_object_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->delete('api/v1/medicines/' . $model->id);

        $response->assertStatus(200);
    }

    /**
     * Test fallback unknown GET resource path 
     *  api point GET 'api/v1/medicines{id}'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_get_fallback_unknown_url_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->get('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }

    /**
     * Test fallback unknown PUT resource path 
     *  api point PUT 'api/v1/medicines{id}'
     * Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_put_fallback_unknown_url_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->put('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }

    /**
     * Test fallback unknown DELETE resource path 
     *  api point DELETE 'api/v1/medicines{id}'
     *  Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_delete_fallback_unknown_url_api()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->delete('api/v1/medicines/99999999');
        $response->assertStatus(404);
    }


    /**
     * Test POST method response data format
     * api point POST 'api/v1/medicines'
     *  Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_store_response_an_exact_json_match()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->make();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->post('api/v1/medicines/', $model->getAttributes());

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
     * api point GET 'api/v1/medicines/{id}'
     *  Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_show_response_an_exact_json_match()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->get('api/v1/medicines/' . $model->id);
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
     * api point PUT 'api/v1/medicines'
     *  Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_update_response_an_exact_json_match()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $newModel = Medicine::factory()->make();
        $response = $this->withHeaders([
            'Authorization' => $head,
        ])->put('api/v1/medicines/' . $model->id, $newModel->getAttributes());
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
     * api point DELETE 'api/v1/medicines'
     *  Headers - Authorization: Bearer {Auth token}
     * 
     * @return void
     */
    public function test_delete_response_an_exact_json_match()
    {
        $password = 'passtest123';
        $user = User::factory()->create([
            'password' => Hash::make('passtest123')
        ]);
        $request = ['email' => $user->getAttributes()['email'], 'password' => $password];
        $getToken = $this->post('api/v1/auth/login', $request);
        $token = $getToken->getData()->access_token;
        $head = "Bearer " . $token;

        $model = Medicine::factory()->create();
        $response =  $this->withHeaders([
            'Authorization' => $head,
        ])->delete('api/v1/medicines/' . $model->id);
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
