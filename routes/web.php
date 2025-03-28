<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Calendar;
use App\Livewire\CustomerList;
use App\Livewire\Export;
use App\Livewire\Import;
use App\Livewire\ModelFormBuilder;
use App\Livewire\TableBuilder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/customers', CustomerList::class)->name('customers.index');
    Route::resource('customers', CustomerController::class)->only('show', 'create', 'store');

    Route::get('/contacts', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/calendar', Calendar::class)->name('calendar');

    Route::get('/form-builder', ModelFormBuilder::class)->name('form-builder');
    Route::get('/table-builder', TableBuilder::class)->name('table-builder');

    Route::get('/imports-exports', [ImportExportController::class, 'index'])->name('imports-exports.index');
    Route::get('/import', Import::class)->name('import');
    Route::get('/export', Export::class)->name('export');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
