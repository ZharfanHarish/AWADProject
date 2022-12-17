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
                            <th>No.</th><th>Full Name</th><th>Email</th><th>Contact No.</th><th>Year</th>
                        </tr>
                @foreach ($students as $s)
                        <tr>
                            <td><?php echo $i++ ?></td><td>{{ $s->full_name }}</td><td>{{ $s->email }}</td><td>{{ $s->contact_no }}</td><td>{{ $s->year }}</td>
                        </tr>
                @endforeach
                </table>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection