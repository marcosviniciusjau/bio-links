<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\MakeLoginRequest;
class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request){
        
        if($request->tryToLogin()){
            return to_route('dashboard');
        }
        return back()->with(['message'=>'nao encontrado']);
    }
}
