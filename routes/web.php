<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\VideoGamesListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::post('/store', [VideoGamesListController::class, 'StoreVideoGame'])-> name('store');

Route::get('/Create', [PageController::class, 'create'])->name('create');
