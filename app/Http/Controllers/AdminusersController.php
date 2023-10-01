<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adminuser;
use Session;

class AdminusersController extends Controller
{
    public function login()
    {
        return view('adminusers.login');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $adminuser = Adminuser::where('email', $email)->first();
            Auth::login($adminuser);
            Session::flash('message', 'Login Successfully!');
            Session::flash('alert-class', 'success');
            return \Redirect::route('dashboards.index', []);
        } else {
            Session::flash('message', 'Invalid Credentials!!');
            Session::flash('alert-class', 'error');
            return \Redirect::route('adminusers.login', []);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return \Redirect::route('adminusers.login', []);
    }

    public function profile()
    {
        return view('adminusers.profile');
    }

    public function forgotpassword()
    {
        return view('adminusers.forgotpassword');
    }
}
