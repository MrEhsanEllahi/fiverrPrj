@extends('layouts.app')

@section('content')
<div class="container-fluid p-3 bg-white userdshb">
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
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Personal Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3 ">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Name"
                                value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Interest (Mentor or Mentee):</label>
                            <select name="mentor" class="form-control selectpicker" required>
                                <option value="0" @if($user->mentor == 0)selected @endif)>Mentor</option>
                                <option value="1" @if($user->mentor == 1)selected @endif)>Mentee</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Contact no:</label>
                            <input type="text" class="form-control" name="cellphone" placeholder="Your Contact No"
                                value="@if(old('cellphone')){{ old('cellphone') }}@else{{ $user->cellphone }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Address:</label>
                            <textarea class="form-control" name="address" placeholder="Your Address"
                                required>@if(old('address')){{ old('address') }}@else{{ $user->address }}@endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Work Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Work Email:</label>
                            <input type="email" class="form-control" name="work_email" placeholder="Your Work Email"
                                value="@if(old('work_email')){{ old('work_email') }}@else{{ $user->work_email }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Occupation:</label>
                            <input type="text" class="form-control" name="occupation" placeholder="Your Occupation"
                                value="@if(old('occupation')){{ old('occupation') }}@else{{ $user->occupation }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Industry:</label>
                            <select id="indBS" class="form-control selectpicker" name="industry" data-live-search="true"
                                required>
                                @foreach($industries as $ind)
                                    <option value="{{ $ind->name }}">{{ $ind->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                        <div id="skillContainer">
                            <label>Subject Matter Expertise:</label>
                            <div class="skillentry d-flex align-items-center justify-content-start">
                                <input class="form-control col-9 mr-2" type="text" name="skill[]" placeholder="Skill Name"
                                    required />
                                <select id="SkilllevelSelect" class="selectpicker col-2" name="skill_level[]" title="Choose Proficiency">
                                    @for($i=1; $i<11; $i++)
                                        <option value={{ $i }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-4 col-12 text-center">
                            <button type="button" class="btn btn-success" id="addskill">+ Add Skill</button>
                            <button type="button" class="btn btn-danger" id="removeskill">- Remove Skill</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Education</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Undergraduation Degree Name:</label>
                            <input type="text" class="form-control" name="ugrad_name"
                                placeholder="Your Undergraduation Degree Name"
                                value="@if(old('ugrad_name')){{ old('ugrad_name') }}@else{{ $user->ugrad_name }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Undergraduation Degree Major:</label>
                            <textarea class="form-control" name="ugrad_major"
                                placeholder="Your Undergraduation Degree Majors"
                                required>@if(old('ugrad_major')){{ old('ugrad_major') }}@else{{ $user->ugrad_major }}@endif</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Graduation Institute Name:</label>
                            <input type="text" class="form-control" name="grad_inst_name"
                                placeholder="Graduation Institute Name"
                                value="@if(old('grad_inst_name')){{ old('grad_inst_name') }}@else{{ $user->grad_inst_name }}@endif"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Graduation Degree Major:</label>
                            <textarea class="form-control" name="grad_major" placeholder="Your graduation Degree Majors"
                                required>@if(old('grad_major')){{ old('grad_major') }}@else{{ $user->grad_major }}@endif</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div id="certContainer">
                                <label>Certifications:</label>
                                <div class="certentry d-flex align-items-center justify-content-start">
                                    <input class="form-control col-6 mr-2" type="text" name="certs[]" placeholder="Certification Name"
                                        required />
                                    <input class="form-control col-6 mr-2" type="text" name="certinst[]" placeholder="Institute Name"
                                        required />
                                </div>
                            </div>
                            <div class="form-group mt-4 col-12 text-center">
                                <button type="button" class="btn btn-success" id="addcert">+ Add Certification</button>
                                <button type="button" class="btn btn-danger" id="removecert">- Remove Certification</button>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Passion</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>What are you Passionate About?</label>
                            <select id="passionBS" class="form-control selectpicker" name="passion"
                                data-live-search="true" required>
                                @foreach($passions as $p)
                                    <option value="{{ $p->name }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Your Hobbies:</label>
                            <select id="hobbyBS" class="form-control selectpicker" name="hobbies[]"
                                data-live-search="true" multiple required>
                                @foreach($hobbies as $h)
                                    <option value="{{ $h->name }}">{{ $h->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Your Interests:</label>
                            <select id="int BS" class="form-control selectpicker" name="interests[]"
                                data-live-search="true" multiple required>
                                @foreach($interests as $i)
                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>What you are in need of:</label>
                            <select id="needBS" class="form-control selectpicker" name="need" data-live-search="true"
                                required>
                                @foreach($needs as $n)
                                    <option value="{{ $n->name }}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="jobDetails" class="form-group col-md-12" style="display: none;">
                            <label>Job details (if you are in need of JOB):</label>
                            <textarea class="form-control" name="job_details"
                                placeholder="Job description, Industry, Expected Salary, Willing to relocate etc"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Board Memeberships:</label>
                            <input class="form-control" name="board_ms" type="text" value="@if(old('board_ms')){{ old('board_ms') }}@else{{ $user->board_ms }}@endif" placeholder="Enter your board memeberships" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Organization Memeberships:</label>
                            <input class="form-control" name="organization_ms" type="text" value="@if(old('organization_ms')){{ old('organization_ms') }}@else{{ $user->organization_ms }}@endif" placeholder="Enter your organization memeberships" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Opportunities you have for other brothers:</label>
                            <textarea class="form-control" name="opportunity"
                                placeholder="Jobs, Board Opening, Business Capital, Startups">@if(old('opportunity')){{ old('opportunity') }}@else{{ $user->opportunity }}@endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $("#addskill").click(function () {
        //$cloned = $("#skillContainer").append("<div class=\"skillentry d-flex align-items-center justify-content-start\">" + $("#skillContainer").children('.skillentry').first().html() + "</div>");
        // $clonedBS = $("#skillContainer .skillentry").first().find('.bootstrap-select').clone();
        $cloned = $("#skillContainer .skillentry").first().clone();
        $cloned.find('.bootstrap-select').replaceWith(function() { return $('select', this); })    
        $cloned .find('.selectpicker').selectpicker('render'); 
        $cloned.appendTo("#skillContainer");
        // $cloned.find('.bootstrap-select').replaceWith($clonedBS);
        // console.log($clonedBS);
    });
    $("#removeskill").click(function (e) {
        if ($("#skillContainer").children('.skillentry').length > 1)
            $("#skillContainer .skillentry").last().remove();
    });
    $("#addcert").click(function () {
        $("#certContainer").append("<div class=\"certentry d-flex align-items-center justify-content-start\">" + $("#certContainer").children('.certentry').first().html() + "</div>");
    });
    $("#removecert").click(function (e) {
        if ($("#certContainer").children('.certentry').length > 1)
            $("#certContainer .certentry").last().remove();
    });
</script>
@endsection
