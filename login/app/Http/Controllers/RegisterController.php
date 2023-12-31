<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Mail\ConfirmEmail;
use App\Repositories\EloquentLoginRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class RegisterController extends Controller
{
    public function __construct(private EloquentLoginRepository $repository) {
    }
    public function index(Request $request) {
        if(Auth::user()) {
            return redirect()->back();
        }
        $message = $request->session()->has('message') ? $request->session()->get('message') : null;
        return view('register')->with('message', $message);
    }

    public function store(RegisterFormRequest $request) {
        $login = $request->all();
        // dd($login);
        $login = $this->repository->createLogin($login);
        sendConfirmationLink($login->id, $login->email, $login->username);
        Auth::login($login);
        return to_route('verification.warning')->with(['email' => $login->email ]);
    }
}
