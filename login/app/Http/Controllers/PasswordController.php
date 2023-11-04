<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailFormRequest;
use App\Http\Requests\PasswordFormRequest;
use App\Repositories\EloquentLoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    public function __construct(private EloquentLoginRepository $repository) {}

    public function forgotPassword(Request $request) {
        $message = $request->session()->has('message') ? $request->session()->get('message') : null;
        return view('password.forgot')->with('message', $message);
    }

    public function passwordRecovery(EmailFormRequest $request) {
        $status = Password::sendResetLink($request->only('email'));
        // dd($request->only('email'));
        $status === Password::RESET_LINK_SENT;
        return to_route('login.index')->with(['status' => __($status), 'message' => 'Um link foi enviado ao seu email para trocar a senha!']);
    }

    public function passwordResetLink(string $token, string $email) {
        return view('password.reset', ['token' => $token, 'email' => $email]);
    }

    public function passwordReset(PasswordFormRequest $request) {
        $data = $request->except('_token');
        $status = $this->repository->resetPassword($data);
        // dd("Fim",$data);
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login.index')->with(['status' => __($status), 'message' => 'A senha foi trocada com sucesso'])
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
