<?php

use App\Http\Controllers\suratdomisiliController;
use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    // Endpoint untuk menyimpan status login
    Route::post('/save-login-status', 'AuthController@saveLoginStatus');
});

//Login Logout
Route::post('/mobile/login', [apiController::class, 'login']);
Route::get('/mobile/cekLogin', [apiController::class, 'cekLogin']);
Route::post('/mobile/logout', [apiController::class, 'logout']);

//Register
Route::post('/mobile/register', [apiController::class, 'register']);

//Update profile
Route::post('/mobile/updateProfil', [apiController::class, 'updateProfil']);

//cekUseraktif
Route::get('/mobile/userAktif', [apiController::class, 'userAktif']);

//Buat Surat
Route::post('/mobile/buatdomisili', [apiController::class, 'createdomisili']);
Route::post('/mobile/buatkeramaian', [apiController::class, 'createkeramaian']);
Route::post('/mobile/buatusaha', [apiController::class, 'createusaha']);
Route::post('/mobile/buatnikah', [apiController::class, 'createnikah']);

//Riwayat Surat
Route::get('/mobile/riwayatdomisili', [apiController::class, 'riwayatdomisili']);
Route::get('/mobile/riwayatusaha', [apiController::class, 'riwayatusaha']);
Route::get('/mobile/riwayatnikah', [apiController::class, 'riwayatnikah']);
Route::get('/mobile/riwayatkeramaian', [apiController::class, 'riwayatkeramaian']);

Route::get('/posts', [suratdomisiliController::class, 'index']);
