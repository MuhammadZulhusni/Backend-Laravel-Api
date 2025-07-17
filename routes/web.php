<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminUserController; 

Route::get('/', function () {
    return view('welcome');
});

// Routes requiring authentication, Sanctum, Jetstream session, and verification
Route::middleware([
    'auth:sanctum', // Authenticate using Sanctum
    config('jetstream.auth_session'), // Utilize Jetstream's authentication session
    'verified', // Ensure user is verified
])->group(function () {
    // Dashboard route for authenticated users
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

// Admin logout route
Route::get('/logout',[AdminUserController::class, 'AdminLogout'])->name('admin.logout');

// Admin-specific routes with '/admin' prefix
Route::prefix('admin')->group(function(){
    // Route to display user profile
    Route::get('/user/profile',[AdminUserController::class, 'UserProfile'])->name('user.profile');
    // Route to display user profile edit form
    Route::get('/user/profile/edit',[AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    // Route to store updated user profile data
    Route::post('/user/profile/store',[AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
    // Route to display change passsword form
    Route::get('/change/password',[AdminUserController::class, 'UserChangePassword'])->name('change.password');
    // Route to change/update new password
    Route::post('/change/password/update',[AdminUserController::class, 'UserPasswordUpdate'])->name('change.password.update');
});

