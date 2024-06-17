<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('merchants', MerchantController::class);
});

// User Routes
Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('/home', [FrontendController::class, 'home'])->name('home');
});

// Public Frontend Routes (accessible without authentication)
Route::group(['middleware' => ['guest']], function () {
    Route::get('/home', [FrontendController::class, 'home'])->name('home');
    Route::get('/umkm', [FrontendController::class, 'umkm'])->name('umkm');
    Route::get('/product', [FrontendController::class, 'products'])->name('products');
    Route::get('/products/category/{category}', [FrontendController::class, 'category'])->name('products.category');
    Route::get('/product/{id}', [FrontendController::class, 'productDetail'])->name('product.detail');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
});

// Authentication Routes
// Route::get('/', function () {
//     return redirect('sign-in');
// })->middleware('guest');

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

// Profile Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'create'])->name('profile');
    Route::post('user-profile', [ProfileController::class, 'update'])->name('user-profile');
});

// Authenticated User Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('static-sign-in', function () {
        return view('pages.static-sign-in');
    })->name('static-sign-in');
    Route::get('static-sign-up', function () {
        return view('pages.static-sign-up');
    })->name('static-sign-up');
    Route::get('user-management', function () {
        return view('pages.laravel-examples.user-management');
    })->name('user-management');
    Route::get('user-profile', function () {
        return view('pages.laravel-examples.user-profile');
    })->name('user-profile');
});
