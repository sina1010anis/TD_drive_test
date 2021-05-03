<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('front.section.index');})->middleware('auth');
Route::get('/test', function () {return 'test';})->middleware('auth');
Route::post('/logout', [\App\Http\Controllers\IndexController::class,'logout'])->name('user.logout')->middleware('auth');
Route::post('/new/file' , [\App\Http\Controllers\IndexController::class,'newFile'])->name('newFile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
