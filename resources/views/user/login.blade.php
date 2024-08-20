@extends('layouts.app')
@section('content')

@push('styles')
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

{{--  * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}  --}}

{{--  body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}  --}}

body{
	background-size: cover !important;
}

.candidate-login .container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	
}

.candidate-login .screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.candidate-login .screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.candidate-login .screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.candidate-login .screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.candidate-login .screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.candidate-login .screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.candidate-login .screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.candidate-login .screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.candidate-login .login {
	width: 320px;
    padding: 30px;
    padding-top: 145px;
}

.candidate-login .login__field {
	padding: 10px 0px;	
	position: relative;	
}

.candidate-login .login__icon {
	position: absolute;
	top: 27px;
	left: 10px;
	color: #7875B5;
}

.candidate-login .login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 30px;
	font-weight: 700;
	width: 111%;
	transition: .2s;

}

.candidate-login .login__input:active,
.candidate-login .login__input:focus,
.candidate-login .login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.candidate-login .login__submit {
    background: #fff;
    font-size: 14px;
    margin-top: 7px;
    padding: 13px 20px;
    border-radius: 26px;
    border: 1px solid #D4D3E8;
    text-transform: uppercase;
    font-weight: 700;
    display: flex;
    align-items: center;
    width: 70%;
    color: #4C489D;
    box-shadow: 0px 2px 2px #5C5696;
    cursor: pointer;
    transition: .2s;
    margin-bottom: 20px;
}

.candidate-login .login__submit:active,
.candidate-login .login__submit:focus,
.candidate-login .login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.candidate-login .button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.candidate-login .social-login {	
	position: absolute;
	height: 120px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.candidate-login .social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.candidate-login .social-login__icon {
	padding: 0px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
	font-size: 20px;
}

.candidate-login .social-login__icon:hover {
	transform: scale(1.5);	
}
.text-direct{
	font-size: 13px;
    font-weight: 600;
    line-height: 14px;
}
</style>
@endpush
<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Candidate Login') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('Candidate Login') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="candidate-login">
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                @include('flash::message')

                <form class="login" class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="candidate_or_employer" value="candidate" />

                    <div class="login__field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" type="password"  name="password" value="" required placeholder="{{__('Password')}}">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">{{__('Login')}}</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>		
                    <div class="mb-3 text-direct"><i class="fas fa-lock" aria-hidden="true"></i> {{__('Forgot Your Password')}}? <a href="{{ route('password.request') }}">{{__('Click here')}}</a></div>          
                    <div class="newuser text-direct"><i class="fa fa-user" aria-hidden="true"></i> {{__('New User')}}? <a href="{{route('candidate_register')}}">{{__('Register Here')}}</a></div>
               
                </form>
                
                <div class="social-login">
                    <h3 style="font-size: 16px;">{{__('Login with Social')}}</h3>
                    <div class="social-icons">
                        <a  href="{{ url('login/jobseeker/facebook')}}"  class="social-login__icon fab fa-facebook"></a>
                        <a href="{{ url('login/jobseeker/twitter')}}" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</div>


@endsection
