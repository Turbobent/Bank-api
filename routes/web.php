<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    if (!Auth::attempt($credentials)) {
        // Create a new user
        $user = new User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
    }

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Create tokens with different scopes
        $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
        $updateToken = $user->createToken('update-token', ['create', 'update']);
        $basicToken = $user->createToken('basic-token',['none']);

        return response()->json([
            'admin' => $adminToken->plainTextToken,
            'update' => $updateToken->plainTextToken,
            'basic' => $basicToken->plainTextToken,
        ]);
    }
    return response()->json(['message' => 'User authentication failed']);
});


