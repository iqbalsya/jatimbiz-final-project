<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('merchants', MerchantController::class);
    Route::resource('users', UserController::class); // Ubah namespace ke UserController
    Route::get('user-profile', function () {
        return view('components.dashboard.user-profile.user-profile');
    })->name('user-profile');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::post('/products/{product}/reviews', [FrontendController::class, 'submitReview'])->name('products.reviews.submit');
});


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/umkm', [FrontendController::class, 'umkm'])->name('umkm');
Route::get('/umkm/{id}', [FrontendController::class, 'umkmProducts'])->name('umkm.products');
Route::get('/product', [FrontendController::class, 'products'])->name('products');
Route::get('/products/category/{category}', [FrontendController::class, 'category'])->name('products.category');
Route::get('/product/{id}', [FrontendController::class, 'productDetail'])->name('product.detail');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');

Route::get('verify', function () {
    return view('sessions.password.verify');
})->middleware('guest')->name('verify');

Route::get('/reset-password/{token}', function ($token) {
    return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'create'])->name('profile');
    Route::post('user-profile', [ProfileController::class, 'update'])->name('user-profile');
});
