<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public static function all($columns = ['*'])
    {
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
        );
    }

    public static function find($pupil_id){
        $classes = self::all();

        foreach ($classes as $class){
            if ($class['id'] == $pupil_id){
                return $class;
            }
        }
    }

}
