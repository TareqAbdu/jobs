@extends('layouts.app')
@section('content')


<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Contact Us') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('Contact Us') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <div class="container wide mb-50">
     
            <div class="googlemap">
                <iframe style="    width: 100%; height: 300px;" src="https://maps.google.it/maps?q={{urlencode(strip_tags($siteSetting->site_google_map))}}&output=embed" allowfullscreen></iframe>
           </div>
     
    </div>
    <div class="container mt-90 mt-md-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">

                <section class="mb-50">
                    <h5 class="text-black text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{{__('We Are Here For Your Help')}}</h5>
                    <h5 class="text-black text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{{__('GET IN TOUCH FAST')}}</h5>

        
                    <div class="row">
                        <div class="col-xl-9 col-md-12 mx-auto">
                            <div class="contact-from-area padding-20-row-col">
                                <h2 class="section-title mt-15 mb-10 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{{ __('Send Message') }}</h2>
                                <div class="row mt-50">
                                    <div class="col-md-4 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <img src="{{ asset('new_template/imgs/theme/icons/plane-color.svg') }}" alt="">
                               
                                        <p class="text-muted font-xs mb-10">{{__('Address')}}</p>
                                        <p class="mb-0 font-lg">
                                            {{ $siteSetting->site_street_address }}
                                        </p>
                                    </div>
                                    <div class="col-md-4 mt-sm-30 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                        <img src="{{ asset('new_template/imgs/theme/icons/marker-color.svg') }}" alt="">
                                        <p class="text-muted font-xs mb-10">{{__('Email Address')}}</p>
                                        <p class="mb-0 font-lg">
                                            <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a>
                                        </p>
                                    </div>
                            
                                    <div class="col-md-4 mt-sm-30 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                                        <img src="{{ asset('new_template/imgs/theme/icons/headset-color.svg') }}" alt="">
                                        <p class="text-muted font-xs mb-10">{{__('Phone')}}</p>
                                        <p class="mb-0 font-lg">
                                            <a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a> <br>
                                            <a href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a>
                                        </p>
                            
                                    </div>
                                </div>
                                <form class="contact-form-style mt-80"method="post" action="{{ route('contact.us')}}" name="contactform" id="contactform">
                                    {{ csrf_field() }}
                                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                        <div class="col-lg-6 col-md-6{ $errors->has('full_name') ? ' has-error' : '' }}">
                                            <div class="input-style mb-20">
                                                {!! Form::text('full_name', null, array('id'=>'full_name', 'placeholder'=>__('Full Name'), 'required'=>'required', 'autofocus'=>'autofocus')) !!}                
                                    @if ($errors->has('full_name')) <span class="help-block"> <strong>{{ $errors->first('full_name') }}</strong> </span> @endif
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="input-style mb-20">
                                                {!! Form::text('email', null, array('id'=>'email', 'placeholder'=>__('Email'), 'required'=>'required')) !!}                
                                                @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <div class="input-style mb-20">
                                                {!! Form::text('phone', null, array('id'=>'phone', 'placeholder'=>__('Phone'))) !!}                
                                                @if ($errors->has('phone')) <span class="help-block"> <strong>{{ $errors->first('phone') }}</strong> </span> @endif                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6{ $errors->has('subject') ? ' has-error' : '' }}">
                                            <div class="input-style mb-20">
                                                {!! Form::text('subject', null, array('id'=>'subject', 'placeholder'=>__('Subject'), 'required'=>'required')) !!}                
                                                @if ($errors->has('subject')) <span class="help-block"> <strong>{{ $errors->first('subject') }}</strong> </span> @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 text-center">
                                            <div class="col-md-12{{ $errors->has('message_txt') ? ' has-error' : '' }}">                  
                                                {!! Form::textarea('message_txt', null, array('id'=>'message_txt', 'placeholder'=>__('Message'), 'required'=>'required')) !!}                
                                                @if ($errors->has('message_txt')) <span class="help-block"> <strong>{{ $errors->first('message_txt') }}</strong> </span> @endif
                                            </div>
                                            <div class="col-md-12{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Send message</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection