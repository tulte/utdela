<?php

namespace App\Listeners;

use Log;
use Mail;
use App\Events\UserCreated;


class UserCreatedListener {
    public function handle(UserCreated $event) {
        $user = $event->getUser();

        Mail::send('mails.user',['user' => $user], function($message) use ($user) {
            $message->subject('Zugangsdaten');
            $message->to($user->email);
        });
    }
}
