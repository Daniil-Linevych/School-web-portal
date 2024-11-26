<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    public static function getMarksByPupil($pupil_id){
        $marks = self::all();

        $pupil_marks = [];

        foreach ($marks as $mark){
            if ($mark['pupil_id'] == $pupil_id){
                array_push($pupil_marks, $mark);
            }
        }
        return $pupil_marks;
    }
}
