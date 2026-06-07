@extends('includes.master')

@section('title','Dashboard')

@section('content')

<h2>Dashboard</h2>

<div class="row mt-3">

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Total Students</h5>
                <h2>{{ $totalStudents }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Active Users</h5>
                <h2>{{ $activeUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Inactive</h5>
                <h2>{{ $inactiveUsers }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- Table -->
<div class="card mt-4">
    <div class="card-header">
        Recent Students
    </div>

    <div class="card-body">
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>

            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        @if($student->login_status == 'online')
                            <span class="badge bg-success">Online</span>
                        @else
                            <span class="badge bg-danger">Offline</span>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
</div>

@include('sweetalert::alert')

@endsection