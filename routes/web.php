<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('admin/dashboard', [AuthController::class, 'adminDashboard'])->middleware('auth:admin')->name('admin.dashboard');
Route::get('employee/dashboard', [AuthController::class, 'employeeDashboard'])->middleware('auth:employee')->name('employee.dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

