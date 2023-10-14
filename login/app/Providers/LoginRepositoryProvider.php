<?php

namespace App\Providers;

use App\Repositories\EloquentLoginRepository;
use App\Repositories\LoginRepository;
use Illuminate\Support\ServiceProvider;

class LoginRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        LoginRepository::class => EloquentLoginRepository::class
    ];
}
