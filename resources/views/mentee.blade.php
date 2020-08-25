@extends('layouts.app')

@section('content')
<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <form method="get">
                <div class="row">
                    <div class="input-group col-md-12 p-0">
                    <input class="form-control py-2 border-right-0 border" type="search" name="query" value="@if(!empty($query)){{$query}}@endif" placeholder="Search mentee..." id="example-search-input">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
                    </div>
                </div>
                </form>
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                @foreach($mentees as $mentee)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src="{{ asset('images/resources/user.png') }}" alt="">
                            <h3>{{$mentee->name}}</h3>
                            <h4>{{$mentee->occupation}}</h4>
                            <ul>
                            <li><a href="mailto:{{$mentee->email}}" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        <a href="{{url('/user-profile')}}/{{$mentee->id}}" title="" class="view-more-pro">View Profile</a>
                        </div>
                        <!--company_profile_info end-->
                    </div>
                @endforeach
            </div>

            <div class="pagination-div">
                {{ $mentees->links() }}
            </div>
        </div>
</section>
<!--companies-info end-->
@endsection
