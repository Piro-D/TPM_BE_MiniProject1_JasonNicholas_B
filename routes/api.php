<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', function (){
    return response() -> json([
        'success'=> false,
        'message' => 'Please login first',
    ]);
});

Route::post('/register', [ApiAuthController::class,'Register']);
Route::post('/login', [ApiAuthController::class,'Login']);

Route::middleware(['auth:api'])->group(function() {
    Route::get('/', [ApiBookController::class, 'index']);
    Route::post('/save', [ApiBookController::class, 'save']);
    Route::put('/update/{id}', [ApiBookController::class,'update']);
    Route::delete('/delete/{id}', [ApiBookController::class,'delete']);
});