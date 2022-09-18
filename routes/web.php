<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\FreelanceController;


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
    return view('comingsoom');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/login',[UserController::class, 'login']);
Route::get('/register',[UserController::class, 'register']);
Route::post('/saveaccount',[UserController::class, 'saveaccount']);
Route::post('/loginaction',[UserController::class, 'loginaction']);

Route::get('/freelancer/home',[FreelanceController::class, 'freelancehome']);
Route::get('/freelancer/add-service',[FreelanceController::class, 'freelancehome']);
Route::get('/freelancer/my-service',[FreelanceController::class, 'addservice']);
Route::get('/freelancer/orders',[FreelanceController::class, 'orderservice']);





