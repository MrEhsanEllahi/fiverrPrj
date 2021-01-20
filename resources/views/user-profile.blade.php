@extends('layouts.app')

@section('content')
<div class="main-section">
    <div class="container-fluid">
        <div class="main-section-data">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="main-left-sidebar">
                        <div class="user_profile">
                            <div class="user-pro-img">
                                <img src="{{ asset('images/resources/user.png') }}" width="100px" alt="">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->name }}</h3>
                                    <div class="star-descp">
                                        <p>{{ $user->mentor === 0 ? 'Mentor' : 'Mentee' }}</p>
                                        <p>{{ $user->occupation }}</p>
                                    </div>
                                    <!--star-descp end-->
                                </div>
                                <!--user-tab-sec end-->
                            </div>
                            <!--user-pro-img end-->
                        </div>
                        <!--user_profile end-->
                        <div class="suggestions full-width">
                            <div class="sd-title">
                                <h3>Suggestions</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div>
                            <!--sd-title end-->
                            <div class="suggestions-list">
                                @foreach($random_users as $ru)
                                <div class="suggestion-usd">
                                    <img src="images/resources/s1.png" alt="">
                                    <div class="sgt-text">
                                        <h4>{{ $ru->name }}</h4>
                                        <span>{{ $ru->occupation }}</span>
                                    </div>
                                    <span><a href="{{ url('user-profile') }}/{{ $ru->id }}"><i
                                                class="fa fa-eye"></i></a></span>
                                </div>
                                @endforeach
                            </div>
                            <!--suggestions-list end-->
                        </div>
                        <!--suggestions end-->
                    </div>
                    <!--main-left-sidebar end-->
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="main-ws-sec">
                        <div class="product-feed-tab current" id="info-dd">
                            <div class="user-profile-ov st2">
                                <h3 class="user-sec-title">About</h3>
                                @if($user->occupation)
                                <h4>Occupation:</h4>
                                <p>{{ $user->occupation }}
                                    @endif
                                </p>
                                @if($user->industry)
                                <h4>Industry:</h4>
                                <p>{{ $user->industry }}
                                </p>
                                @endif
                                @if($user->work_email)
                                <h4>Work Email:</h4>
                                <p>{{ $user->work_email }}
                                </p>
                                @endif
                                @if($user->cellphone)
                                <h4>Contact no:</h4>
                                <p>{{ $user->cellphone }}
                                </p>
                                @endif
                                @if($user->address)
                                <h4>Address:</h4>
                                <p>{{ $user->address }}
                                </p>
                                @endif
                            </div>
                            <!--user-profile-ov end-->
                            @if($user->ugrad_name || $user->ugrad_major || $user->grad_inst_name || $user->grad_major)
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Education</h3>
                                @if($user->ugrad_name)
                                <h4>Undergraduate Name:</h4>
                                <p>{{ $user->ugrad_name }}
                                </p>
                                @endif
                                @if($user->ugrad_name)
                                <h4>Major:</h4>
                                <p>{{ $user->ugrad_major }}
                                </p>
                                @endif
                                @if($user->grad_inst_name)
                                <h4>Graduation Institute Name:</h4>
                                <p>{{ $user->grad_inst_name }}
                                </p>
                                @endif
                                @if($user->grad_major)
                                <h4>Major:</h4>
                                <p>{{ $user->grad_major }}
                                </p>
                                @endif
                            </div>
                            @endif
                            <!--user-profile-ov end-->
                            @if(count($user->skills) > 0 )
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Subject Matter Expertise</h3>
                                @foreach($user->skills as $skill)
                                <h4>Skill: {{ $skill->skill }}</h4>
                                <p>Proficiency: {{ $skill->level }}</p>
                                @endforeach
                            </div>
                            @endif
                            <!--user-profile-ov end-->
                            @if($user->passion || count($user->hobbies) > 0 || count($user->interests) > 0 ||
                            $user->board_ms || $user->organization_ms)
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Passion</h3>
                                @if($user->passion)
                                <h4>Passionate About:</h4>
                                <p>{{ $user->passion }}
                                </p>
                                @endif
                                @if(count($user->hobbies) > 0)
                                <h4>Hobbies:</h4>
                                <p class="trimString">
                                    @foreach($user->hobbies as $hobby)
                                    {{ $hobby->name }}@if(!$loop->last), @endif
                                    @endforeach
                                </p>
                                @endif
                                @if(count($user->interests) > 0)
                                <h4>Interests:</h4>
                                <p class="trimString">
                                    @foreach($user->interests as $interest)
                                    {{ $interest->name }}@if(!$loop->last), @endif
                                    @endforeach
                                </p>
                                @endif
                                @if($user->board_ms))
                                <h4>Board Memberships:</h4>
                                <p>{{ $user->board_ms }}</p>
                                @endif
                                @if($user->organization_ms))
                                <h4>Organization Memberships:</h4>
                                <p>{{ $user->organization_ms }}</p>
                                @endif
                            </div>
                            @endif
                            <!--user-profile-ov end-->
                            @if($user->opportunity )
                            <div class="user-profile-ov st2">
                                <h3 class="user-sec-title">Opportunities For You:</h3>
                                <h4>Opportunity:</h4>
                                <p>{{ $user->opportunity }}</p>
                            </div>
                            @endif
                            <!--user-profile-ov end-->
                            @if($user->need)
                            <div class="user-profile-ov st2">
                                <h3 class="user-sec-title">Critical Need</h3>
                                <h4>Need:</h4>
                                <p>{{ $user->need }}</p>
                                @if($user->need === 'Job' && $user->job_details)
                                <h4>Job Description:</h4>
                                <p>{{ $user->job_details }}</p>
                                @endif
                            </div>
                            @endif
                            <!--user-profile-ov end-->
                        </div>
                        <!--product-feed-tab end-->
                    </div>
                    <!--main-ws-sec end-->
                </div>
            </div>
        </div><!-- main-section-data end-->
    </div>
</div>
@endsection
