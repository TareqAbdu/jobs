@extends('layouts.app')

@section('content')


    <section class="section-box bg-banner-about banner-home-3 pages company  pt-3 mb-35">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp mt-35">
                                {{ __('Company Detail') }}</h3>

                            <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                                <div class="text-center">
                                    <ul class="breadcrumbs mt-sm-15">
                                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                                        <li> <a href="{{ url('/companies') }}">{{ __('Companies') }}</a></li>
                                        <li>{{ __('Company Detail') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-box">
        <div class="box-head-single box-head-single-candidate">
            <div class="container">
                @include('flash::message')

                <div class="heading-image-rd  ">
                    <a href{{ route('company.detail', $company->slug) }} <figure> {!! $company->printCompanyImage(200, 200, 'img-fluid rounded-3') !!}</figure>
                    </a>
                </div>
                <div class="heading-main-info">

                    <h4>{{ $company->name }}</h4>
                    <div class="head-info-profile mb-1">
                        <span class="text-small mr-20"><i class="fi-rr-marker text-mutted"></i>
                            {{ $company->location }}</span>
                        <span class="text-small mr-20"><i class="fi-rr-briefcase text-mutted"></i>
                            {{ $company->getIndustry('industry') }}</span>
                        <span class="text-small"><i class="fi-rr-clock text-mutted"></i> {{ __('Member Since') }},
                            {{ $company->created_at->format('M d, Y') }}</span>

                    </div>
                    <div class="row align-items-end">
                        <div class="col-lg-12">

                            @if (Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                                <a href="{{ route('remove.from.favourite.company', $company->slug) }}"
                                    class="btn btn-tags-sm mb-10 mr-5">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    {{ __('Favourite Company') }} </a>
                            @else
                                <a href="{{ route('add.to.favourite.company', $company->slug) }}"
                                    class="btn btn-tags-sm mb-10 mr-5">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Add to Favourite') }}</a>
                            @endif <a href="{{ route('report.abuse.company', $company->slug) }}"
                                class="btn btn-tags-sm mb-10 mr-5 report">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ __('Report Abuse') }}</a>
                            <a href="javascript:;" onclick="send_message()" class="btn btn-tags-sm mb-10 mr-5">
                                <i class="fa fa-envelope" aria-hidden="true"></i> {{ __('Send Message') }}</a>

                        </div>

                        <div class="col-md-6 col-sm-6 " style="">

                            <!-- Candidate Contact -->

                            @if (!Auth::user() && !Auth::guard('company')->user())
                                <h5 class="login-text">{{ __('Login to View contact details') }}</h5>

                                <a href="{{ route('candidate_login') }}" class="btn btn-default btn-small mt-2">{{ __('Login') }}</a>
                            @else
                                <div class="candidateinfo">

                                    @if (!empty($company->phone))
                                        <div class="loctext"><i class="fas fa-phone" aria-hidden="true"></i> <a
                                                href="tel:{{ $company->phone }}">{{ $company->phone }}</a></div>
                                    @endif

                                    @if (!empty($company->email))
                                        <div class="loctext"><i class="fas fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:{{ $company->email }}">{{ $company->email }}</a></div>
                                    @endif

                                    @if (!empty($company->website))
                                        <div class="loctext"><i class="fas fa-globe" aria-hidden="true"></i> <a
                                                href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                        </div>
                                    @endif

                                    <div class="cadsocial"> {!! $company->getSocialNetworkHtml() !!} </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single company-map">
                        <h4 class="mb-20">{{ __('About Company') }}</h4>
                        <p>{!! $company->description !!}</p>

                        <div class="divider"></div>
                        <h4 class="mt-30 mb-30">{{ __('Google Map') }}</h4>
                        {!! $company->map !!}
                        <div class="divider"></div>
                    </div>
                    <div class="single-recent-jobs">
                        <h4 class="mt-30 mb-30">{{ __('Job Openings') }}</h4>
                        <div class="list-recent-jobs">
                            @if (isset($company->jobs) && count($company->jobs))
                                @foreach ($company->jobs as $companyJob)
                                    <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                        <div class="card-job-top">
                                            <div class="card-job-top--image">
                                                <figure><a href="{{ route('job.detail', [$companyJob->slug]) }}"
                                                        title="{{ $companyJob->title }}">
                                                        {{ $company->printCompanyImage() }} </a></figure>
                                            </div>
                                            <div class="card-job-top--info">
                                                <h6 class="card-job-top--info-heading"><a
                                                        href="{{ route('job.detail', [$companyJob->slug]) }}"
                                                        title="{{ $companyJob->title }}">{{ $companyJob->title }}</a></h6>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <span class="card-job-top--company"><a
                                                                href="{{ route('company.detail', $company->slug) }}"
                                                                title="{{ $company->name }}">{{ $company->name }}</a></span>
                                                        <span class="card-job-top--location text-sm"><i
                                                                class="fi-rr-marker"></i>
                                                            {{ $companyJob->getCity('city') }}</span>
                                                        <span class="card-job-top--type-job text-sm"
                                                            title="{{ $companyJob->getJobType('job_type') }}"><i
                                                                class="fi-rr-briefcase"></i>
                                                            {{ $companyJob->getJobType('job_type') }}
                                                        </span>

                                                        <span class="card-job-top--post-time text-sm"><i
                                                                class="fi-rr-clock"></i>{{ $companyJob->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                    @if (!(bool) $companyJob->hide_salary)
                                                        <div class="col-lg-5 text-lg-end">
                                                            <span class="card-job-top--price" style="font-size: 11px">
                                                                {{ $companyJob->getSalaryPeriod('salary_period') }}:
                                                                <strong>{{ $companyJob->salary_from . ' ' . $companyJob->salary_currency }}
                                                                    -
                                                                    {{ $companyJob->salary_to . ' ' . $companyJob->salary_currency }}</strong>
                                                            </span>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-job-description mt-20">
                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($companyJob->description), 150, '...') }}
                                            </p>

                                        </div>
                                        <div class="card-job-bottom mt-25">
                                            <div class="row">
                                                <div class="col-lg-9 col-sm-8 col-12">
                                                    <a class="btn btn-small background-urgent btn-pink mr-5 mt-2">{{ __('Shift') }}
                                                        : {{ $companyJob->getJobShift('job_shift') }}</a>
                                                    <a
                                                        class="btn btn-small background-6 disc-btn mt-2">{{ $companyJob->getJobType('job_type') }}</a>
                                                    <a
                                                        class="btn btn-small background-blue-light mr-5 mt-2">{{ $companyJob->getCareerLevel('career_level') }}</a>
                                                </div>

                                            </div>

                                        </div>
                                        <a href="{{ route('job.detail', [$companyJob->slug]) }}"
                                            class="btn btn-default btn-small mt-3">{{ __('View Detail') }}</a>

                                    </div>
                                @endforeach
                            @else
                                <div class="single-apply-jobs">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <h4>{{ __('There are currently no open positions available.') }}</h4>
                                            <a class="btn btn-border"
                                                href="{{ url('/jobs') }}">{{ __('Search Jobs') }}</a>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-shadow">
                        <h5 class="font-bold">{{ __('Company Detail') }}</h5>
                        <div class="sidebar-list-job mt-10">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fa-solid fa-user-check"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{ __('Is Email Verified') }}</span>
                                        <strong class="small-heading">
                                            {{ ((bool) $company->verified) ? 'Yes' : 'No' }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fa-regular fa-building"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Company field</span>
                                        <strong class="small-heading"> {{ $company->getIndustry('industry') }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{ __('Company Location') }}</span>
                                        <strong class="small-heading">{{ $company->location }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fa-solid fa-house-laptop"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Offices</span>
                                        <strong>{{ $company->no_of_offices }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fa-solid fa-users"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{ __('Total Employees') }}</span>
                                        <strong>{{ $company->no_of_employees }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{ __('Member Since') }}</span>
                                        <strong
                                            class="small-heading">{{ $company->created_at->format('M d, Y') }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{ __('Established In') }}</span>
                                        <strong class="small-heading">{{ $company->established_in }}</strong>
                                    </div>
                                </li>
                                {{--  <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">{{__('Current jobs')}}</span>
                                        <strong class="small-heading">{{$company->countNumJobs('company_id',$company->id)}}</strong>
                                    </div>
                                </li>  --}}
                            </ul>
                        </div>

                        <div class="sidebar-list-job mt-10">
                            <a href="javascript:;" onclick="send_message()"
                                class="btn btn-border">{{ __('Send Message') }}</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->

    <div class="modal fade" id="sendmessage" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">
                <form action="" id="send-form">
                    @csrf
                    <input type="hidden" name="company_id" id="company_id" value="{{ $company->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Send Message') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('Message') }}</label>
                            <textarea class="form-control" name="message" id="message" style="height: 300px;" rows="20"
                                placeholder="Enter your message here"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-border"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit"class="btn btn-border">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>




        </div>

    </div>


@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#send_company_message', function() {

                var postData = $('#send-company-message-form').serialize();

                $.ajax({

                    type: 'POST',

                    url: "{{ route('contact.company.message.send') }}",

                    data: postData,

                    //dataType: 'json',

                    success: function(data) {

                        response = JSON.parse(data);

                        var res = response.success;

                        if (res == 'success') {

                            var errorString =
                                '<div role="alert" class="alert alert-success popmessage">' +

                                response.message + '</div>';

                            $('#alert_messages').html(errorString);

                            $('#send-company-message-form').hide('slow');

                            $(document).scrollTo('.alert', 2000);

                        } else {

                            var errorString =
                                '<div class="alert alert-danger" role="alert"><ul>';

                            response = JSON.parse(data);

                            $.each(response, function(index, value) {

                                errorString += '<li>' + value + '</li>';

                            });

                            errorString += '</ul></div>';

                            $('#alert_messages').html(errorString);

                            $(document).scrollTo('.alert', 2000);

                        }

                    },

                });

            });

        });



        function send_message() {

            const el = document.createElement('div')

            el.innerHTML =

                "Please <a class='btn' href='{{ route('login') }}' onclick='set_session()'>log in</a> as a Canidate and try again."

            @if (Auth::check())

                $('#sendmessage').modal('show');
            @else

                swal({

                    title: "You are not Loged in",

                    content: el,

                    icon: "error",

                    button: "OK",

                });
            @endif

        }

        if ($("#send-form").length > 0) {

            $("#send-form").validate({

                validateHiddenInputs: true,

                ignore: "",



                rules: {

                    message: {

                        required: true,

                        maxlength: 5000

                    },

                },

                messages: {



                    message: {

                        required: "Message is required",

                    }



                },

                submitHandler: function(form) {

                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });

                    @if (null !== Auth::user())

                        $.ajax({

                            url: "{{ route('submit-message') }}",

                            type: "POST",

                            data: $('#send-form').serialize(),

                            success: function(response) {

                                $("#send-form").trigger("reset");

                                $('#sendmessage').modal('hide');

                                swal({

                                    title: "Success",

                                    text: response["msg"],

                                    icon: "success",

                                    button: "OK",

                                });

                            }

                        });
                    @endif

                }

            })

        }
    </script>
@endpush
