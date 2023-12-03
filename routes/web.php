<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/cennik', function () {
    return view('cennik');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/objednavka', function () {
    return view('objednavka');
});

Route::get('/onas', function () {
    return view('onas');
});

Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/createItem', [\App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
Route::get('/items/{item}', [\App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::post('/createItem', [\App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::post('/items/{item}', [\App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [\App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');

Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
