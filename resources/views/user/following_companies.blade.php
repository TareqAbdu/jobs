@extends('layouts.app')
@section('content') 

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('My Followings') }}</h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('My Followings')}}</li>
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
                @include('includes.user_dashboard_menu')
            </div>
                {{--  <div class="myads">                    
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($companies) && count($companies))
                        @foreach($companies as $company)
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
                                        <div class="location">
                                            <label class="fulltime">{{$company->getLocation()}}</label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{route('company.detail', $company->slug)}}">{{__('View Details')}}</a></div>
                                </div>
                            </div>
                            <p>{{\Illuminate\Support\Str::limit(strip_tags($company->description), 150, '...')}}</p>
                        </li>
                        <!-- job end --> 
                        @endforeach
                        @else
                            
                            <div class="nodatabox">
                                <h4>{{__('No Followings Found')}}</h4>
                                <div class="viewallbtn mt-2"><a href="{{url('/companies')}}">{{__('Search Companies')}}</a></div>
                            </div>
                        @endif
                    </ul>
                </div>  --}}
                <div class="user-content pt-4">
                    <section class="section-box ">
                        <div class="container-fluid">
                            <div class="list-recent-jobs list-job-2-col m-0">
                                <div class="row">
                                    @if(isset($companies) && count($companies))
                                    @foreach($companies as $company)
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                    <!-- Item job -->
                                                    <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                                        <div class="card-job-top">
                                                            <div class="card-job-top--image">
                                                                <a href="{{ route('company.detail', $company->slug) }}"
                                                                    title="{{ $company->name }}">
                                                                    <figure> {{ $company->printCompanyImage() }}</figure>
                                                                </a>
                                                            </div>
                                                            <div class="card-job-top--info">
                                                                <h6 class="card-job-top--info-heading"><a
                                                                       
                                                                        title="{{ $company->title }}">{{$company->getLocation()}}</a>
                                                                </h6>
                                                            
                                                            </div>
                                                        </div>
    
                                                        <div class="card-job-description mt-20">
    
    
                                                            {!! \Illuminate\Support\Str::limit($company->description, $limit = 140, $end = '...') !!}
                                                        </div>
                                                        <div class="mt-25">
                                                            <a href="{{route('company.detail', $company->slug)}}" class="btn btn-border btn-brand-hover">{{__('View Details')}}</a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                        @endforeach
                                        @else
                            
                                        <div class="nodatabox">
                                            <h4>{{__('No Followings Found')}}</h4>
                                            <div class="viewallbtn mt-2"><a href="{{url('/companies')}}">{{__('Search Companies')}}</a></div>
                                        </div>
                                    @endif
    
    
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
  
@endsection
@push('scripts')
<script>
    let navigation = document.querySelector('.user-menu .navigation');
    let listpgWraper = document.querySelector('.listpgWraper');

    let toggle = document.querySelector('.user-menu .toggle');
    toggle.onclick = function() {
        navigation.classList.toggle('active');
        listpgWraper.classList.toggle('active');
    }

</script>
@include('includes.immediate_available_btn')
@endpush