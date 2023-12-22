<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AnggotaKKController;
use App\Http\Controllers\HubunganKKController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/Penduduk', PendudukController::class)->middleware(['auth:sanctum']);
Route::apiResource('/KK', KKController::class)->middleware(['auth:sanctum']);
Route::apiResource('/HubunganKK', HubunganKKController::class)->middleware(['auth:sanctum']);
Route::apiResource('/Agama', AgamaController::class)->middleware(['auth:sanctum']);
Route::apiResource('/AnggotaKK', AnggotaKKController::class)->middleware(['auth:sanctum']);
Route::apiResource('/Dashboard', DashboardController::class)->middleware(['auth:sanctum']);

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);

