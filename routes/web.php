<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PageController::class,'home'])->name('page.home');
Route::get('/inventory',[ItemController::class,'index'])->name('item.index');
Route::post('/inventory',[ItemController::class,'store'])->name('item.store');
Route::get('/inventory/create',[ItemController::class,'create'])->name('item.create');
Route::get('/inventory/{id}',[ItemController::class,'show'])->name('item.show');
Route::get('/inventory/{id}/edit',[ItemController::class,'edit'])->name('item.edit');
Route::put('/inventory/{id}',[ItemController::class,'update'])->name('item.update');
Route::delete('/inventory/{id}',[ItemController::class,'destroy'])->name('item.destroy');
