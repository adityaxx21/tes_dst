<?php

use App\Http\Controllers\Authentication_Controller;
use App\Http\Controllers\Products_Controller;
use App\Http\Controllers\Transactions_Controller;
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
// Authentication
Route::get('/register', [Authentication_Controller::class, 'index']);
Route::post('/login', [Authentication_Controller::class, 'index_post']);
Route::post('/logout', [Authentication_Controller::class, 'index_logout']);

// Products
Route::get('/products', [Products_Controller::class, 'index']);
Route::get('/products/{uuid}', [Products_Controller::class, 'index_detail']);
Route::post('/products_update/{uuid}', [Products_Controller::class, 'index_update']);
Route::post('/products_post/{uuid}', [Products_Controller::class, 'index_post']);
Route::post('/products_delete/{uuid}', [Products_Controller::class, 'index_delete']);

// Transaction
Route::get('/transactions', [Transactions_Controller::class, 'index']);
Route::get('/transactions/{uuid}', [Transactions_Controller::class, 'index_detail']);
Route::post('/transactions_update/{uuid}', [Transactions_Controller::class, 'index_update']);
Route::post('/transactions_post/{uuid}', [Transactions_Controller::class, 'index_post']);
Route::post('/transactions_delete/{uuid}', [Transactions_Controller::class, 'index_delete']);