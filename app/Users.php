<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
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
