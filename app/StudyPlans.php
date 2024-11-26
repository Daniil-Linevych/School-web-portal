<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use IntlDateFormatter;

class StudyPlans extends Model
{
    protected $table = 'studyPlans';

    public static function getStudyPlanByClassAndWeekDay($class_id, $weekday){
        $study_plans = self::all();

        foreach ($study_plans as $study_plan){
            if ($study_plan['class_id'] == $class_id && $weekday == $study_plan['weekday'])
                return $study_plan;
        }
    }

    private static function getDateByWeekDay($weekday){
        $study_plans = self::all();

        foreach ($study_plans as $study_plan){
            $weekday_i = date('w', strtotime($study_plan['data']));
            if ($weekday_i == $weekday)
                return $study_plan['data'];
        }
    }

    private static function getMonthName($date){

        $monthName = date('F', strtotime($date));
        $monthNamesUa  = [
            'January'=>'січня',
            'February'=>'лютого',
            'March'=> 'березня',
            'April'=>'квітня',
            'May'=>'травня',
            'June'=>'червня',
            'July'=>'липня',
            'August'=>'серпня',
            'September'=>'вересня',
            'October'=>'жовтня',
            'November'=>'листопада',
            'December'=>'грудня'
        ];
        return $monthNamesUa[$monthName];
    }

    private static function getWeekDayName($date){
        $weekDayName = date('l', strtotime($date));
        $weekDayNamesUa  = [
            'Monday'=>'Понеділок',
            'Tuesday'=> 'Вівторок',
            'Wednesday'=>'Середа',
            'Thursday'=>'Четвер',
            'Friday'=>'П\'ятниця',
            'Saturday'=>'Субота',
            'Sunday'=>'Неділя'
        ];
        return $weekDayNamesUa[$weekDayName];
    }


    public static function getDateArray($date){

        $day = date("d", strtotime($date));
        $month = self::getMonthName($date);
        $year= date("Y", strtotime($date));
        $weekDayName = self::getWeekDayName($date);
        $weekDayNumber = date('w', strtotime($date));

        return [
            'day'=>$day,
            'month'=>$month,
            'year'=>$year,
            'weekDayNumber'=>$weekDayNumber,
            'weekDayName'=>$weekDayName,
            'date'=>$date
        ];
    }

    public static function getNeededDate($dateDiff){
        return date("Y-m-d", mktime(0,0,0, date('m'), date('d') + $dateDiff, date('Y')));
    }

    public static function getCurrentWeekDayNumber(){
        return date('w');
    }

    public static function getHalfYear(){
        if (date('m') > 8 && date('m') < 13){
            return 2;
        }
        else{
            return 1;
        }
    }
}
