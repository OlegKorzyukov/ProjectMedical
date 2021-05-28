<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;

use App\Http\Services\SuppliesService;
use App\Http\Controllers\SubstanceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::post('/', [BaseController::class, 'store'])->name('store-med');

Route::post('/supplies', [SuppliesService::class, 'splitCollection']);
