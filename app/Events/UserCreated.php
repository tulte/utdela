<?php

namespace App\Events;

use App\Events\Event;

class UserCreated extends Event{

    private $user;

    /**
     * Password is not encrypted
     *
     **/
    public function __construct($user) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

}
