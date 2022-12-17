@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
            <div class="card-header"><div class="pagination">
                <a href="{{ route('student.create') }}">[ Register Student ]</a>
                    <a href="{{ route('student.index') }}">[ View Students ]</a>
                    @can('isCoordinator')
                    <a href="{{ route('project.create') }}">[ Register Project ]</a>
                    @endcan
                    <a href="{{ route('manage.index') }}">[ Manage Supervisee Project ]</a>
                    @can('isCoordinator')
                    <a href="{{ route('project.index') }}">[ View All Project ]</a>
                    @endcan
                    <a href="{{ route('examinee.index') }}">[ View Examinee Project ]</a>
                </div></div>

                <div class="card-body">
                <?php $i = 1 ?>
                <table class="table">
                        <tr>
                            <th>No.</th><th>Project Title</th><th>Student Name</th><th>Examiner 1</th><th>Examiner 2</th><th>Project Progress</th><th>Project Status</th><th>Action</th>
                        </tr>
                @foreach ($projects as $p)
                        <tr>
                            <form method='GET' action="{{ route('manage.edit', $p->id) }}"><td><?php echo $i++ ?></td><td>{{ $p->title }}</td><td>{{ $p->student->full_name }}</td><td>@if($p->first_examiner) {{$p->first_examiner->full_name}} @else - @endif</td><td>@if($p->second_examiner) {{$p->second_examiner->full_name}} @else - @endif</td><td>{{ $p->project_progress }}</td><td>{{ $p->project_status}}</td><input type="hidden" id="project" name="project" value="{{ $p }}"><td><button type="submit" class="btn btn-primary">Manage</button></td></form>
                        </tr>
                @endforeach
                </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection