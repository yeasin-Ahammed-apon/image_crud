<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dev;

Route::get('/', [dev::class, 'home']);
Route::get('/add', [dev::class, 'add']);
Route::post('/add_data', [dev::class, 'add_data']);
Route::get('/edit_data/{id}', [dev::class, 'edit_data']);
Route::post('/update_data', [dev::class, 'update_data']);
Route::get('/delete/{id}/{img}', [dev::class, 'delete_data'])->name('delete');