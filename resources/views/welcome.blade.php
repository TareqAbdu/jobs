@extends('layouts.app')
@section('content')


    @if ((bool) $siteSetting->is_slider_active)
        <!-- Revolution slider start -->
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @if (isset($sliders) && count($sliders))
                        @foreach ($sliders as $slide)
                            <!--Slide-->
                            <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000"
                                data-saveperformance="on"> <img alt="{{ $slide->slider_heading }}"
                                    src="{{ asset('/') }}images/slider/dummy.png"
                                    data-lazyload="{{ ImgUploader::print_image_src('/slider_images/' . $slide->slider_image) }}">
                                <div class="caption lft large-title tp-resizeme slidertext1" data-x="left" data-y="90"
                                    data-speed="600" data-start="1600">{{ $slide->slider_heading }}</div>
                                <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200"
                                    data-speed="600" data-start="2800">{!! $slide->slider_description !!}</div>
                                <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200"
                                    data-speed="600" data-start="2800">


                                    <div class="block-banner">
                                        <div class="form-find mt-60 wow animate__animated animate__fadeInUp"
                                            data-wow-delay=".2s">



                                            @if (Auth::guard('company')->check())
                                                <form action="{{ route('job.seeker.list') }}" method="get">

                                                    <input type="text" name="search" id="empsearch"
                                                        value="{{ Request::get('search', '') }}" class="form-control"
                                                        placeholder="{{ __('Enter Skills or Job Seeker Details') }}"
                                                        autocomplete="off" />

                                                    <button type="submit" class="btn btn-default btn-find">Find
                                                        now</button>
                                                    <a class="btn btn-default btn-find"
                                                        href="{{ $slide->slider_link }}">{{ $slide->slider_link_text }}</a>
                                                </form>
                                            @else
                                                <form action="{{ route('job.list') }}" method="get">

                                                    <input type="text" name="search" id="jbsearch"
                                                        value="{{ Request::get('search', '') }}"
                                                        class="form-control m-2 mb-0 mt-0"
                                                        placeholder="{{ __('Enter Skills or job title') }}"
                                                        autocomplete="off">
                                                    <!-- <input type="text" class="form-input input-keysearch mr-10" placeholder="City, Postcode... " /> -->
                                                    {!! Form::select(
                                                        'functional_area_id[]',
                                                        ['' => __('Select Functional Area')] + $functionalAreas,
                                                        Request::get('functional_area_id', null),
                                                        ['class' => 'form-input mr-10 select-active', 'id' => 'functional_area_id'],
                                                    ) !!}

                                                    <button type="submit" class="btn btn-default btn-find">Find
                                                        now</button>
                                                    <a class="btn btn-default btn-find"
                                                        href="{{ $slide->slider_link }}">{{ $slide->slider_link_text }}</a>


                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                {{--  
                                <div class="caption lfb large-title tp-resizeme slidertext5" data-x="left"
                                    data-y="300" data-speed="600" data-start="3500"><a
                                        href="{{ $slide->slider_link }}">{{ $slide->slider_link_text }}</a></div>  --}}
                            </li>
                            <!--Slide end-->
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    @else
        <section class="section-box">
            <div class="banner-hero hero-1">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="block-banner">
                                <span
                                    class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">Best
                                    jobs place</span>
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">Drop Resume & Get Your
                                    Desire Job!</h1>
                                <div class="banner-description mt-30 wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".1s">Find Jobs, Employment & Career Opportunities</div>
                                <div class="form-find mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                    @include('includes.search_form')
                                </div>
                                <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".3s">
                                    <strong>Trending Keywords:</strong>
                                    <a href="#">Automotive</a>, <a href="#">Education</a>, <a
                                        href="#">Health</a>, <a href="#">and</a>, <a href="#">Care
                                        Engineering</a>,
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-imgs">
                                <img alt="jobhub" src="{{ asset('new_template/imgs/banner/banner.png') }}"
                                    class="img-responsive shape-1" />
                                <span class="union-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/union.svg') }}"
                                        class="img-responsive shape-3" /></span>
                                <span class="congratulation-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/congratulation.svg') }}"
                                        class="img-responsive shape-2" /></span>
                                <span class="docs-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/docs.svg') }}"
                                        class="img-responsive shape-2" /></span>
                                <span class="course-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/course.svg') }}"
                                        class="img-responsive shape-3" /></span>
                                <span class="web-dev-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/web-dev.svg') }}"
                                        class="img-responsive shape-3" /></span>
                                <span class="tick-icon"><img alt="jobhub"
                                        src="{{ asset('new_template/imgs/banner/tick.svg') }}"
                                        class="img-responsive shape-3" /></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @endif

    {{--   compines  --}}
    <div class="section-box wow animate__animated animate__fadeIn mt-70">
        <div class="container">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-6">
                    <div class="swiper-wrapper pb-70 pt-5">
                        @if (isset($topCompanyIds) && count($topCompanyIds))
                            @foreach ($topCompanyIds as $company_id_num_jobs)
                                <?php
                                      $company = App\Company::where('id', '=', $company_id_num_jobs->company_id)->active()->first();
                                        if (null !== $company) {
                                        ?>
                                <div class="swiper-slide hover-up" data-number="{{ $company->id }}">
                                    <div class="item-logo"><a class="comp-img"
                                            href="{{ route('company.detail', $company->slug) }}">
                                            {{ $company->printCompanyImage() }}
                                            <h4>{{ $company->name }}</h4>
                                            <div class="emloc"><i class="fas fa-map-marker-alt"></i>
                                                {{ $company->getCity('city') }}</div>
                                            <div class="cm-info-bottom "><i class="fas fa-briefcase"></i>
                                                {{ $company->countNumJobs('company_id', $company->id) }}
                                                {{ __('Open Jobs') }}</div>
                                    </div>
                                    </a>
                                </div>

                                <?php
                                    }
                                    ?>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    {{--  Browse Jobs By Categories  --}}
    <section class="section-box">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h3 class="section-title  wow animate__animated animate__fadeInUp">
                        {{ __('Browse Jobs By Categories') }}</h3>
                </div>
                <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <a href="{{ url('/all-categories') }}"
                        class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">{{ __('View All Categories') }}</a>
                </div>
            </div>
            <div class="row mt-40">
                @if (isset($topFunctionalAreaIds) && count($topFunctionalAreaIds))
                    @foreach ($topFunctionalAreaIds as $functional_area_id_num_jobs)
                        <?php
                        $functionalArea = App\FunctionalArea::where('functional_area_id', '=', $functional_area_id_num_jobs->functional_area_id)
                            ->lang()
                            ->active()
                            ->first();
                        ?>
                        @if (null !== $functionalArea)
                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card-grid image-cat hover-up wow animate__animated animate__fadeInUp">
                                    <div class="text-center">
                                        <a href="{{ route('job.list', ['functional_area_id[]' => $functionalArea->functional_area_id]) }}"
                                            title="{{ $functionalArea->functional_area }}">
                                            <figure>
                                                @if ($functionalArea->image && file_exists(public_path('uploads/functional_area/' . $functionalArea->image)))
                                                    <img src="{{ asset('uploads/functional_area/' . $functionalArea->image) }}"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('images/no-image.png') }}">
                                                @endif
                                            </figure>
                                        </a>
                                    </div>
                                    <h5 class="text-center mt-2 card-heading"><a
                                            href="{{ route('job.list', ['functional_area_id[]' => $functionalArea->functional_area_id]) }}"
                                            title="{{ $functionalArea->functional_area }}">{!! \Illuminate\Support\Str::limit($functionalArea->functional_area, $limit = 20, $end = '...') !!}</a>
                                    </h5>
                                    <p class="text-center text-stroke-40 mt-2">
                                        ({{ $functional_area_id_num_jobs->num_jobs }})
                                        {{ __('Jobs') }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="text-center mt-15">
                            <h3>{{ $jobsCount }}+</h3>
                        </div>
                        <p class="text-center mt-30 text-stroke-40">Jobs are waiting for you</p>
                        <div class="text-center mt-30">
                            <div class="box-button-shadow"><a href="{{ url('/all-categories') }}"
                                    class="btn btn-default">Explore
                                    more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  feature job  --}}
    <section class="section-box mt-40">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h3 class="section-title  wow animate__animated animate__fadeInUp">{{ __('Featured') }}
                        <span>{{ __('Jobs') }}
                    </h3>
                </div>
                <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <a href="{{ route('job.list', ['is_featured' => 1]) }}"
                        class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">{{ __('View All Featured Jobs') }}</a>
                </div>
            </div>
            <div class="mt-40">
                <div class="list-recent-jobs list-job-2-col">
                    <div class="row">
                        @if (isset($featuredJobs) && count($featuredJobs))
                            @foreach ($featuredJobs as $featuredJob)
                                <?php $company = $featuredJob->getCompany(); ?>
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
                                                            href="{{ route('job.detail', [$featuredJob->slug]) }}"
                                                            title="{{ $featuredJob->title }}">{{ $featuredJob->title }}</a>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="{{ route('company.detail', $company->slug) }}"
                                                                title="{{ $company->name }}"><span
                                                                    class="card-job-top--company">{{ $company->name }}</span>
                                                            </a> &nbsp;
                                                            <span class="card-job-top--location text-sm"><i
                                                                    class="fi-rr-marker"></i>
                                                                {{ $featuredJob->getCity('city') }}</span>

                                                            <span class="card-job-top--post-time text-sm"><i
                                                                    class="fi-rr-clock"></i>
                                                                {{ $featuredJob->created_at->format('M d, Y') }} </span>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            {{--  @if ($featuredJob->isJobExpired())
                                                    <span class="jbexpire"><i class="fas fa-paper-plane"
                                                            aria-hidden="true"></i> {{ __('Job is expired') }}</span>
                                                @elseif(Auth::check() && Auth::user()->isAppliedOnJob($featuredJob->id))
                                                    <a href="javascript:;" class="mt-sm-15 mt-lg-30 btn btn-border mt-3  icon-chevron-right applied">                                                            {{ __('Already Applied') }}</a>
                                                @else
                                                    <a href="{{ route('apply.job', $featuredJob->slug) }}"
                                                        class="mt-sm-15 mt-lg-30 btn btn-border mt-3  icon-chevron-right "> {{ __('Apply Now') }}</a>
                                                @endif  --}}
                                            <div class="card-job-description mt-20">


                                                {!! \Illuminate\Support\Str::limit($featuredJob->description, $limit = 140, $end = '...') !!}
                                            </div>
                                            <div class="card-job-bottom mt-25">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12">
                                                        <a 
                                                            class="btn btn-small background-blue-light mr-5 mt-2">{{ $featuredJob->getCareerLevel('career_level') }}</a>
                                                        <a 
                                                            class="btn btn-small background-6 disc-btn mt-2">
                                                            {{ $featuredJob->getJobType('job_type') }} </a>
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
        </div>
    </section>

    {{--  how work  --}}
    <section class="section-box mt-90 mb-80">
        <div class="container">
            <div class="block-job-bg block-job-bg-homepage-2">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-none d-md-block">
                        <div class="box-image-findjob findjob-homepage-2 ml-0 wow animate__animated animate__fadeIn">
                            <figure><img alt="jobhub"
                                    src="{{ asset('new_template/imgs/page/about/img-findjob.png') }}" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="box-info-job pl-3 pt-0 pr-3">
                            <span class="text-blue wow animate__animated animate__fadeInUp">How It Work</span>
                            <p> Post a job to tell us about your project. We'll quickly match you with the
                                right freelancers. </p>
                            <h5 class="heading-36 mb-2 mt-2 wow animate__animated animate__fadeInUp">Register an account
                            </h5>
                            <p class="text-md wow animate__animated animate__fadeInUp">
                                Due to its widespread use as filler text for layouts, non-readability
                                is of great importance.
                            </p>
                            <h5 class="heading-36 mb-2 mt-2 wow animate__animated animate__fadeInUp">Find your job</h5>
                            <p class="text-md wow animate__animated animate__fadeInUp">
                                There are many variations of passages of avaibookmark-label, but the majority
                                alteration in some form.
                            </p>
                            <h5 class="heading-36 mb-2 mt-2 wow animate__animated animate__fadeInUp">Apply for job</h5>
                            <p class="text-md wow animate__animated animate__fadeInUp">
                                It is a long established fact that a reader will be distracted by the
                                readable content of a page.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  start login  --}}
    <section class="section-box bg-blue-full mt-25 mb-50 text-center home-section-details">
        <div class="container">

            <div class="row">
                @if (!Auth::user() && !Auth::guard('company')->user())
                    <div class="col-lg-6">
                    @else
                        <div class="col-lg-12">
                @endif


                <div class="userloginbox">
                    <div class="usrintxt">
                        <div class="titleTop">
                            <h3>{{ __('Are You Looking For Job!') }} </h3>
                            <h4>{{ __('Search your desire Job') }}</h4>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel felis
                            ut, vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod suscipit. Sed at
                            libero ante. Vestibulum nec odio lacus.</p>

                        @if (!Auth::user() && !Auth::guard('company')->user())
                            <div class="box-button-shadow  mt-4">
                                <a href="{{ route('register') }}"
                                    class="btn btn-default">{{ __('Get Started Today') }}</a>
                            </div>
                        @else
                            <div class="box-button-shadow  mt-4">
                                <a href="{{ url('my-profile') }}" class="btn btn-default">{{ __('Build Your CV') }}</a>
                            </div>
                        @endif
                    </div>
                </div>



            </div>
            @if (!Auth::user() && !Auth::guard('company')->user())
                <div class="col-lg-6 pl-100 pl-md-15 mt-md-50">


                    <div class="emploginbox">
                        <div class="usrintxt">
                            <div class="titleTop">
                                <h3>{{ __('Are You Looking For Candidates!') }}</h3>
                                <h4>{{ __('Post a Job Today') }}</h4>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel
                                felis ut, vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod
                                suscipit. Sed at libero ante. Vestibulum nec odio lacus.</p>

                            <div class="box-button-shadow  mt-4">
                                <a href="{{ route('register') }}" class="btn btn-default">{{ __('Post a Job') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        </div>
    </section>

    {{--  Latest Jobs  --}}
    <section class="section-box mt-40">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h3 class="section-title  wow animate__animated animate__fadeInUp">{{ __('Latest') }}
                        <span>{{ __('Jobs') }}
                    </h3>
                </div>
                <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <a href="{{ route('job.list') }}"
                        class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">{{ __('View All Latest Jobs') }}</a>
                </div>
            </div>
            <div class="mt-40">
                <div class="list-recent-jobs list-job-2-col">
                    <div class="row">
                        @if (isset($latestJobs) && count($latestJobs))
                            @foreach ($latestJobs as $latestJob)
                                <?php $company = $latestJob->getCompany(); ?>
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
                                                            href="{{ route('job.detail', [$latestJob->slug]) }}"
                                                            title="{{ $latestJob->title }}">{{ $latestJob->title }}</a>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="{{ route('company.detail', $company->slug) }}"
                                                                title="{{ $company->name }}"><span
                                                                    class="card-job-top--company">{{ $company->name }}</span>
                                                            </a> &nbsp;
                                                            <span class="card-job-top--location text-sm"><i
                                                                    class="fi-rr-marker"></i>
                                                                {{ $latestJob->getCity('city') }}</span>

                                                            <span class="card-job-top--post-time text-sm"><i
                                                                    class="fi-rr-clock"></i>
                                                                {{ $latestJob->created_at->format('M d, Y') }} </span>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            {{--  @if ($latestJob->isJobExpired())
                                                    <span class="jbexpire"><i class="fas fa-paper-plane"
                                                            aria-hidden="true"></i> {{ __('Job is expired') }}</span>
                                                @elseif(Auth::check() && Auth::user()->isAppliedOnJob($latestJob->id))
                                                    <a href="javascript:;" class="mt-sm-15 mt-lg-30 btn btn-border mt-3  icon-chevron-right applied">                                                            {{ __('Already Applied') }}</a>
                                                @else
                                                    <a href="{{ route('apply.job', $latestJob->slug) }}"
                                                        class="mt-sm-15 mt-lg-30 btn btn-border mt-3  icon-chevron-right "> {{ __('Apply Now') }}</a>
                                                @endif  --}}
                                            <div class="card-job-description mt-20">


                                                {!! \Illuminate\Support\Str::limit($latestJob->description, $limit = 140, $end = '...') !!}
                                            </div>
                                            <div class="card-job-bottom mt-25">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12">
                                                        <a 
                                                            class="btn btn-small background-blue-light mr-5 mt-2">{{ $latestJob->getCareerLevel('career_level') }}</a>
                                                        <a 
                                                            class="btn btn-small background-6 disc-btn mt-2">
                                                            {{ $latestJob->getJobType('job_type') }} </a>
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
        </div>
    </section>

    {{--  testimonials  --}}
    <section class="section-box mt-50 mt-md-0 text-monail">
        <div class="container">
            <h3 class="section-title text-start mb-3 wow animate__animated animate__fadeInUp">{{ __('Testimonials') }}
            </h3>
            <div class="text-normal text-start color-black-5  wow animate__animated animate__fadeInUp mt-5">
                {{ __('Success Stories') }}
            </div>
            <div class="row mt-25">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-3">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @if (isset($testimonials) && count($testimonials))
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up">
                                            <div class="text-center card-grid-3-image card-grid-3-image-circle">

                                            </div>
                                            <div class="card-block-info mt-10">
                                                <p class="text-lg text-center">
                                                    {{ $testimonial->testimonial }}
                                                </p>
                                                <div class="text-center mt-20 mb-25">
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rate"
                                                            value="5" />
                                                        <label for="star5" title="text" class="checked">5
                                                            stars</label>
                                                        <input type="radio" id="star4" name="rate"
                                                            value="4" />
                                                        <label for="star4" title="text" class="checked">4
                                                            stars</label>
                                                        <input type="radio" id="star3" name="rate"
                                                            value="3" />
                                                        <label for="star3" title="text" class="checked">3
                                                            stars</label>
                                                        <input type="radio" id="star2" name="rate"
                                                            value="2" />
                                                        <label for="star2" title="text" class="checked">2
                                                            stars</label>
                                                        <input type="radio" id="star1" name="rate"
                                                            value="1" />
                                                        <label for="star1" title="text" class="checked">1
                                                            star</label>
                                                    </div>
                                                </div>
                                                <div class="card-profile text-center">
                                                    <strong>{{ $testimonial->testimonial_by }}</strong>
                                                    <span>{{ $testimonial->company }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    {{--  job by cites  --}}
    <section class="section-box mt-90 mt-md-50">
        <div class="container">
            <h3 class="section-title text-start mb-15 wow animate__animated animate__fadeInUp">{{ __('Jobs by Cities') }}
            </h3>

            <div class="row mt-40">
                @if (isset($topCityIds) && count($topCityIds))
                    @foreach ($topCityIds as $city_id_num_jobs)
                        <?php
                        $city = App\City::getCityById($city_id_num_jobs->city_id);
                        ?> @if (null !== $city && $city->upload_image)
                            <div class="col-lg-3 col-md-6">
                                <div class="card-grid-2  wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-2-image">
                                        <a href="#">
                                            <figure>
                                                @if (isset($city) && null !== $city->upload_image)
                                                    {{ ImgUploader::print_image("city_images/$city->upload_image") }}
                                                @endif
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="card-block-info pt-10 text-center">
                                        <h5 class="font-bold text-lg mb-5"> <a
                                                href="{{ route('job.list', ['city_id[]' => $city->city_id]) }}"
                                                title="{{ $city->city }}">{{ $city->city }}</a></h5>
                                        <p class="text-small text-muted"> ({{ $city_id_num_jobs->num_jobs }})
                                            {{ __('Open Jobs') }}</p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    {{--  blogs  --}}
    <section class="section-box mt-50">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 col-md-7">
                    <h3 class="section-title mb-20 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                        {{ __('Latest') }} <span>{{ __('Blogs') }}</span></h3>
                    <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp hover-up"
                        data-wow-delay=".1s">{{ __('Here You Can See') }}</p>
                </div>
                <div class="col-lg-5 col-md-5 text-lg-end text-start">
                    <a href="{{ route('blogs') }}"
                        class="btn btn-border icon-chevron-right wow animate__animated animate__fadeInUp hover-up mt-15"
                        data-wow-delay=".1s">{{ __('View All Blog Posts') }}</a>
                </div>
            </div>
            <div class="row mt-25">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-3">
                        <div class="swiper-wrapper pb-70 pt-5">

                            @if (null !== $blogs)
                                <?php
                                $count = 1;
                                ?>
                                @foreach ($blogs as $blog)
                                    <?php
                                    $cate_ids = explode(',', $blog->cate_id);
                                    $data = DB::table('blog_categories')->whereIn('id', $cate_ids)->get();
                                    $cate_array = [];
                                    foreach ($data as $cat) {
                                        $cate_array[] = "<a href='" . url('/blog/category/') . '/' . $cat->slug . "'>$cat->heading</a>";
                                    }
                                    ?>

                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up">
                                            <div class="text-center card-grid-3-image">
                                                <a href="blog-single.html">
                                                    <figure>

                                                        @if (null !== $blog->image && $blog->image != '')
                                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                                                alt="{{ $blog->heading }}">
                                                        @else
                                                            <img src="{{ asset('images/blog/1.jpg') }}"
                                                                alt="{{ $blog->heading }}">
                                                        @endif

                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12 text-start">
                                                        <span>
                                                            {{ __('Category') }} : {!! implode(', ', $cate_array) !!}
                                                        </span>
                                                    </div>

                                                </div>
                                                <h5 class="mt-15 heading-md"><a
                                                        href="{{ route('blog-detail', $blog->slug) }}">
                                                        {{ $blog->heading }}
                                                    </a></h5>
                                                <p class="mt-3 mb-0">{!! \Illuminate\Support\Str::limit($blog->content, $limit = 150, $end = '...') !!}</p>

                                                <div class="card-2-bottom mt-4">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12">
                                                            <a href="blog-single.html"
                                                                class="btn btn-border btn-brand-hover">Keep reading</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $count++; ?>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination swiper-pagination3"></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>




@endsection
@push('scripts')
    <script>
        $(document).ready(function($) {
            $("form").submit(function() {
                $(this).find(":input").filter(function() {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true;
            });
            $("form").find(":input").prop("disabled", false);
        });
    </script>
    @include('includes.country_state_city_js')
@endpush
