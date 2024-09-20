<?php

use Illuminate\Support\Facades\Route;
use Modules\SGC\App\Http\Controllers\SGCController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
| Find => Hallazgo
| Finding => Hallazgos
*/

Route::group(['auth:sanctum', config('jetstream.auth_session'),'verified'], function (): void
{
    Route::get('sgc', [SGCController::class, 'index'])->name('sgc');

    // ruta para gestionar los ciclos, listas de crequeo, NC y Observaciones
    Route::view('cycles', 'sgc::livewire.cycle.index')->name('sgc.cycles')->middleware('can_view:cycle');
    Route::view('checklist', 'sgc::livewire.checklist.index')->name('sgc.checklists')->middleware('can_view:checklist');
    Route::view('checklist.detail.criteria', 'sgc::livewire.criteria.index')
    ->name('sgc.checklist.detail.criteria')->middleware('can_view:criterion');
    Route::view('checklist.criterion.finding', 'sgc::livewire.find.index')
    ->name('sgc.checklist.criterion.finding')->middleware('can_view:find');
});