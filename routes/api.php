<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductlinesController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

route::get('getAllUsers', [UserController::class, 'getUsers']);
route::get('getAllUsersToo', [UserController::class, 'getUsers'])->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('collections', CollectionController::class);
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('productlines', ProductlinesController::class);
    Route::resource('employees', EmployeesController::class);
    Route::resource('orderdetails', OrderDetailsController::class);
    Route::resource('payments', PaymentsController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('customer', CustomersController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

