@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white admin-dashboard">
<p class="welcome-title">Welcome Admin.</p>
<p class="welcome-desc">This page contains log activity of the application</p>
<div class="usertable table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Activity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
            <td scope="row">{{$log->id}}</td>
            <td>{{$log->user_name}}</td>
            <td>{{$log->activity}}</td>
            <td>{{$log->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection