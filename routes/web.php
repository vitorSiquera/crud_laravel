<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [UserController::class, 'store'])->name('login.store-user');


Route::resource('groups', RoleController::class)
    ->parameters(['groups' => 'role'])
    ->names('groups');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index-user', [UserController::class, 'index'])
        ->middleware('permission:users.view')
        ->name('user.index');
    Route::get('/create-user', [UserController::class, 'create'])
        ->middleware('permission:users.create')
        ->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])
        ->middleware('permission:users.create')
        ->name('user.store');
    Route::get('/show-user/{user}', [UserController::class, 'show'])
        ->middleware('permission:users.view')
        ->name('user.show');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])
        ->middleware('permission:users.edit')
        ->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])
        ->middleware('permission:users.edit')
        ->name('user.update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])
        ->middleware('permission:users.delete')
        ->name('user.destroy');
});
