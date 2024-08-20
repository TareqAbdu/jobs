@extends('layouts.app')
@section('content')


    <section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                                {{ __('Applied Jobs') }}</h3>

                            <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                                <div class="text-center">
                                    <ul class="breadcrumbs mt-sm-15">
                                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                                        <li>{{ __('Applied Jobs') }}</li>
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

            <div class="menu-sidebar">
                @include('includes.user_dashboard_menu')

            </div>

            <div class="user-content pt-4">
                <section class="section-box ">
                    <div class="container-fluid">
                        <div class="list-recent-jobs list-job-2-col m-0">
                            <div class="row">
                                @if (isset($jobs) && count($jobs))
                                    @foreach ($jobs as $job)
                                        @php $company = $job->getCompany(); @endphp
                                        @if (null !== $company)
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                <!-- Item job -->
                                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                                    <div class="card-job-top">
                                                        <div class="card-job-top--image">
                                                            <a href="{{ route('company.detail', $company->slug) }}"
                                                                title="{{ $company->name }}">
                                                                <figure> {{ $company->printCompanyImage() }}</figure>
                                                            </a>
                                                        </div>
                                                        <div class="card-job-top--info">
                                                            <h6 class="card-job-top--info-heading"><a
                                                                    href="{{ route('job.detail', [$job->slug]) }}"
                                                                    title="{{ $job->title }}">{{ $job->title }}</a>
                                                            </h6>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="{{ route('company.detail', $company->slug) }}"
                                                                        title="{{ $company->name }}"><span
                                                                            class="card-job-top--company">{{ $company->name }}</span>
                                                                    </a> &nbsp;
                                                                    <span class="card-job-top--location text-sm"><i
                                                                            class="fi-rr-marker"></i>
                                                                        {{ $job->getCity('city') }}</span>

                                                                    <span class="card-job-top--post-time text-sm"><i
                                                                            class="fi-rr-clock"></i>
                                                                        {{ $job->created_at->format('M d, Y') }} </span>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-job-description mt-20">


                                                        {!! \Illuminate\Support\Str::limit($job->description, $limit = 140, $end = '...') !!}
                                                    </div>
                                                    <div class="card-job-bottom mt-25">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12 col-12">
                                                                <a
                                                                    class="btn btn-small background-blue-light mr-5">{{ $job->getCareerLevel('career_level') }}</a>
                                                                <a class="btn btn-small background-6 disc-btn">
                                                                    {{ $job->getJobType('job_type') }} </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>


@endsection
@push('scripts')
<script>
    let navigation = document.querySelector('.user-menu .navigation');
    let listpgWraper = document.querySelector('.listpgWraper');

    let toggle = document.querySelector('.user-menu .toggle');
    toggle.onclick = function() {
        navigation.classList.toggle('active');
        listpgWraper.classList.toggle('active');
    }

</script>
    @include('includes.immediate_available_btn')
@endpush
