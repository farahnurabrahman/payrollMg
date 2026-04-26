<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PayrollRecordsController;

// Route::get('/home', function () {
//     return view('dashboard');
// })->name('home');

Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::post('/', [AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::resource('/users', \App\Http\Controllers\UsersController::class);
Route::resource('/departments', \App\Http\Controllers\DepartmentsController::class);
Route::resource('/employees', \App\Http\Controllers\EmployeesController::class);
Route::resource('/payrollRecords', \App\Http\Controllers\PayrollRecordsController::class);
Route::delete('/departments/{id}', [DepartmentsController::class, 'destroy'])->name('departments.destroy');
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/payrollRecords/download/{id}', [PayrollRecordsController::class, 'downloadPDF'])->name('payroll.download');
Route::middleware(['auth'])->group(function () {
    
    
    Route::get('/home', function () {
        return view('dashboard'); 
    })->name('home');

    // Your Payroll routes
    Route::resource('payrollRecords', PayrollRecordsController::class);
    Route::resource('departments', DepartmentsController::class);
    Route::resource('employees', EmployeesController::class);
    Route::resource('users', UsersController::class);
});