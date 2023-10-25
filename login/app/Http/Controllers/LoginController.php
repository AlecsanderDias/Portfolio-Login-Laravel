<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::user()) {
            return redirect()->back();
        }
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
    
    public function confirmEmail() {
        return view('login.index')->with(['sucesso' => 'Email confirmado com sucesso']);
    }

    public function resetPassword() {

    }

    public function resendConfirmationEmail() {
        
    }

    public function loginRecover(Request $request) {
        dd($request);
    }
}
