@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 cms pt-3">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">
                            {{ __('Job Details') }} </h3>
                        <div class="form-find mw-720 mt-25">
                            <form action="{{ route('job.list') }}" method="get" class="form-newsletter wow animate__animated animate__fadeInUp">
                                <input type="text" class="form-input input-keysearch mr-10 ml-10" name="search" id="jbsearch" value="{{ Request::get('search', '') }}" placeholder="{{ __('Enter Skills or job title') }}" autocomplete="off" />
                                <button type="submit" class="btn btn-default btn-find wow animate__animated animate__fadeInUp">{{ __('Search') }}</button>
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

@include('flash::message')

@php
$company = $job->getCompany();
@endphp
<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 company-map">
                <div class="job-single-header mb-50">
                    <h3 class="mb-15">{{$job->title}}</h3>
                    <div class="job-meta">
                        <span class="company"> {{$company->name}}</span>
                        @if((bool)$job->is_freelance)
                        <span>Freelance</span>
                        @else
                        <span class="location text-sm"><i class="fi-rr-marker"></i>{{$job->getLocation()}}</span>
                        @endif
                        <span class="type-job text-sm"><i class="fi-rr-briefcase"></i> {{$job->getJobShift('job_shift')}}</span>
                        <span class="post-time text-sm"><i class="fi-rr-clock"></i> {{__('Date Posted')}}: {{$job->created_at->format('M d, Y')}}</span>
                    </div>
                    <div class="job-tags mt-30">
                        <a href="{{route('email.to.friend', $job->slug)}}" class="btn btn-small background-urgent btn-pink mr-5 mt-2"><i class="fas fa-envelope" aria-hidden="true"></i> {{__('Email to Friend')}}</a>
                        @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)) <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn btn-small background-blue-light mr-5 mt-2"><i class="fas fa-floppy" aria-hidden="true"></i> {{__('Remove From Favourite Job')}} <i class="fas fa-times"></i></a> @else <a href="{{route('add.to.favourite', $job->slug)}}" class="btn btn-small background-blue-light mr-5 mt-2"><i class="fa-regular fa-heart"></i> {{__('Add to Favourite')}}</a> @endif
                        <a href="{{route('report.abuse', $job->slug)}}" class="btn btn-small background-blue-light mr-5 mt-2"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> {{__('Report Abuse')}}</a>
                    </div>
                </div>
                <div class="job-overview">
                    <div class="row">
                        <div class="col-md-4 d-flex">
                            <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10"> {{__('Type')}}</span>
                                <strong class="small-heading">{{$job->getJobType('job_type')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fa-solid fa-hourglass-start"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Shift')}}</span>
                                <strong class="small-heading">{{$job->getJobShift('job_shift')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            @if(Auth::user() && Auth::guard('company')->user())
                            <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                            @endif

                            <div class="sidebar-text-info ml-10">
                                @if(!Auth::user() && !Auth::guard('company')->user())
                                <a href="{{route('candidate_login')}}"><i class="fas fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
                                @else
                                @if(!(bool)$job->hide_salary)
                                <span class="text-description mb-10">{{__('Salary')}}</span>
                                {{$job->getSalaryPeriod('salary_period')}}: <strong class="small-heading">{{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}</strong>
                                @endif
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Date Posted')}}</span>
                                <strong class="small-heading">{{$job->created_at->format('M d, Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Apply Before')}}</span>
                                <strong class="small-heading">{{ \Carbon\Carbon::parse($job->expiry_date)->format('M d, Y') }}</strong>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Career Level')}}</span>
                                <strong class="small-heading">{{$job->getCareerLevel('career_level')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fa-solid fa-landmark"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Positions')}}</span>
                                <strong class="small-heading">{{$job->num_of_positions}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Experience')}}</span>
                                <strong class="small-heading">{{$job->getJobExperience('job_experience')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fa-solid fa-flask"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Degree')}}</span>
                                <strong class="small-heading">{{$job->getDegreeLevel('degree_level')}}</strong>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex mt-sm-15">
                            <div class="sidebar-icon-item"><i class="fa-solid fa-venus-mars"></i></div>
                            <div class="sidebar-text-info ml-10">
                                <span class="text-description mb-10">{{__('Gender')}}</span>
                                <strong class="small-heading">{{$job->getGender('gender')}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="mt-30 mb-30">{{__('Google Map')}}</h4>
                {!! $company->map !!}
           
                <div class="content-single">
                    <h5>{{$job->title}}</h5>
                    <hr>
                    <h5>{{__('Job Description')}}</h5>
                    <p>{!! $job->description !!}</p>
                    <hr>
                    <h5>{{__('Benefits')}}</h5>
                    <p>{!! $job->benefits !!}</p>
                </div>


                <div class="single-recent-jobs">
                    <hr>
                    <h4 ><span>{{__('Related Jobs')}}</span></h4>
                    
                    @if(isset($relatedJobs) && count($relatedJobs))
                    @foreach($relatedJobs as $relatedJob)
                    <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                    @if(null !== $relatedJobCompany)
                    <div class="list-recent-jobs">
                        <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                            <div class="card-job-top">
                                <div class="card-job-top--image">
                                    <figure>
                                        <a href="{{route('company.detail',$relatedJobCompany->slug)}}">{{$relatedJobCompany->printCompanyImage()}}</a> </figure>
                                </div>
                                <div class="card-job-top--info">
                                    <h6 class="card-job-top--info-heading"><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h6>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <span class="card-job-top--company"><a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a></span>
                                            <span class="card-job-top--location text-sm"><i class="fi-rr-marker"></i>
                                                {{$relatedJob->getCity('city')}}</span>
                                            <span class="card-job-top--type-job text-sm"><i class="fi-rr-briefcase"></i>
                                                {{$relatedJob->getJobType('job_type')}}</span>
                                            <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i> 3
                                                {{$relatedJob->getJobShift('job_shift')}}</span>
                                        </div>

                                        <div class="col-lg-5 text-lg-end">
                                            @if(!Auth::user() && !Auth::guard('company')->user())
                                            <a href="{{route('candidate_login')}}"><i class="fas fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
                                            @else
                                            @if(!(bool)$relatedJob->hide_salary)
                                            <span class="card-job-top--price">
                                                {{$relatedJob->getSalaryPeriod('salary_period')}}: <strong>{{$relatedJob->salary_from.' '.$relatedJob->salary_currency}} - {{$relatedJob->salary_to.' '.$relatedJob->salary_currency}}</strong>
                                            </span>
                                            @endif
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-job-description mt-20">
                                <p>{{\Illuminate\Support\Str::limit(strip_tags($relatedJob->description), 250, '...')}} <a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">Read More</a></p>

                            </div>
                            <div class="card-job-bottom mt-25">
                                <div class="row">
                                    <div class="col-lg-9 col-sm-8 col-12">
                                        <a class="btn btn-small background-urgent btn-pink mr-5 mt-2">{{$job->getJobType('job_type')}}</a>
                                        <a class="btn btn-small background-blue-light mr-5 mt-2">{{$job->getJobShift('job_shift')}}</a>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <!--Job end-->
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                <div class="sidebar-shadow">
                    <div class="sidebar-heading">
                        <div class="avatar-sidebar">
                            <figure>
                                <a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a> </figure>
                            </figure>
                            <div class="sidebar-info">
                                <span class="sidebar-company"> {{$company->name}}</span>
                                <span class="sidebar-website-text"><a href="{{$company->website}}">{{$company->website}}</a></span>

                            </div>
                        </div>
                    </div>
                    <div class="text-description mt-15">
                        <p>{{\Illuminate\Support\Str::limit(strip_tags($company->description), 100, '...')}} <a href="{{route('company.detail',$company->slug)}}">Read More</a></p>
                    </div>
                    <div class="text-start mt-20">
                        @if($job->isJobExpired())
                        <span class="jbexpire"><i class="fas fa-paper-plane" aria-hidden="true"></i> {{__('Job is expired')}}</span>
                        @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                        <a href="javascript:;" class="btn apply applied"><i class="fas fa-paper-plane" aria-hidden="true"></i> {{__('Already Applied')}}</a>
                        @else
                        <a href="{{route('apply.job', $job->slug)}}" class="btn btn-default font-heading icon-send-letter apply"><i class="fas fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a>

                        @endif
                    </div>

                    <div class="sidebar-team-member pt-40">
                        <h6 class="small-heading">Contact Info</h6>
                        <div class="info-address">
                            @if(!empty($company->location))

                            <span><i class="fi-rr-marker"></i> <span>
                                    {{ $company->location }}</span></span>
                            @endif
                            @if(!empty($company->phone))

                            <span><i class="fi-rr-headset"></i> <span><a href="tel:{{$company->phone}}">{{$company->phone}}</a> </span></span>
                            @endif
                            @if(!empty($company->email))

                            <span><i class="fi-rr-paper-plane"></i> <a href="mailto:{{$company->email}}">{{$company->email}}</a></span>
                            @endif
                            @if(!empty($company->established_in))

                            <span><i class="fi-rr-time-fast"></i> <span>{{ $company->established_in }} </span></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sidebar-shadow">
                    <h6 class="small-heading">{{__('Skills Required')}}</h6>

                    <div class="block-tags mt-2">
                        {!!$job->getJobSkillsList()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('styles')
<style type="text/css">
    .view_more {
        display: none !important;
    }

</style>
@endpush
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

        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });



    });

</script>
@endpush
