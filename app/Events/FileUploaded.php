<?php

namespace App\Events;

use App\Events\Event;

class FileUploaded extends Event {

    private $file;
    private $user;

    public function __construct($user, $file) {
        $this->file = $file;
        $this->user = $user;
    }

    public function getFile() {
        return $this->file;
    }

    public function getUser() {
        return $this->user;
    }
}
