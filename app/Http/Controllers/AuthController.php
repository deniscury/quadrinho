<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate(array(
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ));

        $user = User::create(array(
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ));

        $token = $user->createToken('registroUser')->plainTextToken;

        $response = array(
            'user' => $user,
            'token' => $token
        );

        return response($response, 201);
    }

    public function login(Request $request){
        $fields = $request->validate(array(
            'email' => 'required|string',
            'password' => 'required|string'
        ));

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)){
            return response(array(
                'message' => 'Email ou senha inválidos'
            ), 401);
        }

        $token = $user->createToken('userLogado')->plainTextToken;

        $response = array(
            'user' => $user,
            'token' => $token
        );

        return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response(array(
            'message' => 'Deslogado com sucesso'
        ), 200);
    }
}
