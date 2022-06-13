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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
// ->middleware('isSuperadmin')
;

Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('isSuperadmin');
    
    Route::get('/new', [App\Http\Controllers\UserController::class, 'create'])->name('users_create')->middleware('isSuperadmin');
    Route::post('/new', [App\Http\Controllers\UserController::class, 'store'])->name('users_store')->middleware('isSuperadmin');

    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users_show')->middleware('isSuperadmin');

    Route::put('/{id}/disable', [App\Http\Controllers\UserController::class, 'disable'])->name('users_disable')->middleware('isSuperadmin');

    Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users_edit')->middleware('isSuperadmin');
    Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users_update')->middleware('isSuperadmin');
});