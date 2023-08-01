<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
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

Route::get('/home', [CustomAuthController::class,'home'])->middleware('isLoggedIn');
 Route::get('/login',[CustomAuthController::class,'login']);
 Route::get('/registration',[CustomAuthController::class,'registration']);
 Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('registerUser');
 Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('loginUser');
 Route::post('/profile',[CustomAuthController::class,'profile'])->name('profile');


