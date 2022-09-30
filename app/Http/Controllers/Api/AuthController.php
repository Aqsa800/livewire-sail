<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{LoginRequest, RegisterRequest};


class AuthController extends Controller
{
    use ApiResponser;

    public function register(RegisterRequest $request)
    {
        $attr = $request->validated();

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ], "Register Successfully");
    }

    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->validated())) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ], "Login Successfully");
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
