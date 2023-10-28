<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $allHelpersFile = glob(app_path('Helpers'). '/*.php');
        foreach($allHelpersFile as $key => $helperFile) {
            require_once $helperFile;
        }
    }
}
