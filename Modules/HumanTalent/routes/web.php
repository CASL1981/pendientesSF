<?php

use Illuminate\Support\Facades\Route;
use Modules\HumanTalent\App\Http\Controllers\HumanTalentController;

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


Route::group(['auth:sanctum', config('jetstream.auth_session'),'verified'], function (): void
{
    Route::get('humantalent', [HumanTalentController::class, 'index'])->name('humantalent');

    // ruta para gestionar los pendientes
    Route::view('employees', 'humantalent::livewire.employee.index')->name('humantalent.employees')->middleware('can_view:employee');
});