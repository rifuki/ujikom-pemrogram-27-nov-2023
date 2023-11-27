<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\AlreadyLogged;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(AuthCheck::class);


Route::prefix('/auth')
    ->controller(AuthController::class)
    ->group(function() {
        Route::get('/register', 'register')->name('auth.register')->middleware(AlreadyLogged::class);
        Route::post('/signup', 'signup')->name('auth.signup')->middleware(AlreadyLogged::class);
        Route::get('/login', 'login')->name('auth.login')->middleware(AlreadyLogged::class);
        Route::post('/signin', 'signin')->name('auth.signin')->middleware(AlreadyLogged::class);
        Route::get('/logout', 'logout')->name('auth.logout')->middleware(AuthCheck::class);
    }
);


Route::prefix('/guru')
    ->controller(GuruController::class)
    ->middleware(AuthCheck::class)
    ->group(function() {
        Route::get('', 'index')->name('guru.index');
        Route::get('/create', 'create')->name('guru.create');
        Route::post('', 'store')->name('guru.store');
        Route::get('/{id}/edit', 'edit')->name('guru.edit');
        Route::put('/{id}', 'update')->name('guru.update');
        Route::delete('/{id}', 'destroy')->name('guru.delete');
    }
);

Route::prefix('/siswa')
    ->controller(SiswaController::class)
    ->middleware(AuthCheck::class)
    ->group(function() {
        Route::get('', 'index')->name('siswa.index');
        Route::get('/create', 'create')->name('siswa.create');
        Route::post('', 'store')->name('siswa.store');
        Route::get('/{id}/edit', 'edit')->name('siswa.edit');
        Route::put('/{id}', 'update')->name('siswa.update');
        Route::delete('/{id}', 'destroy')->name('siswa.delete');
    }
);

Route::prefix('/nilai')
    ->controller(NilaiController::class)
    ->middleware(AuthCheck::class)
    ->group(function() {
        Route::get('', 'index')->name('nilai.index')->middleware(AuthCheck::class);
        Route::get('/create', 'create')->name('nilai.create');
        Route::post('', 'store')->name('nilai.store');
        Route::get('/{id}/edit', 'edit')->name('nilai.edit');
        Route::put('/{id}', 'update')->name('nilai.update');
        Route::delete('/{id}', 'destroy')->name('nilai.delete');
    }
);