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
                                <img src="{{ asset('images/cm-logo.png') }}" alt="">
                                <p>Workwise, is a global freelancing platform and social networking where businesses and
                                    independent professionals connect and collaborate remotely</p>
                            </div>
                            <!--cm-logo end-->
                            <img src="{{ asset('images/cm-main-img.png') }}" alt="">
                        </div>
                        <!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <div class="sign_in_sec current" id="tab-1">
                                <h3>Password Reset Link</h3>
                                @if(session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
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
                                            <button type="submit" value="submit">Send Reset Link</button>
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
