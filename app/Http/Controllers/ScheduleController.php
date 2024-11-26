<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Pupils;
use App\StudyPlans;
use App\Subjects;
use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index(Pupils $pupil, $weekday){
        $class = Classes::find($pupil['class_id']);
        $studyPlan = StudyPlans::getStudyPlanByClassAndWeekDay($class['id'], $weekday);
        $schedule = Schedule::getScheduleByStudyPlan($studyPlan['id']);
        $subjects = Subjects::getSubjectsBySchedule($schedule);

        $current_weekday = StudyPlans::getCurrentWeekDayNumber();
        $neededDate = StudyPlans::getNeededDate($weekday - $current_weekday);
        $date = StudyPlans::getDateArray($neededDate);

        return view('schedule', [
            'class' => $class,
            'studyPlan' => $studyPlan,
            'schedule' => $schedule,
            'subjects' => $subjects,
            'pupil'=>$pupil,
            'date'=>$date
        ]);
    }
}
