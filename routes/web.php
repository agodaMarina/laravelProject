<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('categories', App\Http\Controllers\CategorieController::class);





Route::resource('articles', App\Http\Controllers\ArticleController::class);


Route::resource('filieres', App\Http\Controllers\filiereController::class);


Route::resource('etudiants', App\Http\Controllers\etudiantController::class);
