@extends('layouts.app')
@section('content')


<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Contact Us')}} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Contact Us')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Inner Page Title end -->
<div class="inner-page">
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span>&nbsp;</span>
                <h2>{{__('Thanks for being awesome')}}</h2>
                <p>{{__('We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number to talk to one of our staff members. Otherwise, we will reply by email as soon as possible')}}<br /><br />
                    {{__('Talk to you soon')}}<br />
                    {{ $siteSetting->site_name }}</p>
            </div>      
        </div>
    </div>
</div>

@endsection