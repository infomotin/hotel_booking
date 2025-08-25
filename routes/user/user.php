<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'update'])->name('user.profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('user.profile.destroy');
    //user.logout
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});


Route::get('/', [UserController::class, 'index']);

