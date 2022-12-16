<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class, 'id', 'student_id');
    }

    public function supervisor(){
        return $this->hasOne(Lecturer::class, 'supervisor_id', 'id');
    }

    public function examiner(){
        return json_encode(
            array_merge(
                json_decode(($this->hasOne(Project::class, 'examiner_one_id', 'id')), true),
                json_decode(($this->hasOne(Project::class, 'examiner_two_id', 'id')), true)
        ));
    }
}
