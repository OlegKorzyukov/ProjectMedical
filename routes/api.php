<?php

use Illuminate\Support\Facades\Route;
use App\Http\Services\MedicineApiService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});*/

Route::fallback(function () {
    abort(404, 'API resource not found');
});
Route::prefix('/')->group(function () {
    Route::apiResource('medicines', MedicineApiService::class);
});
