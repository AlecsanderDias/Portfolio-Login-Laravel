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
    public function index() {
        if(Auth::user()) {
            return redirect()->back();
        }
        return view('register');
    }

    public function store(RegisterFormRequest $request) {
        $login = $request->all();
        $login = $this->repository->createLogin($login);
        // event(new Registered($login));
        if($login->id) {
            $link = $this->createConfirmationLink($login->id);
        }
        Mail::to($login->email)->send(new ConfirmEmail($login->username, $link));
        Auth::login($login);
        return to_route('verification.warning', ['email' => $login->email]);
        // return to_route('home.index')->with(['login' => $login]);
    }

    public function createConfirmationLink(int $loginId) {
        return URL::temporarySignedRoute('verification.confirmed', now()->addMinutes(10),['hash'=>sha1((string)$loginId)]);
    }
}
