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
        $validatedData = request()->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']])
        ) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            $user->access_token = $accessToken;

            return response()->json(new UserResource($user), 200);
        } else {
            return $response->json(
                ['success' => false, 'message' => 'Please provide valide credentials.'],
                401
            );
        }
    }
}
