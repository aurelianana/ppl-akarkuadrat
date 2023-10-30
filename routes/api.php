<?php

use App\Http\Controllers\Api\AkarKuadratController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group( ['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/akar-kuadrat', [AkarKuadratController::class, 'index']);
    Route::get('/akar-kuadrat/{angka}', [AkarKuadratController::class, 'hitungAkarKuadrat']);
    Route::get('/akar-kuadrat-sql/{angka}', [AkarKuadratController::class, 'hitungAkarKuadratSqrt']);
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});

Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::post('register', [AuthController::class, 'register'])->name('api.register');
