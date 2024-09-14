<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacy\App\Http\Controllers\PharmacyController;

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
});
