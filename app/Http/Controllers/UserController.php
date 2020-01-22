<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            // return response()->json(['success' => $success], $this-> successStatus);
            return responder()->success($success)->respond();
        }
        else{
            // return response()->json(['error'=>'Unauthorised'], 401);
            return responder()->error()->respond();
        }
    }
}
