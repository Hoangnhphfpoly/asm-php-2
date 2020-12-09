<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $mes = [
      'email.required'=>'Email không được để trống',
      'email.email'=>'Email không đúng định dạng',
      'password.required'=>'Password không được để trống'
    ];

    public function index(){
        return view('index');
    }

    public function signIn(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $validateData = $request->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ], $this->mes);


        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('dashboard');
        }else{

            $msg = 'Sai thông tin đăng nhập';
            return view('index', compact('msg'));
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('auth-index');
    }
}
