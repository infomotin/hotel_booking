<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BookAreaController;
use App\Http\Controllers\RoomTypeController;


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
Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    //admin.teams.index
    Route::controller(BookAreaController::class)->group(function () {
        Route::get('/admin/book-areas', 'adminBookAreas')->name('admin.book_areas.index');
        Route::get('/admin/book-areas/create', 'adminBookAreasCreate')->name('admin.book_areas.create');
        Route::post('/admin/book-areas/store', 'adminBookAreasStore')->name('admin.book_areas.store');
        Route::get('/admin/book-areas/edit/{id}', 'adminBookAreasEdit')->name('admin.book_areas.edit');
        Route::post('/admin/book-areas/update/{id}', 'adminBookAreasUpdate')->name('admin.book_areas.update');
        Route::post('/admin/book-areas/delete/{id}', 'adminBookAreasDelete')->name('admin.book_areas.delete');
    });
});
Route::middleware(['auth', 'verified', 'roles:admin'])->group(function () {
    //admin.room_types.index
    Route::controller(RoomTypeController::class)->group(function () {
        Route::get('/admin/room-types', 'adminRoomTypes')->name('admin.room_types.index');
        Route::get('/admin/room-types/create', 'adminRoomTypesCreate')->name('admin.room_types.create');
        Route::post('/admin/room-types/store', 'adminRoomTypesStore')->name('admin.room_types.store');
        Route::get('/admin/room-types/edit/{id}', 'adminRoomTypesEdit')->name('admin.room_types.edit');
        Route::post('/admin/room-types/update/{id}', 'adminRoomTypesUpdate')->name('admin.room_types.update');
        Route::post('/admin/room-types/delete/{id}', 'adminRoomTypesDelete')->name('admin.room_types.delete');
    });
});

//admin Login Route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
