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


/* Admin */
Route::get('/admin/home', [AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');

Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class,'login_submit'])->name('admin_login_submit');

Route::get('/admin/logout', [AdminLoginController::class,'logout'])->name('admin_logout');

Route::get('/admin/forget-password', [AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile', [AdminProfileController::class,'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class,'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');

/* slides Routes */
Route::get('/admin/slide/view', [AdminSlideController::class,'index'])->name('admin_slide_view');
Route::get('/admin/slide/add', [AdminSlideController::class,'create'])->name('admin_slide_create');
Route::post('/admin/slide/store', [AdminSlideController::class,'store'])->name('admin_slide_store');
Route::get('/admin/slide/edit/{id}', [AdminSlideController::class,'edit'])->name('admin_slide_edit');
Route::put('/admin/slide/update/{id}', [AdminSlideController::class,'update'])->name('admin_slide_update');
Route::get('/admin/slide/delete/{id}', [AdminSlideController::class,'delete'])->name('admin_slide_delete');