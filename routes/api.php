<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OfficesController;
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
    Route::put('orderdetails/{orderNumber}/{productCode}', [OrderdetailsController::class, 'update']);
    Route::delete('orderdetails/{orderNumber}/{productCode}', [OrderdetailsController::class, 'destroy']);
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('customer', CustomersController::class);
    Route::resource('offices', OfficesController::class);
    Route::get('payments', [PaymentsController::class, 'index']);
    Route::get('payments/{customerNumber}', [PaymentsController::class, 'show']);
    Route::post('payments', [PaymentsController::class, 'store']);
    Route::put('payments/{customerNumber}/{checkNumber}', [PaymentsController::class, 'update']);
    Route::delete('payments/{customerNumber}/{checkNumber}', [PaymentsController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

