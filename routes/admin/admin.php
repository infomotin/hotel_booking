<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    //admin.profile
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    //admin.profile.update
    Route::post('/admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});
//admin Login Route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
