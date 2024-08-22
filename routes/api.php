<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;

Route::resources([
   'users' => UserController::class,
]);

Route::resources([
    'produtos' => ProductController::class,
]);

Route::resources([
    'categoria' => CategoryController::class,
]);

Route::get('/test', function () {
    return 'API Working';
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
