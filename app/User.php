<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserByLoginAndPassword($login, $password){

        $users = self::all();

        foreach ($users as $user){
            if ($user['login'] == $login and $user['password'] == $password){
                return $user;
            }
        }
        return null;
    }
}
