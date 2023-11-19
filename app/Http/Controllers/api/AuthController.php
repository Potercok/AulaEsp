<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $credentials = $request->only('email','password');

        if(Auth::guard('api')->attempt($credentials)){
            $user=Auth::guard('api')->user();
            $jwt = JWTAuth::attempt($credentials);
            $success = true;
            $data= compact('user','jwt');
            return compact('success','data');

        }else{
             $success = false;
             $message = 'Credenciales incorrectas';
             return compact('success','message');
        }
    }
    public function logout(){
        Auth::guard('api')->logout();
        $success=true; 
        return compact ('success');
    }
}
