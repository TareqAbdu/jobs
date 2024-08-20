@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Cvs Search Packages') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Cvs Search Packages')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $company = Auth::guard('company')->user(); ?>
<div class="listpgWraper">
    <div class="container-fluid layout">
        @include('flash::message')
        <div class="menu-sidebar">
            @include('includes.company_dashboard_menu')
        </div>
        <div class="user-content pt-4">

            @if(null!==($success_package) && !empty($success_package))
            <div class="instoretxt">

                <div class="job-list-list mb-15">
                    <div class="list-recent-jobs">
                        <!-- Item job -->
                        <div class="card-job hover-up wow animate__animated animate__fadeIn text-center " style="font-size: bold;">
                            <div class="credit">{{__('Your Package is')}}: <strong>{{$success_package->package_title}} - {{ $siteSetting->default_currency_code }}{{$success_package->package_price}}</strong></div>
                            <div class="credit">
                                {{__('Package Duration')}} :
                                {{Carbon\Carbon::parse($company->cvs_package_start_date)->format('d M, Y')}}</strong> - <strong>{{Carbon\Carbon::parse($company->cvs_package_end_date)->format('d M, Y')}}</strong>
                            </div>

                            <div class="credit">{{__('Availed quota')}} : <strong>{{$company->availed_cvs_quota}}</strong> - <strong>{{$company->cvs_quota}}</strong></div>
                        </div>
                        @endif
                <div class="paypackages">
                    <!---four-paln-->
                    <?php 
        $package = Auth::guard('company')->user()->cvs_getPackage();
     ?>
                    @if(null!==($package))
            
                    <section class="section-box mt-90 mb-50">
                        <div class="container">
                            <div class="w-50 w-md-100 mx-auto text-center">
                                <h3 class="mb-30 wow animate__animated animate__fadeInUp">{{__('Our Cvs Search Packages')}}</h3>
                            </div>
                            <div class="block-pricing mt-125 mt-md-50 row">
                                @foreach($packages as $package)
                                <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                    <div class="box-pricing-item most-popular">
                                        <div class="text-end mb-10">
                                            <a href="#" class="btn btn-white-sm">{{$package->package_title}}</a>
                                        </div>
                                        <div class="box-info-price">
                                            <span class="text-price for-month display-month">{{ $siteSetting->default_currency_code }} {{$package->package_price}}</span>
                                        </div>
                    
                                        <ul class="list-package-feature">
                                            @if($package->package_for=='cv_search')
                                            <li class="plan-pages">{{__('Can search seekrs')}} : {{$package->package_num_listings}}</li>
                                            @else
                                            <li class="plan-pages">{{__('Can post jobs')}} : {{$package->package_num_listings}}</li>
                                            @endif
                
                                            <li class="plan-pages">{{__('Package Duration')}} : {{$package->package_num_days}} {{__('Days')}}</li>
                                            @if((bool)$siteSetting->is_paypal_active)
                                            <a style="color: white" class="btn" href="{{route('order.upgrade.package', $package->id)}}"><i class="fab fa-cc-paypal" aria-hidden="true"></i> {{__('pay with paypal')}}</a>
                                            @endif
                                            @if((bool)$siteSetting->is_stripe_active)
                                            <a  style="color: white" class="btn" href="{{route('stripe.order.form', [$package->id, 'upgrade'])}}"><i class="fab fa-cc-stripe" aria-hidden="true"></i> {{__('pay with stripe')}}</a>
                                            @endif
                                            @if((bool)$siteSetting->is_payu_active)
                                           <a style="color: white" class="btn" href="{{route('payu.order.cvsearch.package', ['package_id='.$package->id, 'type=upgrade'])}}">{{__('pay with PayU')}}</a>
                                            @endif
                    
                                        </ul>
                             
                                    </div>
                                </div>
                           
                                @endforeach
                    
                            </div>
                        </div>
                        </div>
                    </section>
                    @else
                
                    <section class="section-box mt-90 mb-50">
                        <div class="container">
                            <div class="w-50 w-md-100 mx-auto text-center">
                                <h3 class="mb-30 wow animate__animated animate__fadeInUp">{{__('Our Cvs Search Packages')}}</h3>
                            </div>
                            <div class="block-pricing mt-125 mt-md-50 row">
                                @foreach($packages as $package)
                                <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                    <div class="box-pricing-item most-popular">
                                        <div class="text-end mb-10">
                                            <a href="#" class="btn btn-white-sm">{{$package->package_title}}</a>
                                        </div>
                                        <div class="box-info-price">
                                            <span class="text-price for-month display-month">{{ $siteSetting->default_currency_code }} {{$package->package_price}}</span>
                                        </div>
                    
                                        <ul class="list-package-feature">
                                            @if($package->package_for == 'cv_search')
                                            <li class="plan-pages">{{__('Can search seekrs')}} : {{$package->package_num_listings}}</li>
                                            @else
                                            <li class="plan-pages">{{__('Can post jobs')}} : {{$package->package_num_listings}}</li>
                                            @endif
                                            <li class="plan-pages">{{__('Package Duration')}} : {{$package->package_num_days}} {{__('Days')}}</li>
                                            @if($package->package_price > 0)
                                            @if((bool)$siteSetting->is_paypal_active)
                                            <li class="order paypal"><a href="{{route('order.package', $package->id)}}"><i class="fab fa-cc-paypal" aria-hidden="true"></i> {{__('pay with paypal')}}</a></li>
                                            @endif
                                            @if((bool)$siteSetting->is_stripe_active)
                                            <li class="order"><a href="{{route('stripe.order.form', [$package->id, 'new'])}}"><i class="fab fa-cc-stripe" aria-hidden="true"></i> {{__('pay with stripe')}}</a></li>
                                            @endif
        
                                            @if((bool)$siteSetting->is_payu_active)
                                            <li class="order payu"><a href="{{route('payu.order.cvsearch.package', ['package_id='.$package->id, 'type=new'])}}">{{__('pay with PayU')}}</a></li>
                                            @endif
        
                                            @else
                                            <li class="order "><a href="{{route('order.free.package', $package->id)}}"> {{__('Subscribe Free Package')}}</a></li>
                                            @endif
                    
                                        </ul>
                             
                                    </div>
                                </div>
                           
                                @endforeach
                    
                            </div>
                        </div>
                        </div>
                    </section>
                    @endif

                    <!---end four-paln-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush

