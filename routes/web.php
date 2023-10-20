<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[DiscountController::class,'index']);
Route::get('post-save/{id}', [DiscountController::class, 'insert']);
Route::get('post-delete/{id}', [DiscountController::class, 'delete']);