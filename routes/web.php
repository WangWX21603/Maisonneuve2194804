<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiantcontroller;
use App\Http\Controllers\Villecontroller;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileController;



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

Route::get('', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store']);
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('etudiant-edit/{etudiant}', [EtudiantController::class, 'destroy']);


Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


Route::get('article', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('article-create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('article-create', [ArticleController::class, 'store'])->middleware('auth');
Route::get('article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('article-edit/{article}', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('article-edit/{article}', [ArticleController::class, 'destroy'])->middleware('auth');


Route::get('file', [FileController::class, 'index'])->name('file.index')->middleware('auth');
Route::get('file/{file}', [FileController::class, 'show'])->name('file.show')->middleware('auth');
Route::get('file-create', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('file-create', [FileController::class, 'store'])->middleware('auth');
Route::get('file-edit/{file}', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('file-edit/{file}', [FileController::class, 'update'])->middleware('auth');
Route::delete('file-edit/{file}', [FileController::class, 'destroy'])->middleware('auth');