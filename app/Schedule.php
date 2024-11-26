<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public static function getScheduleByStudyPlan($study_plan_id){
        $schedule = self::all();

        $schedule_items = [];

        foreach ($schedule as $schedule_item){
            if ($schedule_item['study_plan_id'] == $study_plan_id){
                array_push($schedule_items, $schedule_item);
            }
        }
        return $schedule_items;
    }
}
