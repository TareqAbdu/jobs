@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Verify') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                                    <li>{{ __('Verify') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="authpages">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="useraccountwrap">
                    <div class="userccount whitebg">
                   

                    <div class="card-body text-center">
                         <h3>{{ __('Verify Your Email Address') }}</h3>
                         
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('We resend verification email, please check your email for a verification link.') }}
                            </div>
                        @endif

                        <p>{{ __('Before proceeding, please check your email for a verification link.') }} <br>
                        {{ __('If you did not receive the email') }},
                        </p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-default mt-3">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div> 
    

@endsection