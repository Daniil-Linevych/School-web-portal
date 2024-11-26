<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollResults extends Model
{
    protected $table = 'poll_results';
    public $timestamps = false;

    protected $fillable = [
        'answer',
        'poll_id',
        'pupil_id'
    ];

    public static function getUnansweredPolls($polls, $pupil){

        $unanswered_polls = array_filter($polls->toArray(), function ($poll) use($pupil) {
            $answered_results = self::getAnsweredPollsByPupil($pupil);
            $count_answered_results = count($answered_results);
            $count_diff = 0;
            foreach ($answered_results as $answered_result) {
                if ($answered_result['poll_id'] != $poll['id']) {
                    $count_diff++;
                }
            }
            if ($count_diff == $count_answered_results){
                return $poll;
            }
        });


        return $unanswered_polls;
    }

    public static function getAnsweredPollsByPupil($pupil){
        $answered_polls = self::all();

        return array_filter($answered_polls->toArray(), function ($poll) use ($pupil){
            return $poll['pupil_id'] == $pupil['id'];
        });
    }

}
