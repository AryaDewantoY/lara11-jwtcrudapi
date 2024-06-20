<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');

    // Route::get('/user/{id}', [AuthController::class, 'get'])->name('get');
    Route::post('/user/{id}', [AuthController::class, 'update'])->name('update');
    Route::delete('/user/{id}', [AuthController::class, 'destroy'])->middleware('auth:api')->name('deleteUser');
});
