<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;

//Route::resources([
//   'users' => UserController::class,
//]);

//Route::resources([
 //   'produtos' => ProductController::class,
//]);

//Route::get('/produtos/{id}', [ProductController::class, 'store']);

//Route::resources([
//    'categoria' => CategoryController::class,
//]);

Route::get('/test', function () {
    return 'API Working';
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);

Route::apiResource('produtos', ProductController::class);

Route::apiResource('categoria', CategoryController::class);