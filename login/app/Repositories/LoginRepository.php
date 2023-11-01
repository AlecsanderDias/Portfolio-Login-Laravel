<?php

namespace App\Repositories;

use App\Http\Requests\RegisterFormRequest;
use App\Models\Login;

interface LoginRepository {
    public function createLogin(Array $login):Login;
    public function resetPassword(Array $data):mixed;
}