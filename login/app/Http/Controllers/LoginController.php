<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    public function index() {
        return view('login');
    }

    public function store(LoginFormRequest $loginFormRequest) {
        dd($loginFormRequest->except(['_token']));
        // $login = $loginFormRequest->except(['_token']);
        return view('home')->with(['login' => $login]);
    }
}
