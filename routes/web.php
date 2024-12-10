<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VideoGamesListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::post('/store', [PageController::class, 'StoreVideoGame'])-> name('store');

Route::get('/Create', [PageController::class, 'create'])->name('create')->middleware('islogin');

Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit');

Route::patch('/updateList/{id}', [PageController::class, 'UpdateList'])-> name('UpdateList');

Route::delete('/delete/{id}', [PageController::class, 'DeleteGame'])->name('DeleteGame');

//auth
Route::get('/register', [AuthController::class, 'ShowRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'Register'])->name('RegisterStore');

//login
Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'Login'])->name('loginStore');

//logout
Route::post('/logout', [AuthController::class,'logout'])->name('logout');