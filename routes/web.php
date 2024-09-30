<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\InboundController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InventoryDetailsController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\LocationMovementController;
use App\Http\Controllers\PalletMovementController;



// Rute halaman utama
Route::get('/', [Home::class, 'index'])->name('home');

// Rute untuk tamu (guest)
Route::middleware(['guest'])->group(function() {
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
    
    // Rute untuk halaman form reset password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

    // Rute untuk mengirim email reset password
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');
});

// Rute untuk pengguna yang sudah terautentikasi (auth)
Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [Home::class, 'index'])->name('home');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/inventory/inbound', [InboundController::class, 'index'])->name('inventory.inbound.index');
Route::get('/inventory/inbound/create', [InboundController::class, 'create'])->name('inventory.inbound.create');
Route::post('/inventory/inbound/store', [InboundController::class, 'store'])->name('inbound.store');
// Route untuk halaman Import Data
Route::get('/inventory/inbound/import', [InboundController::class, 'showImportForm'])->name('inventory.inbound.import');
Route::post('/inventory/inbound/import', [InboundController::class, 'import'])->name('inventory.inbound.import');

// Route untuk halaman Add Data
Route::get('/inventory/inbound/add', [InboundController::class, 'create'])->name('inventory.inbound.add');
Route::post('/inventory/inbound/add', [InboundController::class, 'store'])->name('inbound.store');

Route::get('/inventory/inbound/{id}/edit', [InboundController::class, 'edit'])->name('inventory.inbound.edit');
Route::delete('/inventory/inbound/{id}', [InboundController::class, 'destroy'])->name('inventory.inbound.destroy');
Route::put('/inventory/inbound/{id}', [InboundController::class, 'update'])->name('inventory.inbound.update');

Route::get('inventory/detail', [InventoryDetailsController::class, 'index'])->name('inventory.detail.index');
Route::get('inventory/detail/add', [InventoryDetailsController::class, 'create'])->name('inventory.detail.add'); // Mengubah name untuk konsistensi
Route::post('inventory/detail', [InventoryDetailsController::class, 'store'])->name('inventory.store'); // Mengubah name untuk konsistensi
Route::get('inventory/detail/{id}/edit', [InventoryDetailsController::class, 'edit'])->name('inventory.detail.edit');
Route::put('inventory/detail/{id}', [InventoryDetailsController::class, 'update'])->name('inventory.detail.update'); // Mengubah name untuk konsistensi
Route::delete('inventory/detail/{id}', [InventoryDetailsController::class, 'destroy'])->name('inventory.detail.destroy'); // Mengubah name untuk konsistensi

Route::get('/inventory/outbound', [OutboundController::class, 'index'])->name('inventory.outbound.index');
Route::get('/inventory/outbound/add', [OutboundController::class, 'create'])->name('inventory.outbound.add');
Route::post('/inventory/outbound/store', [OutboundController::class, 'store'])->name('inventory.store');

Route::get('/master/location', [LocationController::class, 'index'])->name('master.location.index');
Route::get('/master/location/add', [LocationController::class, 'create'])->name('master.location.add');
Route::post('/master/location', [LocationController::class, 'store'])->name('locations.store');
Route::get('master/location/{id}', [LocationController::class, 'show'])->name('locations.show');
Route::get('master/location/{id}/edit', [LocationController::class, 'edit'])->name('master.location.edit');
Route::put('master/location/{id}', [LocationController::class, 'update'])->name('master.location.update');
Route::delete('master/location/{id}', [LocationController::class, 'destroy'])->name('master.location.destroy');

Route::get('master/material', [MaterialController::class, 'index'])->name('master.material.index');
Route::get('master/material/add', [MaterialController::class, 'create'])->name('master.material.add');
Route::post('master/material', [MaterialController::class, 'store'])->name('materials.store');
Route::get('master/material/{id}/edit', [MaterialController::class, 'edit'])->name('master.material.edit');
Route::put('master/material/{id}', [MaterialController::class, 'update'])->name('master.material.update');
Route::delete('master/material/{id}', [MaterialController::class, 'destroy'])->name('master.material.destroy');

Route::get('master/shipper', [ShipperController::class, 'index'])->name('master.shipper.index');
Route::get('master/shipper/add', [ShipperController::class, 'create'])->name('master.shipper.add');
Route::post('master/shipper', [ShipperController::class, 'store'])->name('shippers.store');
Route::get('master/shipper/{id}/edit', [ShipperController::class, 'edit'])->name('master.shipper.edit');
Route::put('master/shipper/{id}', [ShipperController::class, 'update'])->name('master.shipper.update');
Route::delete('master/shipper/{id}', [ShipperController::class, 'destroy'])->name('master.shipper.destroy');

Route::get('/location-movement', [LocationMovementController::class, 'index'])->name('location_movement.index');
Route::get('/location-movement/add', [LocationMovementController::class, 'create'])->name('location_movement.add');
Route::post('/location-movement', [LocationMovementController::class, 'store'])->name('location_movement.store');

Route::get('pallet-movement', [PalletMovementController::class, 'index'])->name('pallet_movement.index');
Route::get('pallet-movement/add', [PalletMovementController::class, 'create'])->name('pallet_movement.add');
Route::post('pallet-movement', [PalletMovementController::class, 'store'])->name('pallet_movement.store');