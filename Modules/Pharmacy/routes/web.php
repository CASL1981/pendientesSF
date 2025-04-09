<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacy\App\Http\Controllers\PharmacyController;
use Modules\Pharmacy\App\Http\Controllers\StockController;

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

Route::group(['auth:sanctum', config('jetstream.auth_session'),'verified'], function () {
    Route::get('pharmacy', [PharmacyController::class, 'index'])->name('pharmacy');

    // ruta para gestionar los pendientes
    Route::view('pendings', 'pharmacy::livewire.pending.index')->name('pharmacy.pending')->middleware('can_view:pending');
    Route::view('apply/stock/pendings', 'pharmacy::livewire.applystockpending.index')->name('pharmacy.apply.stock.pending')->middleware('can_view:applystockpending');

    // ruta para cargar desde excel las existencias
    Route::get('stock', [StockController::class, 'index'])->name('pharmacy.stock')->middleware('can_view:pending');
    Route::post('stock', [StockController::class, 'store'])->name('pharmacy.stock.import')->middleware('can_view:pending');
    Route::post('stock/delete', [StockController::class, 'destroy'])->name('pharmacy.stock.delete')->middleware('can_view:pending');

    // ruta para adicionar productos los pendientes
    Route::view('detailpending', 'pharmacy::livewire.detailpending.index')->name('pharmacy.detail.pending');
    Route::post('import/detailpending', [StockController::class, 'detailpending'])->name('pharmacy.detail.pending.import')->middleware('can_view:pending');

    // ruta para adicionar productos agotados
    Route::view('exhausted', 'pharmacy::livewire.exhausted.index')->name('pharmacy.exhausted')->middleware('can_view:exhausted');
});