@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Reset Password') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('Reset Password') }}</li>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="useraccountwrap">
                    <div class="userccount whitebg">
                    <div class="panel-body mt-5">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="mb-2 control-label">{{__('Email Address')}}</label>
                                
                                    <input id="email" type="email" class="form-control" placeholder="Enter Your Register Email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                
                            </div>
                            <div class="text-center mt-3">
                                
                                    <button type="submit"  class="btn btn-default btn-find">
                                        {{__('Send Password Reset Link')}}
                                    </button>
                               
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection