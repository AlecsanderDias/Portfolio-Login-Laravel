<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailConfirmationRequest;
use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function warning(Request $request) {
        $email = $request->session()->get('email');
        // dd($request->session());
        return view('email.warning')->with(['email'=> $email]);
    }

    public function confirmation(EmailConfirmationRequest $request) {
        $request->fulfill();
        return to_route('home.index')->with('message','O email foi verificado com sucesso!');
    }

    public function resend(Request $request) {
        $login = Auth::user();
        sendConfirmationLink($login->id, $login->email, $login->username);
        return to_route('home.index')->with(['message' => 'Link de verificação foi enviado ao seu email!', 'disable' => true]);
    }
}
