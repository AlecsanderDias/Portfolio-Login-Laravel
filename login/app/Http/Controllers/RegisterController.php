<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Repositories\EloquentLoginRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(private EloquentLoginRepository $repository) {
    }
    public function index() {
        return view('register');
    }

    public function store(RegisterFormRequest $request) {
        $login = $request->all();
        $login = $this->repository->createLogin($login);
        return view('home')->with(['login' => $login]);
    }
}
