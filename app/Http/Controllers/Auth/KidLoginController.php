<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class KidLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/podopieczni/zajecia/wyswietl/twoje';

    /**
     **_ Create a new controller instance.
    _**
     **_ @return void
    _*/
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
    _
    _ @return property guard use for login
    _
    _*/
    public function guard()
    {
        return auth()->guard('kid');
    }

    // login from for kids
    public function showLoginForm()
    {
        return view('auth.kidsLogin');
    }

}
