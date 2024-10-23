<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
    // Company Routes
    Route::resource('companies', CompanyController::class);

    // Employee Routes
    Route::resource('employees', EmployeeController::class);
// });


// Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
// Route::post('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
// Route::post('create-company', [CompanyController::class, 'store'])->name('companies.store');
// Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
// Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
// Route::post('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
// Route::get('/companies/delete/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');

// Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
// Route::post('create-employee', [EmployeeController::class, 'store'])->name('employees.store');
// Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
// Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
// Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
// Route::get('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
