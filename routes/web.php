<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'pelanggan']);
Route::get('/pelanggan', [HomeController::class, 'pelanggan']);
Route::get('/staf', [HomeController::class, 'staf']);
Route::get('/obat', [HomeController::class, 'obat']);