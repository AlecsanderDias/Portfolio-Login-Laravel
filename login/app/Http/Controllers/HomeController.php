<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) {
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        $verification = Auth::user()->email_verified_at != null ? true : false;
        $disable = $request->session()->has('disable') ? true : false;
        $message = $request->session()->has('message') ? $request->session()->get('message') : null;
        return view('home')->with(['username' => $username, 'email' => $email, 'verification' => $verification, 'disable' => $disable, 'message' => $message]);
    }
}
