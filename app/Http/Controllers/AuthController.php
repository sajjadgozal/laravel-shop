<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:256',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed' ,
        ]) ;

        $user = User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>bcrypt($validated['password']),
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $response = [
            'massage' => 'registerd',
            'user'=> $user,
            'token' => $token ,
        ];

        return response()->json($response,201);
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'name' => 'string|max:256',
            'email' => 'string',
            'password' => 'required' ,
        ]) ;

        $user = User::where('email', $validated['email'])->first();

        if(!$user || !Hash::check($validated['password'] , $user->password)) {
            return response()->json(['massage'=> 'credentials are not right'],401);
        }

        $user->tokens()->delete();

        $token = $user->createToken('apiToken')->plainTextToken;

        $response = [
            'massage' => 'loged in , save token and use it ',
            'token' => $token
        ];

        return response()->json($response,200);
    }

    public function logout() {

        $user = auth()->user();

        if(!$user){
            return response()->json(['message'=>'not lodged in'],401);
        }

        $user->tokens()->delete();

        return response()->json(['message'=>'lodged out'],200);
    }
}
