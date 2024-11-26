<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollAnswers extends Model
{

    protected $table  = 'poll_answers';

    public static function getAnswersByPoll($poll){
        $all_poll_answers = self::all();

        $poll_answers = [];

        foreach ($all_poll_answers as $answer){
            if ($answer['poll_id'] == $poll['id']){
                array_push($poll_answers, $answer['answer']);
            }
        }
        return $poll_answers;
    }
}
