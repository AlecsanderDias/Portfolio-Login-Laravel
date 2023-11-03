<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request) {
        if(Auth::user()) {
            return redirect()->back();
        }
        $message = $request->session()->get('message');
        return view('login')->with(['message'=> $message]);
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
    
    public function confirmEmail() {
        return view('login.index')->with(['message' => 'Email confirmado com sucesso']);
    }

}
