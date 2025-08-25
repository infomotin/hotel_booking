<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TeamController;


Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    //admin.profile
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    //admin.profile.update
    Route::post('/admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});

Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    //admin.teams.index
    Route::controller(TeamController::class)->group(function () {
        Route::get('/admin/teams', 'adminTeams')->name('admin.teams.index');
        Route::get('/admin/teams/create', 'adminTeamsCreate')->name('admin.teams.create');
        Route::post('/admin/teams/store', 'adminTeamsStore')->name('admin.teams.store');
        Route::get('/admin/teams/edit/{id}', 'adminTeamsEdit')->name('admin.teams.edit');
        Route::post('/admin/teams/update/{id}', 'adminTeamsUpdate')->name('admin.teams.update');
        Route::post('/admin/teams/delete/{id}', 'adminTeamsDelete')->name('admin.teams.delete');
    });
});

//admin Login Route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
