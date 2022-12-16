<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function student(){
        return $this->hasOne(Student::class);
    }

    public function lecturer(){
        return $this->hasMany(Lecturer::class);
    }
}
