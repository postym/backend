<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // login using specified resource

    public function login(UserRequest $request)
    {
       
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $response = [
            'user' => $user,
            'token' => $user->createToken($request->email)->plainTextToken
        
        ];
     
        return $response;
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $response = [
           'message' => 'Logout'
        ];

        return $response;
    }

}
