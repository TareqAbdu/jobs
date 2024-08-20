@extends('layouts.app')

@section('content') 

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Dashboard') }}</h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Dashboard')}}</li>
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

<div class="listpgWraper">

    <div class="container-fluid layout">
        
        @include('flash::message')

        <div class="menu-sidebar">
             @include('includes.company_dashboard_menu')

            </div>
            
            <div class="user-content pt-4"> 
                @include('includes.company_dashboard_stats')

        <?php

        if((bool)config('company.is_company_package_active')){        

        $packages = App\Package::where('package_for', 'like', 'employer')->get();

        $package = Auth::guard('company')->user()->getPackage();

        

        ?>

        

        <?php if(null !== $package){ ?>

        @include('includes.company_package_msg')

        @include('includes.company_packages_upgrade')

        <?php }elseif(null !== $packages){ ?>

        @include('includes.company_packages_new')

        <?php }} ?>

        </div>

        </div>

    

</div>


@endsection

@push('scripts')

@include('includes.immediate_available_btn')

@endpush

