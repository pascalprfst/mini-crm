<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Livewire\CustomerList;
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

    Route::get('import-export', function () {
        return view('import-export');
    })->name('import-export');

    Route::get('/customers', CustomerList::class)->name('customers.index');
    Route::resource('customers', CustomerController::class)->only('show', 'create', 'store');

    Route::get('/contacts', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/form-builder', ModelFormBuilder::class)->name('form-builder');
    Route::get('/table-builder', TableBuilder::class)->name('table-builder');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
