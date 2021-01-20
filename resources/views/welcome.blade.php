@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="header-sec">
		<div class="content col-md-5">
			<h1>Welcome to Alpha Connect</h1>
			<h2 class="text">A place where brothers can connect in an effort to Push those above and Pull those below upward!</h2>
		</div>
		<div class="img-sec col-md-6">
		<img class="img-responsive" src="{{asset('images/cm-main-img.png')}}" >
		</div>
	</div>
	<div class="carousel-sec">
		<div class="content">
			<h2 class="text">Alpha Connect, is a private networking platform for Brothers.</h2>
		</div>
		<div class="cfa-links">
			<a class="btn" href="/mentors">View Mentors</a>
			<a class="btn" href="/mentee">View Mentee</a>
		</div>
	</div>
</div>
@endsection