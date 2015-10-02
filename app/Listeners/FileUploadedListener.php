<?php

namespace App\Listeners;

use Log;
use Mail;
use App\Events\FileUploaded;


class FileUploadedListener {
    public function handle(FileUploaded $event) {
        $user = $event->getUser();
        $file = $event->getFile();

        Mail::send('mails.upload',['user' => $user, 'file' => $file], function($message) use ($user) {
            $message->subject('Neue Datei');
            $message->to($user->email);
        });
    }
}
