<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\UserController;

use App\Services\ReturnDates;
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

//Funktionalität: , accounts
Route::post('/store', [WeekController::class, 'store']);

Route::post('/delete', [WeekController::class, 'delete']);

Route::post('/changeDate', [DateController::class, 'change']);

Route::get('/', [MainController::class, 'show']);

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);