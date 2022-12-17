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
                    @if(session('success'))
                        <div class='alert alert-success'>{{ session('success') }}</div>
                    @else
                        @if(session('failure'))
                        <div class='alert alert-danger'>{{ session('failure') }}</div>
                        @else
                        <center><h3>Welcome Back <h3>{{Auth::User()->name}}</h3> click any tab above to start</h3></center>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection