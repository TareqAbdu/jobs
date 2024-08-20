@extends('layouts.app')

@section('content')

@push('styles')
<style>
    body {
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
                            {{ __('Jobs') }} </h3>
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



<form action="{{route('job.list')}}" method="get">

    <section class="section-box mt-25">
        <div class="container">
            <div class="row flex-row-reverse job-filter-page">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job mt-15 mb-10">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span class="text-small"> {{__('Showing Jobs')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="job-list-list mb-15">
                            <div class="list-recent-jobs">
                                <!-- Item job -->
                                @if(isset($jobs) && count($jobs)) <?php $count_1 = 1; ?>
                                @foreach($jobs as $job)
                                @php $company = $job->getCompany();
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
                                                <div class="col-12">
                                                    <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}"><span class="card-job-top--company">{{$company->name}}</span></a>
                                                    <span class="card-job-top--location text-sm"><i class="fi-rr-marker"></i>
                                                        {{ $company->location }}</span>
                                                    <span class="card-job-top--type-job text-sm"><i class="fi-rr-briefcase"></i> {{$job->getJobType('job_type')}}</span>
                                                    <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i> {{$job->created_at->format('M d, Y')}}</span>
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
                                                <a  class="btn btn-small background-urgent btn-pink mr-5 mt-2">{{$job->getCareerLevel('career_level')}}</a>
                                                <a  class="btn btn-small background-blue-light mr-5 mt-2">{{$job->getDegreeLevel('degree_level')}}</a>
                                                <a  class="btn btn-small background-6 disc-btn mt-2">{{$job->getJobType('job_type')}}</a>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none listbtn">
                                                @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)) 
                                                <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn favbtn" title="Remove From Favourite"><i class="fas fa-heart"></i> </a> 
                                                @else 
                                                <a href="{{route('add.to.favourite', $job->slug)}}" class="btn" title="Add to Favourite"><i class="far fa-heart"></i></a> 
                                                @endif 
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
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="accordion accordion-flush job-filter" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                  {{ __('Filter') }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show  " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  
                                    <div class="sidebar-with-bg p-4 bg-light rounded">

                                        <div class="box-email-reminder">
                                            @if(Auth::guard('company')->check())
                                            <div class="form-group mt-4">
                                                <a href="{{ route('post.job') }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-file-text me-2" aria-hidden="true"></i> {{ __('Post Job') }}
                                                </a>
                                            </div>
                                            @else
                                            <div class="form-group mt-4">
                
                                                <a href="{{ url('my-profile#cvs') }}" class="btn btn-default btn-find wow animate__animated animate__fadeInUp w-100 d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-file-text me-2" aria-hidden="true"></i> {{ __('Upload Your Resume') }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                
                
                                    @include('includes.job_list_side_bar')

                                </div>
                            </div>
                        </div>
                    </div>
                

                </div>
            </div>
        </div>
    </section>

</form>

@endsection

@push('styles')

<style type="text/css">
    .searchList li .jobimg {

        min-height: 80px;

    }

    .hide_vm_ul {

        height: 150px;

        overflow: hidden;

    }

    .hide_vm {

        display: none !important;

    }

    .view_more {

        cursor: pointer;

    }
 li .listbtn .fas.fa-heart{color: #da0303;}
 li .listbtn a.favbtn{border-color: #da0303;}
 li .listbtn a.favbtn:hover{background: #eee;}



</style>

@endpush

@push('scripts')

<script>
    $(document).ready(function() {
        if ($(window).width() <= 992) {
            $('#flush-collapseOne').removeClass('show');
            $('.accordion-button').addClass('collapsed');
        }
    });
    $('.btn-job-alert').on('click', function() {
        @if(Auth::user())
        $('#show_alert').modal('show');
        @else
        swal({
            title: "Save Job Alerts",

            text: "To save Job Alerts you must be Registered and Logged in",

            icon: "error",

            buttons: {
                Login: "Login"
                , register: "Register"
                , hello: "OK"
            , }
        , });
        @endif

    })

    $(document).ready(function($) {
        $("#search-job-list").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });



        $("#search-job-list").find(":input").prop("disabled", false);



        $(".view_more_ul").each(function() {

            if ($(this).height() > 100)

            {

                $(this).addClass('hide_vm_ul');

                $(this).next().removeClass('hide_vm');

            }

        });

        $('.view_more').on('click', function(e) {

            e.preventDefault();

            $(this).prev().removeClass('hide_vm_ul');

            $(this).addClass('hide_vm');

        });



    });

    if ($("#submit_alert").length > 0) {

        $("#submit_alert").validate({



            rules: {

                email: {

                    required: true,

                    maxlength: 5000,

                    email: true

                }

            },

            messages: {

                email: {

                    required: "Email is required",

                }



            },

            submitHandler: function(form) {

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

                $.ajax({

                    url: "{{route('subscribe.alert')}}",

                    type: "GET",

                    data: $('#submit_alert').serialize(),

                    success: function(response) {

                        $("#submit_alert").trigger("reset");

                        $('#show_alert').modal('hide');

                        swal({

                            title: "Success",

                            text: response["msg"],

                            icon: "success",

                            button: "OK",

                        });

                    }

                });

            }

        })

    }

    $(document).on('click', '.swal-button--Login', function() {
        window.location.href = "{{route('login')}}";
    })
    $(document).on('click', '.swal-button--register', function() {
        window.location.href = "{{route('register')}}";
    })
    $('#reset-filters').click(function() {
        event.preventDefault();

        // Uncheck all checkboxes
        $('input[type="checkbox"]').prop('checked', false);

        // Optionally, you can trigger a form submission or AJAX call here if needed
        // $('form').submit();
    });

</script>

@include('includes.country_state_city_js')

@endpush
