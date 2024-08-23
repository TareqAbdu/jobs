@extends('layouts.app')
@section('content')

@push('styles')
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

.bg-auth {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-box {
    background: #FFF;
    box-shadow: 0px 0px 24px #b1b1b14f;
}

.auth-content {
    background: #d71a21;
    border-radius: 12px 0 0 12px;
}

.auth-form {
    padding: 20px;
}

.auth-form .form-label {
    color: #fff;
}

.auth-form .form-control {
    border: none;
    border-radius: 0;
    margin-bottom: 15px;
    padding: 10px;
}

.auth-form .btn {
    background: #fff;
    color: #d71a21;
    border-radius: 26px;
    font-weight: 700;
    transition: .2s;
}

.auth-form .btn:hover {
    background: #f0f0f0;
}

.auth-content a {
    color: #fff;
}

.auth-content a:hover {
    text-decoration: underline;
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
                            {{__('candidate Register') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('candidate Register') }}</li>
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
	<?php
	$c_or_e = old('candidate_or_employer', 'candidate');
	?>

  
  <section class="bg-auth">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-10 col-lg-12">
                  <div class="card auth-box">
                      <div class="row align-items-center">
                          <div class="col-lg-6 text-center">
                              <div class="card-body p-4">
                                
                                  <div class="mt-5">
                                      <img src="{{asset('new_template/imgs/theme/undraw_personal_email_re_4lx7.svg')}}" alt="" class="img-fluid">
                                  </div>
                              </div>
                          </div><!--end col-->
                          <div class="col-lg-6">
                              <div class="auth-content card-body p-5 text-white">
                                  <div class="w-100">
                                      <div class="text-center">
                                          <h5 class="text-white">{{ __('Sign in') }}</h5>
                                      </div>
                                      @include('flash::message')
                                      <form action="{{ route('company.register') }}" method="POST" class="auth-form">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="candidate_or_employer" value="candidate" />
                                          <div class="mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                                              <label for="nameInput" class="form-label">{{ __('Name') }}</label>
                                              <input type="text" class="form-control" id="nameInput" name="name" required placeholder="{{ __('Enter your name') }}" value="{{ old('name') }}">
                                              @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="emailInput" class="form-label">{{ __('Email Address') }}</label>
                                              <input type="email" class="form-control" id="emailInput" name="email" required placeholder="{{ __('Enter your email') }}" value="{{ old('email') }}">
                                              @if ($errors->has('email'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="passwordInput" class="form-label">{{ __('Password') }}</label>
                                              <input type="password" class="form-control" id="passwordInput" name="password" required placeholder="{{ __('Enter your password') }}">
                                              @if ($errors->has('password'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="mb-4{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                              <label for="passwordConfirmationInput" class="form-label">{{ __('Confirm Password') }}</label>
                                              <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation" required placeholder="{{ __('Confirm your password') }}">
                                              @if ($errors->has('password_confirmation'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="mb-4">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="subscribeCheck" name="is_subscribed" {{ old('is_subscribed', 1) ? 'checked' : '' }}>
                                                  <label class="form-check-label" for="subscribeCheck">{{ __('Subscribe to Newsletter') }}</label>
                                                  @if ($errors->has('is_subscribed'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('is_subscribed') }}</strong>
                                                  </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="mb-4">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="termsCheck" name="terms_of_use">
                                                  <label class="form-check-label" for="termsCheck"><a href="{{ url('cms/terms-of-use') }}">{{ __('I accept Terms of Use') }}</a></label>
                                                  @if ($errors->has('terms_of_use'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('terms_of_use') }}</strong>
                                                  </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="mb-4 text-center">
                                              {!! app('captcha')->display() !!}
                                              @if ($errors->has('g-recaptcha-response'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="text-center">
                                              <button type="submit" class="btn btn-white btn-hover w-100">{{ __('Create Account') }}</button>
                                          </div>
                                      </form>
                                      <div class="mt-3 text-center">
                                          <p class="mb-0">{{ __('Already a member?') }} <a href="{{ route('login') }}" class="fw-medium text-white text-decoration-underline">{{ __('Sign In') }}</a></p>
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
</div>


@endsection
