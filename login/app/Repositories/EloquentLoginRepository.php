<?php

namespace App\Repositories;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EloquentLoginRepository implements LoginRepository {
    public function createLogin(Array $login):Login {
        $login = DB::transaction(function () use ($login) {
            $login['password'] = Hash::make($login['password']);
            $login = Login::create($login);
            return $login;
        });
        return $login;
    }
}