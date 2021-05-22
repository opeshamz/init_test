<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipingController;
use App\Http\Controllers\PaymentController;

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
Route::get('/calculate', function () {
});
Route::post('calculate', [ShipingController::class, 'calculate'])->name('calculate');
Route::post('payment', [ShipingController::class, 'payment'])->name('payment');
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
