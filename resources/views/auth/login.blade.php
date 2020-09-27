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
                                <h3>Sign in</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd mb-3">
                                            <div class="sn-field mb-0">
                                                <input type="email" placeholder="Email"
                                                    class="@error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required>
                                                <i class="la la-user"></i>
                                            </div>
                                            <!--sn-field end-->
                                            @error('email')
                                            <span class="invalid-feedback d-block mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd mb-3">
                                            <div class="sn-field mb-0">
                                                <input type="password" class="@error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="current-password">
                                                <i class="la la-lock"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback d-block mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec">
                                                <div class="fgt-sec">
                                                    <input type="checkbox" id="c1" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="c1">
                                                        <span></span>
                                                    </label>
                                                    <small>Remember me</small>
                                                </div>
                                                <!--fgt-sec end-->
                                                <a href="{{ route('password.request') }}" title="">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <a class="mt-2" href="{{ route('register') }}" title="">Register free account!</a>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Sign in</button>
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
