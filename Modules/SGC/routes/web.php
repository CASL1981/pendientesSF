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
    Route::view('checklist.detail.criteria', 'sgc::livewire.criteria.index')->name('sgc.checklist.detail.criteria')->middleware('can_view:criterion');
    Route::view('checklist.criterion.finding', 'sgc::livewire.find.index')->name('sgc.checklist.criterion.finding')->middleware('can_view:find');
    Route::view('checklist.criterion.observation', 'sgc::livewire.observation.index')->name('sgc.checklist.criterion.observation')->middleware('can_view:observation');

    // ruta para gestionar auditores y auditados
    Route::view('auditor', 'sgc::livewire.auditor.index')->name('sgc.auditor')->middleware('can_view:auditor');
    Route::view('audited', 'sgc::livewire.audited.index')->name('sgc.audited')->middleware('can_view:audited');

    // ruta para generar los reportse
    Route::view('sgc/informeAuditoria', 'sgc::livewire.report.index')->name('sgc.report.informe.auditoria')->middleware('can_view:report');
    Route::get('sgc/pdf/informeauditoria/{id?}', [SGCController::class, 'informeAuditoria'])->name('sgc.pdf.informe.auditoria');
});