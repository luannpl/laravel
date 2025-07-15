<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/usuarios', [UserController::class, 'index']);

Route::get('admin/usuarios/{id}', [UserController::class, 'show']);
