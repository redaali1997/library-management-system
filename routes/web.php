<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Http\Request;
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
// Routes for books
Route::resource('books', BookController::class);
Route::get('/lang/{locale?}', [UserController::class, 'changeLang'])->name('change-lang');
// Dashboard for authenticated user
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Routes for making orders
Route::middleware('auth')->name('order.')->group(function () {
    Route::post('/order-create/{book}', [OrderController::class, 'create'])->name('create-order');
    Route::post('/order-cancel/{book}', [OrderController::class, 'cancel'])->name('cancel-order');
    Route::post('/order-reverse/{book}', [OrderController::class, 'reverse'])->name('reverse-order');
});

// Routes for admin
Route::middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/admin-panel', [UserController::class, 'adminPanel'])->name('panel');
    Route::post('/order-accept/{order}', [OrderController::class, 'accept'])->name('accept');
    Route::post('/order-refuse/{order}', [OrderController::class, 'refuse'])->name('refuse');
    Route::post('/order-confirm/{order}', [OrderController::class, 'confirm'])->name('confirm');
});

// Redirect / to /books
Route::redirect('/', '/books');

Route::fallback(function (Request $request) {
    return view('books.index')->with('books', Book::filter($request->tag)->paginate(6));
});

require __DIR__ . '/auth.php';
