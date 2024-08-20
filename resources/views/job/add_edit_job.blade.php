@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ _('Job Details') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{_('Job Details')}}</li>
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

        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="userccount">
                        <div class="formpanel mt-0"> @include('flash::message')
                            <!-- Personal Information -->
                            @include('job.inc.job')
                        </div>
                    </div>
    
                </div>
            </div>
            
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p {
        text-align: left !important;
    }
.formpanel .formrow {
  margin-bottom: 15px;
}
.formpanel .form-control {
  height: auto;
  border-radius: 0;
  padding: 10px 13px;
  border-color: #ddd;
}
</style>
@endpush
