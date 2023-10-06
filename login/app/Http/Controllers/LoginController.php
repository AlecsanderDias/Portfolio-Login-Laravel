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
        // dd($loginFormRequest->request);
        $resultado = $loginFormRequest->username;
        return view('home')->with(['resultado' => $resultado]);
    }
}
