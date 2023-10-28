<?php

use App\Mail\ConfirmEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

if(!function_exists('createConfirmationLink')) {
    function createConfirmationLink(int $loginId) {
        return URL::temporarySignedRoute('verification.confirmed', now()->addMinutes(10),['hash'=>sha1((string)$loginId)]);
    }
}

if(!function_exists('sendConfirmationLink')) {
    function sendConfirmationLink(int $loginId, string $loginEmail, string $loginUsername) {
        if($loginId) {
            $link = createConfirmationLink($loginId);
        }
        Mail::to($loginEmail)->send(new ConfirmEmail($loginUsername, $link));
        return URL::temporarySignedRoute('verification.confirmed', now()->addMinutes(10),['hash'=>sha1((string)$loginId)]);
    }
}