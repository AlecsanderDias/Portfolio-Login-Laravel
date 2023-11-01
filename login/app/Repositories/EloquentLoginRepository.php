<?php

namespace App\Repositories;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class EloquentLoginRepository implements LoginRepository {
    public function createLogin(Array $login):Login {
        $login = DB::transaction(function () use ($login) {
            $login['password'] = Hash::make($login['password']);
            $login = Login::create($login);
            return $login;
        });
        return $login;
    }

    public function resetPassword(Array $data):mixed {
        return Password::reset($data, function (Login $login, string $password) {
            // dd("Dentro",$login, $password);
            $login->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
    
            $login->save();
    
            event(new PasswordReset($login));
        });
    }
}