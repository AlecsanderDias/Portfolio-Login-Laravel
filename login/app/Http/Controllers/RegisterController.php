<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(RegisterFormRequest $request) {
        // dd($request);
        $resultado = $request->safe()->only(['username','email']);
        return view('home')->with(['resultado' => $resultado]);
    }
}
