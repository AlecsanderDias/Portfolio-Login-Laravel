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
        return view('email.warning')->with(['email'=> $request->email]);
    }

    public function confirmation(EmailConfirmationRequest $request) {
        $request->fulfill();
        return to_route('home.index');
    }

    public function resend(Request $request) {
        $login = Auth::user();
        sendConfirmationLink($login->id, $login->email, $login->username);
        return to_route('home.index')->with(['message' => 'Link de verificação foi enviado ao seu email!', 'disable' => true]);
    }
}
