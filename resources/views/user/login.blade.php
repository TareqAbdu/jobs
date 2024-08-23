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

.bg-auth {
  padding: 40px 0;
  background-color: rgba(var(--bs-primary-rgb), 0.1);
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  min-height: 100vh;
}
@media (max-width: 991.98px) {
  .bg-auth {
    padding: 60px 0;
  }
}

.auth-box {
  border: none;
  -webkit-box-shadow: 0px 3px 10px 0px rgba(40, 48, 57, 0.08);
          box-shadow: 0px 3px 10px 0px rgba(40, 48, 57, 0.08);
  border-radius: 10px;
  overflow: hidden;
}
.auth-box .auth-content {
  background-color: #d71a21;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  height: 100%;
}
.auth-box .logo-dark {
  display: inline-block;
  width: 50px;
}
.auth-box .logo-light {
  display: none;
}
.auth-box .auth-form .form-control {
  color: #fff;
  border-color: rgba(255, 255, 255, 0.1);
  background-color: rgba(255, 255, 255, 0.1);
}
.auth-box .auth-form .form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: rgba(255, 255, 255, 0.45);
}
.auth-box .auth-form .form-control::-moz-placeholder { /* Firefox 19+ */
  color: rgba(255, 255, 255, 0.45);
}
.auth-box .auth-form .form-control:-ms-input-placeholder { /* IE 10+ */
  color: rgba(255, 255, 255, 0.45);
}
.auth-box .auth-form .form-control:-moz-placeholder { /* Firefox 18- */
  color: rgba(255, 255, 255, 0.45);
}
.welcome
{
	color:white !important;
}
.btn-white
{
	background-color: white !important;
}
.loginsocial
{
	color: white;
	font-size: 20px;
	padding-bottom: 10px;
}
.social-icons a
{
	color:white;
	padding: 3px;
	font-size: 20px;
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


<!-- START SIGN-IN -->
<section class="bg-auth">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="card auth-box">
                    <div class="row g-0">
                        <div class="col-lg-6 text-center">
                            <div class="card-body p-4">
                             
                                <div class="mt-5">
                                    <img src="{{asset('new_template/imgs/theme/undraw_personal_email_re_4lx7.svg')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="auth-content card-body p-5 h-100 text-white">
                                <div class="w-100">
                                    <div class="text-white-70 text-center mb-4">
                                        <h5 class="welcome">{{__('Welcome Back!')}}</h5>
                                        <p class="text-white-70">{{__('Sign in to continue to Jobaaty.')}}</p>
                                    </div>
                                    <form action="{{ route('login') }}" method="POST" class="auth-form">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                                        <div class="mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="form-label">{{__('Email Address')}}</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                            <div class="text-white">
                                                {{ $errors->first('email') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="form-label">{{__('Password')}}</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            @if ($errors->has('password'))
                                            <div class="text-white">
                                                {{ $errors->first('password') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="mb-4">
											<a href="{{ route('password.request') }}" class="float-end text-white">{{__('Forgot Password')}}</a>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-white btn-hover w-100">{{__('Login')}}</button>
                                        </div>
                                    </form>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">{{__('Dont have an account')}}? <a href="{{ route('candidate_register') }}" class="fw-medium text-white text-decoration-underline">{{__('Register Here')}}</a></p>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="loginsocial">{{__('Login with Social')}}</h3>
                                        <div class="social-icons">
                                            <a href="{{ url('login/jobseeker/facebook') }}" class="social-login__icon fab fa-facebook"></a>
                                            <a href="{{ url('login/jobseeker/twitter') }}" class="social-login__icon fab fa-twitter"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end auth-box-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- END SIGN-IN -->


@endsection
