<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return [
            "id" => 1,
            "name" => "Luan",
        ];
    }

    public function show($id)
    {
        return [
            "id" => $id,
            "name" => "Luan",
        ];
    }
}
