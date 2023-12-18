<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\detailsuratController;
use App\Http\Controllers\suratdomisiliController;
use App\Http\Controllers\suratkeramaianController;
use App\Http\Controllers\suratnikahController;
use App\Http\Controllers\suratusahaController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});

// Admin
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //domisili
    Route::controller(suratdomisiliController::class)->prefix('domisili')->group(function () {
        Route::get('', 'index')->name('domisili');
        Route::get('create', 'create')->name('domisili.create');
        Route::post('store', 'store')->name('domisili.store');
        Route::get('show/{id}', 'show')->name('domisili.show');
        Route::get('edit/{id}', 'edit')->name('domisili.edit');
        Route::put('edit/{id}', 'update')->name('domisili.update');
        Route::delete('destroy/{id}', 'destroy')->name('domisili.destroy');
        Route::put('update/{id}', 'pengajuanUpdate')->name('domisili.updateStatus');
        Route::get('cetak/{id}', 'cetak')->name('admin.domisili.cetak');
    });

    //keramaian
    Route::controller(suratkeramaianController::class)->prefix('keramaian')->group(function () {
        Route::get('', 'index')->name('keramaian');
        Route::get('create', 'create')->name('keramaian.create');
        Route::post('store', 'store')->name('keramaian.store');
        Route::get('show/{id}', 'show')->name('keramaian.show');
        Route::get('edit/{id}', 'edit')->name('keramaian.edit');
        Route::put('edit/{id}', 'update')->name('keramaian.update');
        Route::delete('destroy/{id}', 'destroy')->name('keramaian.destroy');
        Route::put('update/{id}', 'pengajuanUpdate')->name('keramaian.updateStatus');
        Route::get('cetak/{id}', 'cetak')->name('admin.keramaian.cetak');
    });

    //nikah
    Route::controller(suratnikahController::class)->prefix('nikah')->group(function () {
        Route::get('', 'index')->name('nikah');
        Route::get('create', 'create')->name('nikah.create');
        Route::post('store', 'store')->name('nikah.store');
        Route::get('show/{id}', 'show')->name('nikah.show');
        Route::get('edit/{id}', 'edit')->name('nikah.edit');
        Route::put('edit/{id}', 'update')->name('nikah.update');
        Route::delete('destroy/{id}', 'destroy')->name('nikah.destroy');
        Route::put('update/{id}', 'pengajuanUpdate')->name('nikah.updateStatus');
        Route::get('cetak/{id}', 'cetak')->name('admin.nikah.cetak');
    });

    //usaha
    Route::controller(suratusahaController::class)->prefix('usaha')->group(function () {
        Route::get('', 'index')->name('usaha');
        Route::get('create', 'create')->name('usaha.create');
        Route::post('store', 'store')->name('usaha.store');
        Route::get('show/{id}', 'show')->name('usaha.show');
        Route::get('edit/{id}', 'edit')->name('usaha.edit');
        Route::put('edit/{id}', 'update')->name('usaha.update');
        Route::delete('destroy/{id}', 'destroy')->name('usaha.destroy');
        Route::put('update/{id}', 'pengajuanUpdate')->name('usaha.updateStatus');
        Route::get('cetak/{id}', 'cetak')->name('admin.usaha.cetak');
    });



    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});