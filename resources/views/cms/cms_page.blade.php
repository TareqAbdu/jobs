@extends('layouts.app')
@section('content')
  

    @push('styles')
        <style>
            body{
                background-size: cover !important;
            }
        </style>
    @endpush

    <section class="section-box bg-banner-about banner-home-3 cms pt-3">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">
                                {{ $cmsContent->page_title }}</h3>
                            <div class="form-find mw-720 mt-25">
                                <form action="{{ route('job.list') }}" method="get"
                                    class="form-newsletter wow animate__animated animate__fadeInUp">
                                    <input type="text" class="form-input input-keysearch mr-10 ml-10" name="search"
                                        id="jbsearch" value="{{ Request::get('search', '') }}"
                                        placeholder="{{ __('Enter Skills or job title') }}" autocomplete="off" />
                                    <button type="submit"
                                        class="btn btn-default btn-find wow animate__animated animate__fadeInUp">{{ __('Search') }}</button>
                                </form>
                            </div>
                            <div class="list-tags-banner mt-25 text-center wow animate__animated animate__fadeInUp">
                                @if (Auth::guard('company')->check())
                                    <h5 class="text-md-newsletter">
                                        {{ __('Looking for the right talent? Search Jobseekers Today') }}</h5>
                                @else
                                    <h5 class="text-md-newsletter">
                                        {{ __('One million success stories. Start yours today') }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Inner Page Title end -->
    <div class="about-wraper">
        <div class="container">

            <div class="largebanner shadow3 mt-0">
                <div class="adin">
                    {!! $siteSetting->cms_page_ad !!}
                </div>
                <div class="clearfix"></div>
            </div>




            <h2>{{ $cmsContent->page_title }}</h2>
            <p>{!! $cmsContent->page_content !!}</p>


        </div>
    </div>
@endsection
