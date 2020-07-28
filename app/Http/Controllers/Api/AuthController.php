<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $validateData = request()->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt([
            'email' => $validateData['email'],
            'password' => $validateData['password']])
        ) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            $user->access_token = $accessToken;

            return response()->json(new UserResource($user), 200);
        } else {
            return response()->json(
                ['success' => false, 'message' => 'Please provide valide credentials.'],
                401
            );
        }
    }

    public function register()
    {
        $validateData = request()->validate([
            'name' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'string'],
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        $user = \App\User::create($validateData);

        $user = Auth::loginUsingId($user->id);
        $accessToken = $user->createToken('authToken')->accessToken;
        $user->access_token = $accessToken;

        return response()->json(new UserResource($user), 201);
    }

    public function logout()
    {
        Auth::user()->tokens->each->delete();

        return response()->json(['You logout successfully.'], 201);
    }
}
