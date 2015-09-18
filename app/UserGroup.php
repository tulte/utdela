<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {

    protected $table = 'user_group';
    protected $fillable = ['name'];


    public static function getListIdName() {
        $ret = [];
        $groups = self::all();
        foreach ($groups as $group) {
            $ret[$group->id] = $group->name;
        }
        return $ret;
    }

}
