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
                                <img src="images/cm-logo.png" alt="">
                                <p>Workwise, is a global freelancing platform and social networking where businesses and
                                    independent professionals connect and collaborate remotely</p>
                            </div>
                            <!--cm-logo end-->
                            <img src="images/cm-main-img.png" alt="">
                        </div>
                        <!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <div class="sign_in_sec current" id="tab-1">
                                <div class="dff-tab current" id="tab-3">
                                    <h3>Sign up</h3>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd mb-3">
                                                <div class="sn-field mb-0">
                                                    <input type="text" class="@error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus placeholder="Full Name">
                                                    <i class="la la-user"></i>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 no-pdd mb-3">
                                                <div class="sn-field mb-0">
                                                    <input type="email" class="@error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}"
                                                        placeholder="Email" required autocomplete="email">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 no-pdd mb-3">
                                                <div class="sn-field mb-0">
                                                    <input type="password" name="password" placeholder="Password"
                                                        class="@error('password') is-invalid @enderror" required
                                                        autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 no-pdd mb-3">
                                                <div class="sn-field mb-0">
                                                    <input type="password" name="password_confirmation"
                                                        placeholder="Confirm Password" required
                                                        autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec st2">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="cc" id="c2">
                                                        <label for="c2">
                                                            <span></span>
                                                        </label>
                                                        <small>Yes, I understand and agree to the workwise Terms &
                                                            Conditions.</small>
                                                    </div>
                                                    <!--fgt-sec end-->
                                                </div>
                                            </div>
                                            <a class="mt-2" href="{{ route('login') }}" title="">Have an account? Login!</a>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Sign Up</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--dff-tab end-->
                            </div>
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
