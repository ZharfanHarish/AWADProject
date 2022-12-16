<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['full_name', 'email', 'year', 'contact_no'];

    use HasFactory;

    public function project(){
        return $this->hasOne(Project::class,'student_id','id');
    }
}
