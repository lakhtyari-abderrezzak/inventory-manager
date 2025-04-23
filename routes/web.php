<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;       
use App\Livewire\TestLivewire;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('test-livewire', TestLivewire::class)
    ->name('test-livewire');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::resource('products', ProductController::class)
    ->middleware(['auth', 'verified']);
   
Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);

Route::resource('suppliers', SupplierController::class)
    ->middleware(['auth', 'verified']);

Route::resource('customers', CustomerController::class)
    ->middleware(['auth', 'verified']);

Route::resource('orders', OrderController::class)
    ->middleware(['auth', 'verified']);
    
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
