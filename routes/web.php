<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.index');
});

// Admin Routes

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout','destroy')->name('admin.logout');
    Route::get('admin/profile','profile')->name('admin.profile');
    Route::get('admin/profile/edit','editProfile')->name('edit.profile');
    Route::post('admin/profile/store','profilestore')->name('profile.store');

    Route::get('admin/change/password','ChangePassword')->name('change.password');
    Route::post('admin/update/password','UpdatePassword')->name('update.password');
  
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
