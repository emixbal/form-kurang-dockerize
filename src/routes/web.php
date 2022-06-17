<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('isSuperadmin');
    
    Route::get('/new', [App\Http\Controllers\UserController::class, 'create'])->name('users_create')->middleware('isSuperadmin');
    Route::post('/new', [App\Http\Controllers\UserController::class, 'store'])->name('users_store')->middleware('isSuperadmin');

    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users_show')->middleware('isSuperadmin');

    Route::put('/{id}/disable', [App\Http\Controllers\UserController::class, 'disable'])->name('users_disable')->middleware('isSuperadmin');

    Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users_edit')->middleware('isSuperadmin');
    Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users_update')->middleware('isSuperadmin');
});

Route::group(['prefix' => 'anggota', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota');

    Route::get('/new', [App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota_create');
    Route::post('/new', [App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota_store');

    Route::get('/{id}', [App\Http\Controllers\AnggotaController::class, 'show'])->name('anggota_show');

    Route::get('/{id}/edit', [App\Http\Controllers\AnggotaController::class, 'edit'])->name('anggotas_edit');
});