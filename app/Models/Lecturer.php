<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['full_name', 'email', 'authorization', 'contact_no'];

    use HasFactory;

    public function supervise(){
        return $this->hasMany(Project::class, 'supervisor_id');
    }

    public function examine(){
        return json_encode(
            array_merge(
                json_decode(($this->hasMany(Project::class, 'examiner_one_id')), true),
                json_decode(($this->hasMany(Project::class, 'examiner_two_id')), true)
        ));
    }
}
