<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Frontend\BlogController as FrontBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\FavoriteController as FrontFavoriteController;

Route::post('blogs/{blog}/favorite',[FrontFavoriteController::class, 'toggleFavorite'])->name('blogs.toggleFavorite');
Route::get('/blogs/index', [FrontFavoriteController::class, 'index'])->name('blogs.favoriteIndex');

Route::get('/', [FrontBlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [FrontBlogController::class, 'show'])->name('blogs.show');


Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('blogs/trashed', [AdminBlogController::class, 'gettrashedData'])->name('blogs.trashed');
    Route::get('blogs/{id}/restore', [AdminBlogController::class, 'restore'])->name('blogs.restore');
    Route::delete('blogs/{id}/forceDelete', [AdminBlogController::class, 'forceDelete'])->name('blogs.forceDelete');

    Route::resource('blogs', AdminBlogController::class);
    Route::resource('categories', AdminCategoryController::class);
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');




