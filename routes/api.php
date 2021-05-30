<?php

use Illuminate\Support\Facades\Route;
use App\Http\Services\Api\MedicineApiService;
use App\Http\Controllers\Auth\AuthController;
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
    return response()->json(['error' => 'Not Found!'], 404);
});
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'user']);
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('/')->group(function () {
        Route::apiResource('medicines', MedicineApiService::class);
    });
});
