<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MobileController::class, 'index'])->name('estimator.index');
Route::get('/devices/{name}', [MobileController::class, 'devices'])->name('estimator.devices');
Route::get('/estimator/{id}', [MobileController::class, 'estimator'])->name('estimator.calculate');
Route::post('/estimator', [MobileController::class, 'store_estimation'])->name('estimator.store_estimation');
