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
                <form method="POST" action="{{ route('project.store') }}">
                    @csrf
                    <label for="title">Project Title:</label><br>
                    <input type="text" id="title" name="title" placeholder="Project title here" required><br><br>

                    <label for="start_date">Start Date:</label><br>
                    <input type="date" id="start_date" name="start_date" required><br><br>

                    <label for="end_date">End Date:</label><br>
                    <input type="date" id="end_date" name="end_date" required><br><br>

                    <label for="duration_in_month">Duration (in month):</label><br>
                    <input type="number" id="duration_in_month" name="duration_in_month" placeholder="Duration here" required><br><br>

                    <label for="category">Choose a project category:</label><br>
                    <select id="category" name="category" required>
                        <option value="">-- None --</option>
                        <option value='development'>Development</option>
                        <option value='research'>Research</option>
                    </select><br><br>

                    <label for="student_id">Choose a student:</label><br>
                    <select id="student_id" name="student_id" required>
                        <option value="">-- None --</option>
                        @foreach($students as $s)
                        <option value='{{$s->id}}'>{{$s->full_name}}</option>
                        @endforeach
                    </select><br><br>

                    <label for="supervisor_id">Choose a supervisor:</label>
                    <select id="supervisor_id" name="supervisor_id" required>
                        <option value="">-- None --</option>
                        @foreach($lecturers as $l)
                        <option value='{{$l->id}}'>{{$l->full_name}}</option>
                        @endforeach
                    </select><br><br>

                    <input type="submit" value="Submit">
                </form>
                </td><td style='width:45%'></td></tr></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection