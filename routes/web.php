<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;

use App\Http\Services\SuppliesService;
use App\Http\Controllers\SubstanceController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MedicineController;
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
Route::delete('/substance/destroy', [SubstanceController::class, 'destroy'])->name('substance.destroy');
Route::delete('/manufacture/destroy', [ManufacturerController::class, 'destroy'])->name('manufacture.destroy');
Route::delete('/medicine/destroy', [MedicineController::class, 'destroy'])->name('medicine.destroy');
