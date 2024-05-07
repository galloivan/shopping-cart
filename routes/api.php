<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);

// Get user by ID
Route::get('/users/{id}', [UserController::class, 'show']);

// Search users by name or email
Route::get('/users/search', [UserController::class, 'search']);

Route::post('/ext/setCategory', [PageController::class, 'setCategory']);
Route::get('/ext/setCategory', [PageController::class, 'setCategory']); // Not recommended for production
Route::get('/ext/getCategories', [PageController::class, 'getCategories']);
Route::post('/ext/setItem', [PageController::class, 'setItem']);
Route::get('/ext/getItems', [PageController::class, 'getItems']);
Route::get('/ext/getItem/{search}', [PageController::class, 'getItem']);
Route::get('/ext/getItemsByCategory/{search}', [PageController::class, 'getItemsByCategory']);
Route::get('/ext/getCategoryByItem/{search}', [PageController::class, 'getCategoryByItem']);

Route::delete('/ext/deleteCategory/{categoryName}', [PageController::class, 'deleteCategory']);
Route::delete('/ext/deleteItem/{itemName}', [PageController::class, 'deleteItem']);
Route::put('/ext/updateCategory/{categoryName}', [PageController::class, 'updateCategory']);
Route::put('/ext/updateItem/{itemName}', [PageController::class, 'updateItem']);
