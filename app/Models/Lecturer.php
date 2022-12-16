<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['full_name', 'email', 'contact_no'];

    use HasFactory;

    public function supervise(){
        return $this->hasMany(Project::class, 'supervisor_id','id');
    }

    public function first_examine(){
        return $this->hasMany(Project::class, 'examiner_one_id','id');
    }

    public function second_examine(){
        return $this->hasMany(Project::class, 'examiner_two_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id', 'student_id');
    }
}
