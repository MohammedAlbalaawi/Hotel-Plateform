<?php

use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\front\PageController;
use App\Http\Controllers\front\FaqController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PhotoController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\front\VideoController;
use Illuminate\Support\Facades\Route;

/* Front */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/static-pages/{model:slug}', [PageController::class, 'index'])->name('staticPages');
Route::get('/gallery', [PhotoController::class, 'index'])->name('gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('videoGallery');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');


/* --- blog Controller ---*/
Route::controller(PostController::class)
    ->name('blog.')
    ->group(function () {
        Route::get('/blog', 'index')->name('index');
        Route::get('/post/{model}', 'show')->name('show');
    });

/* Admin Controllers*/
/* --- Home Controller ---*/
Route::get('/admin/home', [AdminHomeController::class, 'index'])
    ->name('admin_home')
    ->middleware('admin:admin');

/* --- Login Controller ---*/
Route::controller(AdminLoginController::class)
    ->prefix('admin')
    ->name('adminDashboard.')
    ->group(function () {
        Route::get('/login', 'index')->name('index');
        Route::post('/login-submit', 'login_submit')->name('submit');

        Route::get('/logout', 'logout')->name('logout');

        Route::get('/forget-password', 'forget_password')->name('forgetPassword');
        Route::post('/forget-password-submit', 'forget_password_submit')->name('forgetPassword_submit');

        Route::get('/reset-password/{token}/{email}', 'reset_password')->name('resePassword');
        Route::post('/reset-password-submit', 'reset_password_submit')->name('resePasswordSubmit');
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
    ->middleware('admin:admin')
    ->group(function () {
        Route::get('/view', 'index')->name('index');
        Route::get('/add', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{slider}', 'edit')->name('edit');
        Route::put('/update/{slider}', 'update')->name('update');
        Route::get('/delete/{slider}', 'delete')->name('delete');
    });

/* features Routes */
Route::controller(AdminFeatureController::class)
    ->prefix('admin/feature')
    ->name('adminFeature.')
    ->middleware('admin:admin')
    ->group(function () {
        Route::get('/view', 'index')->name('view');
        Route::get('/add', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{feature}', 'edit')->name('edit');
        Route::put('/update/{feature}', 'update')->name('update');
        Route::get('/delete/{feature}', 'delete')->name('delete');
    });

/* testimonials Routes */
Route::resource('testimonials', AdminTestimonialController::class)
    ->parameters(['testimonials' => 'model'])
    ->middleware('admin:admin');

/* posts Routes */
Route::resource('posts', AdminPostController::class)
    ->parameters(['posts' => 'model'])
    ->middleware('admin:admin');

/* photo gallery Routes */
Route::resource('photos', AdminPhotoController::class)
    ->parameters(['photos' => 'model'])
    ->middleware('admin:admin');

/* photo gallery Routes */
Route::resource('videos', AdminVideoController::class)
    ->parameters(['videos' => 'model'])
    ->middleware('admin:admin');

/* faq gallery Routes */
Route::resource('faqs', AdminFaqController::class)
    ->parameters(['faqs' => 'model'])
    ->middleware('admin:admin');

/* static pages Routes */
Route::resource('pages', AdminPageController::class)
    ->parameters(['pages' => 'model'])
    ->middleware('admin:admin');
