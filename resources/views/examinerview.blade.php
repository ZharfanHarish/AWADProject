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
                    <a href="{{ route('project.index') }}">[ View All Project ]</a>
                    <a href="{{ route('examinee.index') }}">[ View Examinee Project ]</a>
                </div></div>

                <div class="card-body">
                <?php $i = 1 ?>
                <table class="table">
                        <tr>
                            <th>No.</th><th>Project Title</th><th>Category</th><th>Student Name</th><th>Duration (in month)</th><th>Supervisor</th><th>Project Progress</th><th>Project Status</th><th>Able to graduate?</th>
                        </tr>
                @foreach ($projects as $p)
                        <tr>
                            <td><?php echo $i++ ?></td><td>{{ $p->title }}</td><td>{{ $p->category }}</td><td>{{ $p->student->full_name }}</td><td>{{ $p->duration_in_month }}</td><td>{{ $p->supervisor->full_name }}</td><td>{{ $p->project_progress }}</td><td>{{ $p->project_status }}</td>
                            <?php
                                $style_trigger = '';
                                $graduate_status = 'Not yet';
                                if ( $p->project_status == "Completed" ){
                                    $style_trigger = 'background-color:#CAFFBD';
                                    $graduate_status = 'Yes';
                                }
                            ?>
                            <td style="{{ $style_trigger }}">{{ $graduate_status }}</td>
                        </tr>
                @endforeach
                </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection