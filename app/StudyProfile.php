<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyProfile extends Model
{
    protected $table = 'studyProfile';

    public static function all($columns = ['*'])
    {
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
        );
    }

    public static function find($pupil_id){
        $studyProfiles = self::all();

        foreach ($studyProfiles as $studyProfile){
            if ($studyProfile['id'] == $pupil_id){
                return $studyProfile;
            }
        }
    }
}
