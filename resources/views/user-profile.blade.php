@extends('layouts.app')

@section('content')
<div class="main-section">
    <div class="container">
        <div class="main-section-data">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main-left-sidebar">
                        <div class="user_profile">
                            <div class="user-pro-img">
                                <img src="{{ asset('images/resources/user.png') }}" width="100px"
                                    alt="">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->name }}</h3>
                                    <div class="star-descp">
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
                                        <h4>{{$ru->name}}</h4>
                                        <span>{{$ru->occupation}}</span>
                                    </div>
                                <span><a href="{{url('user-profile')}}/{{$ru->id}}"><i class="fa fa-eye"></i></a></span>
                                </div>
                                @endforeach
                            </div>
                            <!--suggestions-list end-->
                        </div>
                        <!--suggestions end-->
                    </div>
                    <!--main-left-sidebar end-->
                </div>
                <div class="col-lg-9">
                    <div class="main-ws-sec">
                        <div class="product-feed-tab current" id="info-dd">
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Passion</h3>
                                <p>{{ $user->passion ? $user->passion : 'NA'  }}</p>
                            </div>
                            <!--user-profile-ov end-->
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Subject Matter Expertise</h3>
                                <p>{{ $user->skills ? $user->skills : 'NA' }}</p>
                            </div>
                            <!--user-profile-ov end-->
                            <div class="user-profile-ov">
                                <h3 class="user-sec-title">Education</h3>
                                <h4>Undergraduate Name:</h4>
                                <p>{{ $user->ugrad_name ? $user->ugrad_name : 'NA' }}
                                </p>
                                <h4>Major:</h4>
                                <p>{{ $user->ugrad_major ? $user->ugrad_major : 'NA' }}
                                </p>
                                <h4>Graduation Institute Name:</h4>
                                <p>{{ $user->grad_inst_name ? $user->grad_inst_name : 'NA' }}
                                </p>
                                <h4>Major:</h4>
                                <p>{{ $user->grad_major ? $user->grad_major : 'NA' }}
                                </p>
                            </div>
                            <!--user-profile-ov end-->
                            <div class="user-profile-ov st2">
                                <h3 class="user-sec-title">About</h3>
                                <h4>Occupation:</h4>
                                <p>{{ $user->occupation ? $user->occupation : 'NA' }}</p>
                                <h4>Industry:</h4>
                                <p>{{ $user->industry ? $user->industry : 'NA' }}</p>
                                <h4>Work Email:</h4>
                                <p>{{ $user->work_email ? $user->work_email : 'NA' }}</p>
                                <h4>Contact no:</h4>
                                <p>{{ $user->cellphone ? $user->cellphone : 'NA' }}</p>
                                <h4>Address:</h4>
                                <p>{{ $user->address ? $user->address : 'NA' }}</p>
                            </div>
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
