<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\HomeController;
use Illuminate\Support\Facades\Route;

/* Front */
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [AboutController::class,'index'])->name('about');


/* Admin Controllers*/
    /* --- Home Controller ---*/
Route::get('/admin/home', [AdminHomeController::class,'index'])
        ->name('admin_home')
        ->middleware('admin:admin');

    /* --- Login Controller ---*/
Route::controller(AdminLoginController::class)
    ->prefix('admin')
    ->name('adminDashboard.')
    ->group(function () {
        Route::get('/login','index')->name('index');
        Route::post('/login-submit', 'login_submit')->name('submit');
        
        Route::get('/logout','logout')->name('logout');
        
        Route::get('/forget-password','forget_password')->name('forgetPassword');
        Route::post('/forget-password-submit','forget_password_submit')->name('forgetPassword_submit');
        
        Route::get('/reset-password/{token}/{email}','reset_password')->name('resePassword');
        Route::post('/reset-password-submit','reset_password_submit')->name('resePasswordSubmit');
});

    /* --- Profile Controller ---*/
    Route::controller(AdminProfileController::class)
    ->middleware('admin:admin')
    ->group(function () {
        Route::get('/edit-profile', 'index')->name('admin_profile');
        Route::post('/edit-profile-submit', 'profile_submit')->name('admin_profile_submit');
    });

    
/* slides Routes */
Route::controller(AdminSlideController::class)
    ->prefix('admin/slide')
    ->name('adminSlider.')
    ->group(function () {
        Route::get('/view', 'index')->name('view');
        Route::get('/add', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{slider}', 'edit')->name('edit');
        Route::put('/update/{slider}', 'update')->name('update');
        Route::get('/delete/{slider}', 'delete')->name('delete');
});