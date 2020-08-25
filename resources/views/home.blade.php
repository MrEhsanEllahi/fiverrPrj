@extends('layouts.app')

@section('content')
<div class="container-fluid p-3 bg-white">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(Auth::user()->activate === 0)
        <h2 class="text-center">Welcome {{ Auth::user()->name }}, your account is pending for approval. Meanwhile
            update your data below to get noticed.</h2>
    @else
        <h2 class="text-center">Welcome {{ Auth::user()->name }}. Update your data below to help others.</h2>
    @endif
    <div class="user-update-form mt-4">
        <form method="POST" action="{{ route('user.update_profile') }}">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                        value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                </div>
                <div class="form-group col-md-4">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                        value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                </div>
                <div class="form-group col-md-4">
                    <label>Occupation:</label>
                    <input type="text" class="form-control" name="occupation" placeholder="Your Occupation"
                        value="@if(old('occupation')){{ old('occupation') }}@else{{ $user->occupation }}@endif">
                </div>
                <div class="form-group col-md-3">
                    <label>Industry:</label>
                    <input type="text" class="form-control" name="industry" placeholder="Your Industry"
                        value="@if(old('industry')){{ old('industry') }}@else{{ $user->industry }}@endif">
                </div>
                <div class="form-group col-md-3">
                    <label>Work Email:</label>
                    <input type="email" class="form-control" name="work_email" placeholder="Your Work Email"
                        value="@if(old('work_email')){{ old('work_email') }}@else{{ $user->work_email }}@endif">
                </div>
                <div class="form-group col-md-3">
                    <label>Contact no:</label>
                    <input type="text" class="form-control" name="cellphone" placeholder="Your Contact No"
                        value="@if(old('cellphone')){{ old('cellphone') }}@else{{ $user->cellphone }}@endif">
                </div>
                <div class="form-group col-md-3">
                    <label>Interest (Mentor or Mentee):</label>
                    <select name="mentor" class="form-control">
                        <option value="0" @if($user->mentor == 0)selected @endif)>Mentor</option>
                        <option value="1" @if($user->mentor == 1)selected @endif)>Mentee</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Undergraduation Degree Name:</label>
                    <input type="text" class="form-control" name="ugrad_name"
                        placeholder="Your Undergraduation Degree Name"
                        value="@if(old('ugrad_name')){{ old('ugrad_name') }}@else{{ $user->ugrad_name }}@endif">
                </div>
                <div class="form-group col-md-12">
                    <label>Undergraduation Degree Major:</label>
                    <textarea class="form-control" name="ugrad_major"
                        placeholder="Your Undergraduation Degree Majors">@if(old('ugrad_major')){{ old('ugrad_major') }}@else{{ $user->ugrad_major }}@endif</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Graduation Institute Name:</label>
                    <input type="text" class="form-control" name="grad_inst_name" placeholder="Graduation Institute Name"
                        value="@if(old('grad_inst_name')){{ old('grad_inst_name') }}@else{{ $user->grad_inst_name }}@endif">
                </div>
                <div class="form-group col-md-12">
                    <label>Graduation Degree Major:</label>
                    <textarea class="form-control" name="grad_major"
                        placeholder="Your graduation Degree Majors">@if(old('grad_major')){{ old('grad_major') }}@else{{ $user->grad_major }}@endif</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Subject Matter Expertise:</label>
                    <textarea class="form-control" name="skills"
                        placeholder="Skills, talent">@if(old('skills')){{ old('skills') }}@else{{ $user->skills }}@endif</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Address:</label>
                    <textarea class="form-control" name="address"
                        placeholder="Your Address">@if(old('address')){{ old('address') }}@else{{ $user->address }}@endif</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Passion:</label>
                    <textarea class="form-control" name="passion"
                        placeholder="Your Passion">@if(old('passion')){{ old('passion') }}@else{{ $user->passion }}@endif</textarea>
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
