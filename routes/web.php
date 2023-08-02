<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IskonRegController;

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
    return view('Backend.layout.master');
});

Route::resource('iscon-reg',IskonRegController::class)->only('index','create','store');
Route::get('iscon-reg/{id}/edit',[IskonRegController::class,'edit'])->name('iscon-reg.edit');
Route::put('iscon-reg/{id}',[IskonRegController::class,'update'])->name('iscon-reg.update');
Route::post('iscon-reg/{id}',[IskonRegController::class,'destroy'])->name('iscon-reg.destroy');


