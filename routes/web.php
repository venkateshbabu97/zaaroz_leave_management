<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::get('admin/dashboard', [AuthController::class, 'adminDashboard'])->middleware('auth:admin')->name('admin_dashboard');

Route::get('employee/dashboard', [AuthController::class, 'employeeDashboard'])->middleware('auth:employee')->name('employee_dashboard');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('register',[EmployeeController::class, 'storeEmployee'])->name('store_employee');

Route::post('employee/update/{id}', [AuthController::class, 'editEmployee'])->name('update_employee');

