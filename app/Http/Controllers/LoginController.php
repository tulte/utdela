<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class LoginController extends Controller
{

    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('upload.index');
        }
        return redirect('login')->with('message', 'Login Failed');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }


}
