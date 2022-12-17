<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class ExamineeController extends Controller
{
    public function index(){
        $projects1 = Project::all()->where('examiner_one_id', Auth::user()->lecturer_id);
        $projects2 = Project::all()->where('examiner_two_id', Auth::user()->lecturer_id);
        $merged = $projects1->merge($projects2);
        $projects = $merged->all();
        $view = View::make('layouts.app');
        $view->nest('examinerview', 'examinerview', compact('projects'));
        return $view;
    }
}
