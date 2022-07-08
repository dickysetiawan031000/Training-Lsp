<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\front\DashboardController as FrontDashboardController;
use App\Models\Buy;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', dd(Product::with('buy')->whereId('1')->first()));

// dd(Customer::with('buy')->whereId('1')->first());

//Front
Route::resource('/', FrontDashboardController::class);
Route::resource('/register', RegisterController::class);
Route::resource('/login', LoginController::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Admin
Route::group(
    ['middleware' => ['auth', 'checkRole:1']],
    function () {

        Route::prefix('admin')->name('admin.')->group(function () {

            Route::resource('/product', ProductController::class);
            Route::resource('/dashboard', DashboardController::class);
        });
    }
);

//Customer
Route::group(
    ['middleware' => ['auth', 'checkRole:2']],
    function () {

        Route::prefix('customer')->name('customer.')->group(function () {
            Route::resource('/dashboard', CustomerDashboardController::class);
        });
    }
);
