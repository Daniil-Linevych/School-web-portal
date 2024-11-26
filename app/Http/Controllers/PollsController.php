<?php

namespace App\Http\Controllers;

use App\Pupils;
use App\StudyPlans;
use Illuminate\Http\Request;
use App\Poll;
use App\PollResults;
use App\PollAnswers;

class PollsController extends Controller
{
    public function index(Pupils $pupil){
        $polls = Poll::all();
        $polls = PollResults::getUnansweredPolls($polls, $pupil);
        $poll_array = [];
        $weekday = StudyPlans::getCurrentWeekDayNumber();
        foreach ($polls as $poll){
            array_push($poll_array, ['question'=>$poll, 'answers'=>PollAnswers::getAnswersByPoll($poll)]);
        }

        return view('polls', [
            'polls'=>$poll_array,
            'pupil'=>$pupil,
            'weekday'=>$weekday
        ]);
    }

    public function store(Request $request, Pupils $pupil){
        $answerField = $request->validate([
            'answer'=>'required'
        ]);

        PollResults::create([
            'answer'=>$answerField['answer'],
            'poll_id'=>$request['poll_id'],
            'pupil_id'=>$pupil['id']

        ]);

        return redirect("/polls/{$pupil['id']}")->with('success-message', 'Відповідь надіслана!');
    }
}
