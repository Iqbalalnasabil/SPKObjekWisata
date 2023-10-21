<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\PenilaianController;

//
Route::get('/', [HomeController::class, 'index']);

//Auth
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticated');
Route::get('/logout', 'AuthController@logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('kriteria', 'KriteriaController')->except(['create']);
Route::resource('alternatif', 'AlternatifController')->except(['create', 'show']);
Route::resource('crips', 'CripsController')->except(['index', 'create', 'show']);
Route::resource('/penilaian', 'PenilaianController');
Route::get('/perhitungan','AlgoritmaController@index')->name('perhitungan.index');