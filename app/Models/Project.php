<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'duration_in_month',
        'student_id',
        'category',
        'supervisor_id',
        'examiner_one_id',
        'examiner_two_id',
        'project_progress',
        'project_status'
    ];

    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function supervisor(){
        return $this->hasOne(Lecturer::class, 'id', 'supervisor_id');
    }

    public function first_examiner(){
        return $this->hasOne(Lecturer::class, 'id', 'examiner_one_id');
    }

    public function second_examiner(){
        return $this->hasOne(Lecturer::class, 'id', 'examiner_two_id');
    }
}
