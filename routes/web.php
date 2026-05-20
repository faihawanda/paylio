<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Kelola Karyawan
Route::middleware('auth')->controller(EmployeeController::class)->group(function () {
    Route::get('/karyawan/index', 'index')->name('karyawan.index'); // untuk menampilkan data
    Route::get('/karyawan/create', 'create')->name('karyawan.create'); // untuk menambahkan data
    Route::post('/karyawan/store', 'store')->name('karyawan.store');
    Route::get('/karyawan/edit/{id}', 'edit')->name('karyawan.edit'); // buat ngedit
    Route::put('/karyawan/update/{id}', 'update')->name('karyawan.update'); // menyimpan perubahan data
    Route::delete('/karyawan/delete/{id}', 'destroy')->name('karyawan.destroy');
});

// Kelola Gaji
Route::middleware('auth')->controller(SalaryController::class)->group(function () {
    Route::get('/gaji/index', 'index')->name('gaji.index');
    Route::get('/gaji/create/{employeeId}', 'create')->name('gaji.create');
    Route::post('/gaji/store', 'store')->name('gaji.store');
    Route::get('/gaji/show/{id}', 'show')->name('gaji.show');
    Route::get('/gaji/download/{id}', 'download')->name('gaji.download');
    Route::get('/gaji/delete/{id}', 'delete')->name('gaji.delete');
});

require __DIR__.'/auth.php';