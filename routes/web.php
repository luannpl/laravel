<?php

use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/usuarios', [UserController::class, 'index']);

Route::get('admin/usuarios/{user}', [UserController::class, 'show']);

Route::get('admin/usuarios/cadastrar', [UserController::class, 'create']);
