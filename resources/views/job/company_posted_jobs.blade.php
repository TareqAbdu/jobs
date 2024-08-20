@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Company Posted Jobs') }}</h3>

                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{__('Company Posted Jobs')}}</li>
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
            @include('includes.company_dashboard_menu')
        </div>
        <div class="user-content pt-4">
            <section class="section-box mt-0">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="col-12 float-right">
                            <div class="content-page">
                              
                                <div class="job-list-list mb-15">
                                    <div class="list-recent-jobs">
                                        
                                        <!-- Item job -->
                                        @if(isset($jobs) && count($jobs)) <?php $count_1 = 1; ?>
                                        @foreach($jobs as $job)
                                        @php $company = $job->getCompany();
                                        $appliedUsersCount = $job->appliedUsers->count();
                                        @endphp
        
                                        <?php if(isset($company))
                                            {
                                            ?>
        
                                        <?php if($count_1 == 7) {?>
        
                                        <li class="col-lg-12">
                                            <div class="jobint text-center">{!! $siteSetting->listing_page_horizontal_ad !!}</div>
                                        </li>
        
                                        <?php }else{ ?>
        
                                        <div class="card-job hover-up wow animate__animated animate__fadeIn">
                                            <div class="card-job-top">
                                                <div class="card-job-top--image">
                                                    <figure>{{$company->printCompanyImage()}}</figure>
                                                </div>
                                                {{-- <li class="@if($job->is_featured == 1) featured @endif">  --}}
        
                                                <div class="card-job-top--info">
                                                    <h6 class="card-job-top--info-heading"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a> @if($job->is_featured == 1) <i class="fas fa-bolt" title="{{__('This Job is Featured')}}"></i> @endif</h6>
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}"><span class="card-job-top--company">{{$company->name}}</span></a>
                                                            <span class="card-job-top--location text-sm"><i class="fi-rr-marker"></i>
                                                                {{ $company->location }}</span>
                                                            <span class="card-job-top--type-job text-sm"><i class="fi-rr-briefcase"></i> {{$job->getJobType('job_type')}}</span>
                                                            <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i> {{$job->created_at->format('M d, Y')}}</span>
                                                        </div>
                                                        <div class="col-lg-5 text-lg-end">
                                                            @if(!Auth::user() && !Auth::guard('company')->user())
                                                            <a href="{{route('login')}}"><i class="fas fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
                                                            @else
                                                            @if(!(bool)$job->hide_salary)
                                                            <span class="card-job-top--price">
                                                                {{$job->getSalaryPeriod('salary_period')}}: <strong>{{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}</strong>
                                                            </span>
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-job-description mt-20">
                                                <p>{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</p>
        
                                            </div>
                                            <div class="card-job-bottom mt-25">
                                                <div class="row">
                                                    <div class="col-lg-9 col-sm-8 col-12">
                                                        <a href="job-grid.html" class="btn btn-small background-urgent btn-pink mr-5">{{$job->getCareerLevel('career_level')}}</a>
                                                        <a href="job-grid-2.html" class="btn btn-small background-blue-light mr-5">{{$job->getDegreeLevel('degree_level')}}</a>
                                                        <a href="job-grid.html" class="btn btn-small background-6 disc-btn">{{$job->getJobType('job_type')}}</a>
                                                    </div>
                                                   
                                        
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-primary me-2" href="{{route('list.applied.users', [$job->id])}}">{{__('List Candidates')}}
                                                                    @if($appliedUsersCount > 0)
                                                                    <span class="badge bg-white text-dark">{{$appliedUsersCount}}</span>
                                                                    @else
                                                                    <span class="badge bg-white text-dark">0</span>
                                                                    @endif
                            
                                                                </a>
                            
                                                                <a class="btn btn-warning me-2" href="{{route('edit.front.job', [$job->id])}}"><i class="fas fa-edit"></i></a>
                                                                <a class="btn btn-danger me-2" href="javascript:;" onclick="deleteJob({{$job->id}});"><i class="fas fa-trash"></i></a>
                            
                                                            </div>
                            
                            
        
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
        
                                        <?php } ?>
        
                                        <?php $count_1++; ?>
        
        
        
                                        <?php } ?>
                                        @endforeach
                                        @endif
        
                                    </div>
                                </div>
        
                                @if ($jobs->hasPages())
                                <div class="paginations wow animate__animated animate__fadeIn">
                                    <ul class="pager">
        
                                        {{-- Previous Page Link --}}
                                        @if ($jobs->onFirstPage())
                                        <li><a href="javascript:void(0);" class="pager-prev disabled"></a></li>
                                        @else
                                        <li><a href="{{ $jobs->previousPageUrl() }}" class="pager-prev"></a></li>
                                        @endif
        
                                        {{-- Pagination Elements --}}
                                        @foreach ($jobs->links()->elements as $element)
                                        {{-- "Three Dots" Separator --}}
                                        @if (is_string($element))
                                        <li><a href="javascript:void(0);" class="pager-number">{{ $element }}</a></li>
                                        @endif
        
                                        {{-- Array Of Links --}}
                                        @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                        @if ($page == $jobs->currentPage())
                                        <li><a href="javascript:void(0);" class="pager-number active">{{ $page }}</a></li>
                                        @else
                                        <li><a href="{{ $url }}" class="pager-number">{{ $page }}</a></li>
                                        @endif
                                        @endforeach
                                        @endif
                                        @endforeach
        
                                        {{-- Next Page Link --}}
                                        @if ($jobs->hasMorePages())
                                        <li><a href="{{ $jobs->nextPageUrl() }}" class="pager-next"></a></li>
                                        @else
                                        <li><a href="javascript:void(0);" class="pager-next disabled"></a></li>
                                        @endif
        
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
          


                {{--
                    <h3>{{__('Company Posted Jobs')}}</h3>
                <ul class="searchList">
                    <!-- job start -->
                    @if(isset($jobs) && count($jobs))
                    @foreach($jobs as $job)
                    @php
                    $company = $job->getCompany();
                    $appliedUsersCount = $job->appliedUsers->count();
                    @endphp
                    @if(null !== $company)
                    <li id="job_li_{{$job->id}}">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                <div class="jobinfo">
                                    <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                    <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                    <div class="location">
                                        <label class="fulltime" title="{{$job->getJobShift('job_shift')}}">{{$job->getJobShift('job_shift')}}</label>
                                        - <span>{{$job->getCity('city')}}</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>


                            <div class="col-md-5">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary me-2" href="{{route('list.applied.users', [$job->id])}}">{{__('List Candidates')}}
                                        @if($appliedUsersCount > 0)
                                        <span class="badge bg-white text-dark">{{$appliedUsersCount}}</span>
                                        @else
                                        <span class="badge bg-white text-dark">0</span>
                                        @endif

                                    </a>

                                    <a class="btn btn-warning me-2" href="{{route('edit.front.job', [$job->id])}}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger me-2" href="javascript:;" onclick="deleteJob({{$job->id}});"><i class="fas fa-trash"></i></a>

                                </div>



                            </div>
                        </div>
                    </li>
                    <!-- job end -->
                    @endif
                    @endforeach
                    @endif
                </ul>


                <!-- Pagination Start -->

                <div class="pagiWrap">

                    <div class="row">

                        <div class="col-md-5">

                            <div class="showreslt">

                                {{__('Showing Jobs')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}

                            </div>

                        </div>

                        <div class="col-md-7 text-right">

                            @if(isset($jobs) && count($jobs))

                            {{ $jobs->appends(request()->query())->links() }}

                            @endif

                        </div>

                    </div>

                </div>

                <!-- Pagination end --> --}}

        </div>
    </div>
</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    function deleteJob(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.front.job') }}", {
                    id: id
                    , _method: 'DELETE'
                    , _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    if (response == 'ok') {
                        $('#job_li_' + id).remove();
                    } else {
                        alert('Request Failed!');
                    }
                });
        }
    }

</script>
@endpush
