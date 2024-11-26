<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pupils;
use App\Classes;
use App\StudyProfile;
use App\Marks;
use App\Subjects;
use App\StudyPlans;


class PupilsController extends Controller
{
    public function index(Pupils $pupil){
        $class = Classes::find($pupil['class_id']);
        $studyProfile = StudyProfile::find($pupil['study_profile_id']);
        $marks = Marks::getMarksByPupil($pupil['id']);
        $subjects = Subjects::all();
        $half_year = StudyPlans::getHalfYear();

        $weekday = StudyPlans::getCurrentWeekDayNumber();
        return view('pupil', [
            'pupil' => $pupil,
            'class' => $class,
            'studyProfile'=>$studyProfile,
            'marks' => $marks,
            'subjects' => $subjects,
            'weekday'=>$weekday,
            'halfYear'=>$half_year

        ]);
    }


}
