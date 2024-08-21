<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resources([
    'users' => UserController::class,
]);

Route::get('/', function () {
    return view('welcome');
});
