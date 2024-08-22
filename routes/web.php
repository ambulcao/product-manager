<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resources([
    'users' => UserController::class,
]);

Route::resources([
    'produtos' => ProductController::class,
]);

Route::resources([
    'categoria' => CategoryController::class,
]);

Route::get('/', function () {
    return view('welcome');
});
