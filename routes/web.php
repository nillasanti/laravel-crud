<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;

Route::get('/', function () {
    return view('religion.list');
});

Route::resource('/religion', \App\Http\Controllers\ReligionController::class);
// Route::resource('/religion/create', \App\Http\Controllers\ReligionController::create);
// Route::get('/religion/create', 'ReligionController@create')->name('create_religion');
Route::get('/religion/create', [ReligionController::class, 'create']);
Route::post('/religion/store', [ReligionController::class, 'store']);
Route::put('/religion/edit', [ReligionController::class, 'edit']);
Route::put('/religion/update', [ReligionController::class, 'update']);
Route::post('/religion/delete', [ReligionController::class, 'destroy']);