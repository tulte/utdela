<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model {

    protected $table = 'user_file';
    protected $fillable = ['name','file'];

    public static function getFilesForUser($user_id) {
        return self::where('user_id',$user_id)->get();
    }

}
