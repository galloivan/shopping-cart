<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

// Home page route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');



// Category routes
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('welcome'); // Ensure this view is your intended home page
});

Route::post('/cart/add', [ItemController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{cartItem}', 'ItemController@updateCart')->name('cart.update');
Route::post('/cart/remove/{cartItem}', 'ItemController@removeCartItem')->name('cart.remove');
Route::get('/cart', 'CartController@index')->name('cart.view');
Route::patch('/cart/update/{cartItem}', 'CartController@update')->name('cart.update');
Route::delete('/cart/remove/{cartItem}', 'CartController@destroy')->name('cart.remove');