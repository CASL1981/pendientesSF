<?php

use Illuminate\Support\Facades\Route;
use Modules\Shopping\App\Http\Controllers\ShoppingController;

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

Route::group(['auth:sanctum', config('jetstream.auth_session'),'verified',] , function () {
    Route::get('shopping', [ShoppingController::class, 'index'])->name('shopping');

    // ruta para gestionar los productos
    Route::view('products', 'shopping::livewire.product.index')->name('shopping.products')->middleware('can_view:product');
});
