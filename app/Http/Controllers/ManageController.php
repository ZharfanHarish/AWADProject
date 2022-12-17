<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Lecturer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function index(){
        $projects = Project::all()->where('supervisor_id', Auth::user()->lecturer_id);
        $view = View::make('layouts.app');
        $view->nest('projectmanageview', 'projectmanageview', compact('projects'));
        return $view;
    }

    public function edit($id){
        $pointer = Project::find($id);
        $lecturers = Lecturer::all();
        $view = View::make('layouts.app');
        $view->nest('editproject','editproject',compact(['pointer','lecturers']));
        return $view;
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration_in_month' => 'required',
            'category' => 'required',
            'supervisor_id' => 'required',
        ]);

        Project::find($id)->update($request->all());

        return redirect()->route('home')->with('success',"Project details has been updated");
    }

    public function show(Project $project){
        //
    }
}
