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
                    <a href="#">[ Manage Supervisee Project ]</a>
                    <a href="#">[ View All Project ]</a>
                    <a href="#">[ View Examinee Project ]</a>
                </div></div>

                <div class="card-body">
                <table><tr><td style='width:45%'></td><td>
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <label for="full_name">Full name:</label><br>
                    <input type="text" id="full_name" name="full_name" placeholder="Full name here"><br><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" placeholder="Email here"><br><br>
                    <label for="year">Year:</label><br>
                    <input type="number" id="year" name="year" placeholder="Year here"><br><br>
                    <label for="contact_no">Contact no:</label><br>
                    <input type="text" id="contact_no" name="contact_no" placeholder="Contact no here"><br><br>
                    <input type="submit" value="Submit">
                </form>
                </td><td style='width:45%'></td></tr></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection