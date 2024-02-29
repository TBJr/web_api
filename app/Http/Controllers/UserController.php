<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Exception;


class UserController extends Controller
{
    public function register(StoreUserRequest $request){

        try {

            $validated = $request->validated();

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

           
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['message'=>'Usuario creado con exito','data'=>['user'=>$user,'token'=>$token]],201);
            
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }

        
    }

    public function login(LoginRequest $request){

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message'=>'Credenciales incorrectas'],401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;    
        return response()->json(['message'=>'Usuario logueado con exito','data'=>['user'=>$user,'token'=>$token]],200);
        
    }

    public function logout(Request $request){
        
        $request->user()->tokens()->delete();
      
        //auth()->user()->tokens()->delete();
        return response()->json(['message'=>'Sesion cerrada con exito'],200);
    }



}
