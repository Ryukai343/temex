<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
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

Route::get('/onas', function () {
    return view('onas');
});

// Items
Route::get('/items/{type?}', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/detail/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('/product_search', [ItemController::class, 'search'])->name('items.search');
Route::get('/type/{type_id}', [ItemController::class, 'getByType'])->name('items.getByType');

// Cart
Route::post('/cart/add/{item}', [CartController::class, 'item_add'])->name('cart.item_add');
Route::middleware('auth')->group(function () {
    Route::delete('/cart/delete/{id}', [CartController::class, 'item_delete'])->name('cart.item_delete');
    Route::post('/cart/addQuantity/{id}', [CartController::class, 'item_quantity_add'])->name('cart.item_quantity_add');
    Route::post('/cart/subQuantity/{id}', [CartController::class, 'item_quantity_sub'])->name('cart.item_quantity_sub');
});

//authorization
Route::middleware('auth')->group(function () {
    //order
    Route::get('/košík', function () {
        return view('shop_cart');
    });
    Route::get('/objednavka', function () {
        if (!session('cart')) {
            return view('shop_cart');
        }
        return view('objednavka');
    });
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orderDetail/{order}', [OrderController::class, 'detail'])->name('order.detail');

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin
Route::middleware([Admin::class])->group(function () {
    //users control
    Route::get('/users', [ProfileController::class, 'usersShow'])->name('profile.usersShow');
    Route::post('/user/role/{user}', [ProfileController::class, 'userChangeRole'])->name('user.changeRole');
    //order change status
    Route::post('/order/status/{headerOrder}', [OrderController::class, 'update'])->name('order.update');
    //items
    Route::get('/createItem', [ItemController::class, 'create'])->name('items.create');
    Route::post('/createItem', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/edit/{item}', [ItemController::class, 'edit'])->name('items.edit');
    Route::post('/items/update/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/delete/{id}', [ItemController::class, 'destroy'])->name('items.destroy');


    //items type
    Route::get('/createItemsType', function () {
        return view('createItemType');
    });
    Route::post('/createItemsType', [ItemTypeController::class, 'store'])->name('itemsType.store');
    Route::get('/ItemsType/edit/{type}', [ItemTypeController::class, 'edit'])->name('itemsType.edit');
    Route::post('/ItemsType/update/{type}', [ItemTypeController::class, 'update'])->name('itemsType.update');
    Route::delete('/ItemsType/delete/{type}', [ItemTypeController::class, 'destroy'])->name('itemsType.destroy');
});

require __DIR__.'/auth.php';
