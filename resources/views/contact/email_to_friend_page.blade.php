@extends('layouts.app')
@section('content') 


<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Email to Friend') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('Email to Friend') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('flash::message')

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="contact-from-area padding-20-row-col">
    
                <form class="contact-form-style mt-25"method="post" action="{{ route('email.to.friend', $slug)}}" name="contactform" id="contactform">
                    {{ csrf_field() }}
                    <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="col-lg-6 col-md-6{{ $errors->has('job_url') ? ' has-error' : '' }}">
                            <div class="input-style mb-20">
                                {!! Form::text('job_url', route('job.detail', $slug), array('class'=>'form-control', 'id'=>'job_url', 'placeholder'=>__('URL'), 'required'=>'required', 'readonly'=>'readonly')) !!}                
                                @if ($errors->has('job_url')) <span class="help-block"> <strong>{{ $errors->first('job_url') }}</strong> </span> @endif 
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6{{ $errors->has('friend_name') ? ' has-error' : '' }}">
                            <div class="input-style mb-20">
                                {!! Form::text('friend_name', null, array('class'=>'form-control', 'id'=>'friend_name', 'placeholder'=>__('Friends Name'), 'required'=>'required', 'autofocus'=>'autofocus')) !!}                
                                        @if ($errors->has('friend_name')) <span class="help-block"> <strong>{{ $errors->first('friend_name') }}</strong> </span> @endif 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6{{ $errors->has('friend_email') ? ' has-error' : '' }}">
                            <div class="input-style mb-20">
                                        {!! Form::text('friend_email', null, array('class'=>'form-control', 'id'=>'friend_email', 'placeholder'=>__('Friends Email'), 'required'=>'required')) !!}                
                                        @if ($errors->has('friend_email')) <span class="help-block"> <strong>{{ $errors->first('friend_email') }}</strong> </span> @endif                      </div>
                        </div>
                        <div class="col-lg-6 col-md-6{{ $errors->has('your_name') ? ' has-error' : '' }}">
                            <div class="input-style mb-20">
                                <?php
                                $your_name = (Auth::check()) ? Auth::user()->name : '';
                                ?>
                                {!! Form::text('your_name', $your_name, array('class'=>'form-control', 'id'=>'your_name', 'placeholder'=>__('Your Name'), 'required'=>'required')) !!}                
                                @if ($errors->has('your_name')) <span class="help-block"> <strong>{{ $errors->first('your_name') }}</strong> </span> @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6{ $errors->has('your_email') ? ' has-error' : '' }}">
                            <div class="input-style mb-20">
                                <?php
                                $your_email = (Auth::check()) ? Auth::user()->email : '';
                                ?>
                                {!! Form::text('your_email', $your_email, array('class'=>'form-control', 'id'=>'your_email', 'placeholder'=>__('Your Email'), 'required'=>'required')) !!}                
                                @if ($errors->has('your_email')) <span class="help-block"> <strong>{{ $errors->first('your_email') }}</strong> </span> @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                        </div>
                        
                    </div>
                    <button class="btn btn-default btn-find"  id="post_ad_btn" type="submit">{{__('Send to friend')}}</button>
    
                </form>
                <p class="form-messege"></p>
            </div>
        </div>
    </div>
</div>
@endsection