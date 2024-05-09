<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AksesOrdersController;
use App\Http\Controllers\AksespaymentsController;
use App\Http\Controllers\AksesProductsController;
use App\Http\Controllers\AksesCustomersController;
use App\Http\Controllers\AksesEmployeesController;
use App\Http\Controllers\AksesOrderDetailsController;
use App\Http\Controllers\AksesProductLinesController;

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

// Route::get('callApiWithToken', [ApiController::class, 'memanggilApi']);

Route::get('productLinesGetAllData', [AksesProductLinesController::class, 'memanggilApiGetAllData']);
Route::get('productLinesGetByKey/{key}', [AksesProductLinesController::class, 'memanggilApiGetByKey']);
Route::get('productLinesPost', [AksesProductLinesController::class, 'memanggilApiPost']);
Route::get('productLinesPut/{key}', [AksesProductLinesController::class, 'memanggilApiPut']);
Route::get('productLinesDelete/{key}', [AksesProductLinesController::class, 'memanggilApiDelete']);

Route::get('employeesGetAllData', [AksesEmployeesController::class, 'memanggilApiGetAllData']);
Route::get('employeesGetByID/{employeeNumber}', [AksesEmployeesController::class, 'memanggilApiGetByID']);
Route::get('employeesPost', [AksesEmployeesController::class, 'memanggilApiPost']);
Route::get('employeesPut/{employeeNumber}', [AksesEmployeesController::class, 'memanggilApiPut']);
Route::get('employeesDelete/{employeeNumber}', [AksesEmployeesController::class, 'memanggilApiDelete']);

Route::get('orderDetailsGetAllData', [AksesOrderDetailsController::class, 'memanggilApiGetAllData']);
Route::get('orderDetailGetByID/{id}', [AksesOrderDetailsController::class, 'memanggilApiGetByID']);
Route::get('orderDetailPost', [AksesOrderDetailsController::class, 'memanggilApiPost']);
Route::get('orderDetailPut/{orderNumber}/{productCode}', [AksesOrderDetailsController::class, 'memanggilApiPut']);
Route::get('orderDetailDelete/{orderNumber}/{productCode}', [AksesOrderDetailsController::class, 'memanggilApiDelete']);

Route::get('paymentsGetAllData', [AksespaymentsController::class, 'memanggilApiGetAllData']);
Route::get('paymentGetByID/{id}', [AksespaymentsController::class, 'memanggilApiGetByID']);
Route::get('paymentPost', [AksespaymentsController::class, 'memanggilApiPost']);
Route::get('paymentPut/{customerNumber}/{checkNumber}', [AksespaymentsController::class, 'memanggilApiPut']);
Route::get('paymentDelete/{customerNumber}/{checkNumber}', [AksespaymentsController::class, 'memanggilApiDelete']);

Route::get('productsGetAllData', [AksesProductsController::class, 'memanggilApiGetAllData']);
Route::get('productGetByID/{key}', [AksesProductsController::class, 'memanggilApiGetByID']);
Route::get('productPost', [AksesProductsController::class, 'memanggilApiPost']);
Route::get('productPut/{key}', [AksesProductsController::class, 'memanggilApiPut']);
Route::get('productDelete/{key}', [AksesProductsController::class, 'memanggilApiDelete']);

Route::get('ordersGetAllData', [AksesOrdersController::class, 'memanggilApiGetAllData']);
Route::get('orderGetByID/{id}', [AksesOrdersController::class, 'memanggilApiGetByID']);
Route::get('orderPost', [AksesOrdersController::class, 'memanggilApiPost']);
Route::get('orderPut/{orderNumber}', [AksesOrdersController::class, 'memanggilApiPut']);
Route::get('orderDelete/{orderNumber}', [AksesOrdersController::class, 'memanggilApiDelete']);

Route::get('customersGetAllData', [AksesCustomersController::class, 'memanggilApiGetAllData']);
Route::get('customerGetByID/{customerNumber}', [AksesCustomersController::class, 'memanggilApiGetByID']);
Route::get('customerPost', [AksesCustomersController::class, 'memanggilApiPost']);
Route::get('customerPut/{customerNumber}', [AksesCustomersController::class, 'memanggilApiPut']);
Route::get('customerDelete/{customerNumber}', [AksesCustomersController::class, 'memanggilApiDelete']);

Route::get('/', function () {
    return view('welcome');
});
