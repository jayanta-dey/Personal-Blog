<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;




Route::get('/', function () {
    return view('frontend.index');
});

// Admin Routes

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/admin/profile/edit','editProfile')->name('edit.profile');
    Route::post('/admin/profile/store','profilestore')->name('profile.store');

    Route::get('/admin/change/password','ChangePassword')->name('change.password');
    Route::post('/admin/update/password','UpdatePassword')->name('update.password');
  
});

// Home Slide Bar Routes
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slide','UpdateSlider')->name('update.slider');
    
});

// About Page Routes
Route::controller(HomeAboutController::class)->group(function () {
    Route::get('/home/about','HomeAbout')->name('about.page');
    Route::post('/update/about','AboutUpdate')->name('about.update');
    Route::get('/about','HomeMainAbout')->name('about.main_page');
    Route::get('/about/multi/image','AboutMultiImage')->name('about.multi.image');
    Route::post('/about/add/multi-image','StoreMultiImage')->name('add.multi.image');
    Route::get('/all/multi/image','AllMultiImage')->name('all.multi.images');

    
});

// Portfolio Page Routes
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/portfolio/all','AllPortfolio')->name('all.portfolio');
    Route::get('/portfolio/add','AddPortfolio')->name('add.portfolio');
    Route::post('/portfolio/store','StorePortfolio')->name('store.portfolio');

});


// Blog Category Routes
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all-blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('store/blog/category','StoreBlogCategory')->name('store.category');
    
    
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
