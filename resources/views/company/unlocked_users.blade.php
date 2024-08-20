@extends('layouts.app')

@section('content')


<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Unlocked Seekers') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Unlocked Seekers')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="listpgWraper">
    <div class="container-fluid layout">


        <div class="menu-sidebar">
            @include('includes.company_dashboard_menu')
        </div>
        <div class="container">
            <div class="myads">


                <ul class="searchList">

                    <!-- job start -->

                    @if(isset($users) && count($users))

                    @foreach($users as $user)

                    <li>

                        <div class="row">

                            <div class="col-md-9 col-sm-9">

                                <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>

                                <div class="jobinfo">

                                    <h3><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h3>

                                    <div class="location"> {{trim($user->getLocation(),',')}}</div>

                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <div class="listbtn"><a href="{{route('user.profile', $user->id)}}">{{__('View Profile')}}</a></div>

                            </div>

                        </div>

                        <p>{{\Illuminate\Support\Str::limit($user->getProfileSummary('summary'),150,'...')}}</p>

                    </li>

                    <!-- job end -->

                    @endforeach
                    @else

                    <div class="nodatabox">
                        <h4>{{__('No Unlocked Seekers Found')}}</h4>
                        <div class="viewallbtn mt-2"><a class="btn btn-default btn-shadow ml-40 hover-up" href="{{url('/job-seekers')}}">{{__('Search Candidates')}}</a></div>
                    </div>

                    @endif

                </ul>

            </div>


        </div>


    </div>

</div>


@endsection
@push('styles')
<style type="text/css">
    .viewallbtn {
        text-align: center;
        margin-top: 40px;
    }

    .searchList {
        list-style: none;
        margin-bottom: 30px;
    }

    .myads h3 {
        font-size: 24px;
        margin: 0 0 10px 0;
    }

    .nodatabox {
        padding: 35px;
        background-color: #eee;
        border-radius: 5px;
        text-align: center;
    }

    .nodatabox h4 {
        font-size: 24px;
    }

    .viewallbtn {
        text-align: center;
        margin-top: 40px;
    }

    .viewallbtn a {
        display: inline-block;
        background: #d71a21;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        padding: 15px 30px;
        border-radius: 5px;
    }

</style>
@endpush
