<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordFormRequest;
use App\Repositories\EloquentLoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    public function __construct(private EloquentLoginRepository $repository) {}

    public function forgotPassword() {
        return view('password.forgot');
    }

    public function passwordRecovery(Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        // dd($request->only('email'));
 
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordResetLink(string $token, string $email) {
        return view('password.reset', ['token' => $token, 'email' => $email]);
    }

    public function passwordReset(PasswordFormRequest $request) {
        $data = $request->except('_token');
        $status = $this->repository->resetPassword($data);
        dd("Fim",$data);
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
