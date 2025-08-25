<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});
//admin Login Route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
