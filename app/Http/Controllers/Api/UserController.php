<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        dd($user);
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $profile = $user->profile()->create([
            'type' => $request->type,
            'document_number' => $request->document_number
        ]);

        return response()->json(["user" => $user, "profile" => $profile], 201);
    }
}
