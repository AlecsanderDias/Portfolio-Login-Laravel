<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        return view('home')->with(['username' => $username, 'email' => $email]);
    }
}
