<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(($credentials))) {
            $user_role = Auth::user()->role;

            switch ($user_role) {
                case 1:
                    return redirect('/pages/home2');
                    break;

                case 2:
                    return redirect('/adminpanel');
                    break;
                case 3:
                    return redirect('/technicianpanel');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'invalid role');
            }
        } else {
            return redirect('/login')->with('error', 'invalid credentials ( email/password)');
        }
    }
}
