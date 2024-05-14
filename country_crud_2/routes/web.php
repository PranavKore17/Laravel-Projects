<?php

use App\Http\Controllers\DropDownController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('dropdown',[DropDownController::class,'index']);

Route::post('api/fetch-state',[DropDownController::class,'fetchState'])->name('fetch-state');

Route::post('api/fetch-cities',[DropDownController::class,'fetchCity'])->name('fetch-cities');
