<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'group_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public static function getByEmail($email) {
        return User::where('email', $email)->first();
    }

    /**
     * Get the UserGroup
     *
     */
    public function group() {
        return $this->belongsTo('App\UserGroup','group_id');
    }

    public function isAdmin() {
        return $this->group->name == 'admin';
    }


    public static function getListIdName() {
        $ret = [];
        $users = self::all();
        foreach ($users as $user) {
            $ret[$user->id] = $user->name;
        }
        return $ret;
    }
}
