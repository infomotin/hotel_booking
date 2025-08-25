<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [UserController::class, 'index']);

