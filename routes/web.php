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
    if (auth()->user() == null) {
        return redirect()->route('login');
    }
    return view('objednavka');
});

Route::get('/onas', function () {
    return view('onas');
});

Route::get('/košík', function () {
    if (auth()->user() == null) {
        return redirect()->route('login');
    }
    return view('shop_cart');
});

Route::get('/items/{type?}', [\App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/createItem', [\App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
Route::get('/items/edit/{item}', [\App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::get('/items/show/{item}', [\App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
Route::get('/items/cart/add/{item}', [\App\Http\Controllers\ItemController::class, 'add_to_cart'])->name('items.add_to_cart');
Route::get('/items/cart/delete/{id}', [\App\Http\Controllers\ItemController::class, 'delete_cart_item'])->name('items.delete_cart_item');
Route::get('/items/cart/addQuantity/{id}', [\App\Http\Controllers\ItemController::class, 'cart_item_quantity_add'])->name('items.cart_item_quantity_add');
Route::get('/items/cart/subQuantity/{id}', [\App\Http\Controllers\ItemController::class, 'cart_item_quantity_sub'])->name('items.cart_item_quantity_sub');
Route::post('/createItem', [\App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::post('/items/{item}', [\App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [\App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');

Route::get('/createItemType', function () {
    return view('createItemType');
});
Route::post('/createItemType', [\App\Http\Controllers\ItemTypeController::class, 'store'])->name('itemType.store');

Route::post('/order', [\App\Http\Controllers\HeaderOrderController::class, 'store'])->name('headerOrder.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
