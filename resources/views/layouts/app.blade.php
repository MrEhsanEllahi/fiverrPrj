<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/line-awesome-font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vee-validate@2.2.15/dist/vee-validate.js"></script>
    
</head>

<body>
    <div id="app">
        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="{{ url('/') }}" title=""><img
                                src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                    <!--logo end-->
                    <nav>
                        <ul>
                            @guest
                                <li>
                                    <a href="{{ url('/') }}" title="">
                                        <span><img src="{{ asset('images/icon1.png') }}"
                                                alt=""></span>
                                        Home
                                    </a>
                                </li>
                            @endguest
                            @auth
                                @if(Auth::user()->role === 1)
                                    <li>
                                        <a href="{{ url('/admin/dashboard') }}" title="">
                                            <span><img src="{{ asset('images/icon1.png') }}"
                                                    alt=""></span>
                                            Home
                                        </a>
                                    </li>
                                @elseif(Auth::user()->role === 2)
                                    <li>
                                        <a href="{{ url('/home') }}" title="">
                                            <span><img src="{{ asset('images/icon1.png') }}"
                                                    alt=""></span>
                                            Home
                                        </a>
                                    </li>
                                @endif
                            @endauth
                            <li>
                                <a href="{{ url('/mentors') }}" title="">
                                    <span><i class="fa fa-users"></i></span>
                                    Mentors
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/mentee') }}" title="">
                                    <span><i class="fa fa-users"></i></span>
                                    Mentee
                                </a>
                            </li>
                            {{-- <li>
								<a href="profiles.html" title="">
									<span><img src="images/icon4.png" alt=""></span>
									Profiles
								</a>
								<ul>
									<li><a href="user-profile.html" title="">User Profile</a></li>
									<li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
								</ul>
							</li> --}}
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" title="">
                                        <span><i class="fa fa-user"></i></span>
                                        Login
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                    <!--nav end-->
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>
                    <!--menu-btn end-->
                    @auth
                        <div class="user-account">
                            <div class="user-info">
                                <img src="{{ asset('images/resources/user.png') }}" width="25px"
                                    height="25px" alt="">
                                <a href="#" title="">{{ Auth::user()->name }}</a>
                                <i class="la la-sort-down"></i>
                            </div>
                            <div class="user-account-settingss" id="users">
                                <ul class="us-links">
                                    @if(Auth::user()->role === 1)
                                        <li><a href="/admin/dashboard" title="">Dashboard</a></li>
                                        <li><a href="/admin/log-activity" title="">Log Activity</a></li>
                                    @elseif(Auth::user()->role === 2)
                                        <li><a href="/home" title="">Dashboard</a></li>
                                    @endif
                                    <li><a href="#" title="">Privacy</a></li>
                                    <li><a href="#" title="">Faqs</a></li>
                                    <li><a href="#" title="">Terms & Conditions</a></li>
                                </ul>
                                <h3 class="tc"><a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" title="">{{ __('Logout') }}</a></h3>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--user-account-settingss end-->
                    @endauth
                </div>
            </div>
            <!--header-data end-->
    </div>
    </header>
    <!--header end-->

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    @auth
                        @if(Auth::user()->role === 1)
                            <li>
                                <a href="{{ url('/admin/dashboard') }}" title="">
                                    <span><img src="{{ asset('images/icon1.png') }}" alt=""></span>
                                    Home
                                </a>
                            </li>
                        @elseif(Auth::user()->role === 2)
                            <li>
                                <a href="{{ url('/home') }}" title="">
                                    <span><img src="{{ asset('images/icon1.png') }}" alt=""></span>
                                    Home
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li><a href="{{ url('mentors') }}" title="">Mentors</a></li>
                    <li><a href="{{ url('mentee') }}" title="">Mentee</a></li>
                    {{-- <li><a href="#" title="">Privacy Policy</a></li>
					<li><a href="#" title="">Community Guidelines</a></li>
					<li><a href="#" title="">Cookies Policy</a></li>
					<li><a href="#" title="">Career</a></li>
					<li><a href="forum.html" title="">Forum</a></li>
					<li><a href="#" title="">Language</a></li>
					<li><a href="#" title="">Copyright Policy</a></li> --}}
                </ul>
                <p><img src="{{ asset('images/copy-icon2.png') }}" alt="">Copyright 2019</p>
                <img class="fl-rgt" src="{{ asset('images/logo2.png') }}" alt="">
            </div>
        </div>
    </footer>
    <!--footer end-->
@yield('scripts')
</body>

</html>
