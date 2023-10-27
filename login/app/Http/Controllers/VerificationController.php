<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailConfirmationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function warning(Request $request) {
        // dd($request->user()->getKey());
        return view('email.warning')->with(['email'=> $request->email]);
    }

    public function confirmation(EmailConfirmationRequest $request) {
        $request->fulfill();
        return to_route('home.index');
    }

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
 
        return back()->with('message', 'Link de verificação foi enviado ao seu email!');
    }
}
