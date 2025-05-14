<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/genre/add',[AdminController::class,'add_genre'])->name('admin.genre.add');
Route::post('/admin/genre/store',[AdminController::class,'genre_store'])->name('admin.genre.store');
Route::get('/admin/genre/edit/{id}',[AdminController::class,'genre_edit'])->name('admin.genre.edit');
Route::put('/admin/genre/update',[AdminController::class,'genre_update'])->name('admin.genre.update');
Route::delete('/admin/genre/{id}/delete',[AdminController::class,'genre_delete'])->name('admin.genre.delete');
