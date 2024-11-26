<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public static function getSubjectById($subject_id){
        $subjects = self::all();

        foreach ($subjects as $subject){
            if ($subject['id'] == $subject_id){
                return $subject;
            }
        }
    }

    public static function getSubjectsBySchedule($schedule){
        $subjects = self::all();
        $subjectsBySchedule = [];

        foreach ($schedule as $schedule_item){
            foreach ($subjects as $subject){
                if ($subject['id'] == $schedule_item['subject_id']){
                    array_push($subjectsBySchedule, $subject);
                }
            }
        }
        return $subjectsBySchedule;

    }
}
