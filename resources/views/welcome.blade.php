@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="header-sec">
		<div class="content col-md-5">
			<img class="img-responsive" src="{{asset('images/cm-logo.png')}}">
			<h2 class="text">Workwise, is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely.</h2>
		</div>
		<div class="img-sec col-md-6">
		<img class="img-responsive" src="{{asset('images/cm-main-img.png')}}" >
		</div>
	</div>
	<div class="carousel-sec">
		<div class="content">
			<h2 class="text">Workwise, is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely.</h2>
		</div>
		<div class="cfa-links">
			<a class="btn" href="/mentors">View Mentors</a>
			<a class="btn" href="/mentee">View Mentee</a>
		</div>
	</div>
</div>
@endsection