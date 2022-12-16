<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public static function supervise(){
        return $this->hasMany(Project::class, 'supervisor_id');
    }

    public static function examine(){
        return json_encode(
            array_merge(
                json_decode(($this->hasMany(Project::class, 'examiner_one_id')), true),
                json_decode(($this->hasMany(Project::class, 'examiner_two_id')), true)
        ));
    }

    public static function quey(){
        echo 'kotka';
    }
}
