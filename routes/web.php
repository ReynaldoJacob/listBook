<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    return view('catalogs.form');
});
Route::resource('books', BookController::class);
Route::get('getViewBook', [BookController::class, 'getViewBook'])->name('getViewBook');
Route::get('getInfoBook', [BookController::class, 'getInfoBook'])->name('getInfoBook');
Route::post('saveEditBook', [BookController::class, 'saveEditBook'])->name('saveEditBook');
Route::get('getBooks', [BookController::class, 'getBooks'])->name('getBooks');
Route::post('deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');