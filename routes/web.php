<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PetServiceController;
use App\Http\Controllers\TransactionController;


Route::resource('customers', CustomerController::class);
Route::resource('pets', PetController::class);
Route::resource('services', ServiceController::class);
Route::resource('doctors', DoctorController::class);

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('/create', [TransactionController::class, 'create'])->name('create');
    Route::post('/store', [TransactionController::class, 'store'])->name('store');
    Route::get('/{id}', [TransactionController::class, 'show'])->name('show');
    Route::post('/{id}/update-status/{status}', [TransactionController::class, 'updateStatus'])->name('updateStatus');
});

Route::get('/customers/{id}/pets', [CustomerController::class, 'getPets']);
Route::get('/get-pets/{customerId}', [TransactionController::class, 'getPetsByCustomer']);
Route::post('/get-services', [TransactionController::class, 'getServicesByPets']);
