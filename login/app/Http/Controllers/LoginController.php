<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(LoginFormRequest $loginFormRequest) {
        if(!Auth::attempt($loginFormRequest->only(['username','password']))) {
            return redirect()->back()->withErrors("Nome de Usuário e/ou Senha incorretos!");
        }
        return to_route('home.index');
    }

    public function destroy() {
        Auth::logout();
        return to_route('login.index');
    }
}
