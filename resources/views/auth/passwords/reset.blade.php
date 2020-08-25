@extends('layouts.app')

@section('content')
<div class="wrapper">

    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                            <img src="{{asset('images/cm-logo.png')}}" alt="">
                                <p>Workwise, is a global freelancing platform and social networking where businesses and
                                    independent professionals connect and collaborate remotely</p>
                            </div>
                            <!--cm-logo end-->
                            <img src="{{asset('images/cm-main-img.png')}}" alt="">
                        </div>
                        <!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <div class="sign_in_sec current" id="tab-1">

                                <h3>Reset Password</h3>
                                <form method="POST" action="{{ route('password.update') }}">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="email" placeholder="Email"
                                                    class="@error('email') is-invalid @enderror" name="email"
                                                    value="{{ $email ?? old('email') }}"
                                                    required autocomplete="email" autofocus>
                                                <i class="la la-user"></i>
                                            </div>
                                            <!--sn-field end-->
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" class="@error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="current-password">
                                                <i class="la la-lock"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" class="@error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="current-password">
                                                <i class="la la-lock"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                                <i class="la la-lock"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Reset Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--sign_in_sec end-->
                        </div>
                        <!--login-sec end-->
                    </div>
                </div>
            </div>
            <!--signin-pop end-->
        </div>
        <!--signin-popup end-->
    </div>
    <!--sign-in-page end-->


</div>
<!--theme-layout end-->
@endsection
