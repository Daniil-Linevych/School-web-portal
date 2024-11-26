<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupils extends Model
{

    public static function find($id){
        $pupils = self::all();

        foreach ($pupils as $pupil){
            if ($pupil['id'] == $id){
                return $pupil;
            }
        }
    }

    public static function getPupilByUserId($user_id){
        $pupils = self::all();

        foreach ($pupils as $pupil){
            if ($pupil['user_id'] == $user_id){
                return $pupil;
            }
        }
        return null;
    }
}
