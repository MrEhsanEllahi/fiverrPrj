@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white admin-dashboard">
<p class="welcome-title">Welcome Admin.</p>
<p class="welcome-desc">Users who requires your approval will be on top.</p>
@if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
@endif

@if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
@endif
<div class="usertable table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
            <td scope="row">{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->mentor == 0)
                Mentor
                @else
                Mentee
                @endif
            </td>
            <td>
                @if($user->activate == 0)
                Requires Approval
                @else
                Approved
                @endif
            </td>
            <td>
                @if($user->activate == 0)
            <a href="{{url('/activate-user-account')}}/{{$user->id}}" class="btn useractbtn">Activate</a>
                @else
                <a href="{{url('/deactivate-user-account')}}/{{$user->id}}" class="btn userdctbtn">De-Activate</a>
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection