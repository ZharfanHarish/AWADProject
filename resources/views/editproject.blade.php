@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><div class="pagination">
                    <a href="{{ route('student.create') }}">[ Register Student ]</a>
                    <a href="{{ route('student.index') }}">[ View Students ]</a>
                    <a href="{{ route('project.create') }}">[ Register Project ]</a>
                    <a href="{{ route('manage.index') }}">[ Manage Supervisee Project ]</a>
                    <a href="#">[ View All Project ]</a>
                    <a href="#">[ View Examinee Project ]</a>
                </div></div>

                <div class="card-body">
                <table><tr><td style='width:45%'></td><td>
                <form method="POST" action="{{ route('project.originalupdate', $pointer) }}">
                    @csrf
                    <label for="title">Project Title:</label><br>
                    <input type="text" id="title" name="title" placeholder="Project title here" value="{{ $pointer->title }}" required><br><br>

                    <label for="start_date">Start Date:</label><br>
                    <input type="date" id="start_date" name="start_date" value="{{ $pointer->start_date }}" required><br><br>

                    <label for="end_date">End Date:</label><br>
                    <input type="date" id="end_date" name="end_date" value="{{ $pointer->end_date }}" required><br><br>

                    <label for="duration_in_month">Duration (in month):</label><br>
                    <input type="number" id="duration_in_month" name="duration_in_month" placeholder="Duration here" value="{{ $pointer->duration_in_month }}" required><br><br>

                    <label for="category">Choose a project category:</label><br>
                    <select id="category" name="category" required>
                        <option value="">-- None --</option>
                        @if($pointer->category == 'development')
                        <option value='development' selected>Development</option>
                        @else
                        <option value='development'>Development</option>
                        @endif
                        @if($pointer->category == 'research')
                        <option value='research' selected>Research</option>
                        @else
                        <option value='research'>Research</option>
                        @endif
                    </select><br><br>

                    <label for="student_id">Student Name:</label><br>
                    <a>{{ $pointer->student->full_name }}</a><br><br>

                    <label for="supervisor_id">Choose a supervisor:</label>
                    <select id="supervisor_id" name="supervisor_id" required>
                        <option value="">-- None --</option>
                        @foreach($lecturers as $l)
                        <option value="{{ $l->id }}"
                        <?php
                        if($pointer->supervisor_id == $l->id)
                        echo 'selected'; 
                        ?>
                        >{{ $l->full_name }}</option>
                        @endforeach
                    </select><br><br>

                    <label for="examiner_one_id">Choose a first examiner:</label><br>
                    <select id="examiner_one_id" name="examiner_one_id">
                        <option value="">-- None --</option>
                        @foreach($lecturers as $l)
                        <option value="{{ $l->id }}"
                        <?php
                        if($pointer->examiner_one_id == $l->id)
                        echo 'selected'; 
                        ?>
                        >{{ $l->full_name }}</option>
                        @endforeach
                    </select><br><br>

                    <label for="examiner_two_id">Choose a second examiner:</label><br>
                    <select id="examiner_two_id" name="examiner_two_id">
                    <option value="">-- None --</option>
                        @foreach($lecturers as $l)
                        <option value="{{ $l->id }}"
                        <?php
                        if($pointer->examiner_two_id == $l->id)
                        echo 'selected'; 
                        ?>
                        >{{ $l->full_name }}</option>
                        @endforeach
                    </select><br><br>

                    <input type="hidden" id="primaryKey" name="primaryKey" value="{{$pointer->id}}">

                    <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                </form>
                </td><td style='width:45%'><form method='DELETE' action=''><?php for($x=0; $x<14; $x++){ echo '<br><br>'; } ?>
                <button type="submit" class="btn btn-danger">Delete</button></form></td></tr></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection