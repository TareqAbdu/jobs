@extends('layouts.app')

@section('content') 
@push('styles')
<link href="{{ asset('new_template/cv/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('new_template/cv/plugins/animated/headline.css') }}" rel="stylesheet" type="text/css" />
<!-- App css -->
{{--  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />  --}}
<link href="{{ asset('new_template/cv/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('new_template/cv/css/style.css') }}" rel="stylesheet" type="text/css" />
<style>
    .header-title {
        position: relative;
        margin-bottom: 20px !important;
    }

    .header-title:after {

        left: 0px;
    }

    #skill_div .time-item {
        border-left: 2px dotted #dbe0ec !important;
    }

    #skill_div {
        border-left: 0;
    }

    #language_div table td {
        border: 1px solid #f3f3f3;
    }

    .personal-detail-title {
        width: 180px;
    }

    .personal-detail-title:after {
        right: 7px;
    }

    .item-box {

        height: 250px !important;
    }

    .item-mask {
        height: 250px !important;
    }

    .my-work .container-grid.projects-wrapper {
        height: auto !important;
    }

    .my-work .cbox-gallary1 img {
        object-fit: cover;
        width: 100%;
        height: 100%;

    }

    .my-work .item-box a {
        display: inline-block;
        height: 100%;
        width: 100%;
        margin: 15px;
        overflow: hidden;
        position: relative;
    }

    .thanks-text {
        display: block;
    }
</style>
@endpush

<section class="section-box bg-banner-about banner-home-3 pages user  pt-3 mb-35">
   <div class="banner-hero">
       <div class="banner-inner">
           <div class="row">
               <div class="col-lg-12">
                   <div class="block-banner">
                       <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                           {{ __('Print Resume') }}</h3>
                       
                       <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                           <div class="text-center">
                               <ul class="breadcrumbs mt-sm-15">
                                   <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                   <li>{{__('Print Resume')}}</li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>

<?php $true = FALSE; ?>



<?php 

if(Auth::guard('company')->user()){

$package = Auth::guard('company')->user();

if(null!==($package)){

    $array_ids = explode(',',$package->availed_cvs_ids);

    if(in_array($user->id, $array_ids)){

        $true = TRUE;

    }

}

}

?>

<!-- Inner Page Title end -->

<div class="listpgWraper">

   <div class="container-fluid layout"> 
        @include('flash::message')  
<div class="row">
   <div class="menu-sidebar">
      @include('includes.user_dashboard_menu')
  </div>

  <div class="main-wraper mt-25 " id="printableArea">
   <section class="section bg-profile" id="profile_ripple">
       <div class="zoo-profile">
           <div class="container">
               <div class="row">
                   <div class="col-sm-6 col-print-6 align-self-center mb-3 mb-lg-0">
                       <div class="zoo-profile-main">
                           <div class="zoo-profile-main-pic rounded-circle">

                               {{ $user->printUserImage() }}

                           </div>
                           <div class="zoo-profile_user-detail">
                               <h5 class="zoo-user-name"> {{ $user->getName() }} </h5>
                               <p class="cd-headline loading-bar">
                                   <span class="cd-words-wrapper">
                                       <b class="is-visible">{{ $user->getCareerLevel('career_level') }}</b>
                                       <b>{{ __('Experience') }} :
                                           {{ $user->getJobExperience('job_experience') }}</b>
                                   </span>

                               </p>
                           </div>
                       </div>
                   </div>
                   <div class="col-sm-4 col-print-4 ml-auto">
                       <?php if($true == TRUE){?>
                       <ul class="list-unstyled personal-detail">
                           @if (!empty($user->phone))
                               <li><i class="'uil uil-phone-volume mr-2"></i> <b> {{ __('phone') }} </b> : <a
                                       href="tel:{{ $user->phone }}"> {{ $user->phone }}</a></li>
                           @endif
                           @if (!empty($user->mobile_num))
                               <li><i class="'uil uil-mobile-android mr-2"></i> <b> {{ __('Mobile') }} </b> : <a
                                       href="tel:{{ $user->mobile_num }}"> {{ $user->mobile_num }}</a></li>
                           @endif
                           @if (!empty($user->email))
                               <li class="mt-2"> <i class="uil uil-envelope mt-2 mr-2"></i> <b> {{ __('Email') }}
                                   </b> :
                                   <a href="mailto:{{ $user->email }}"> {{ $user->email }} </a>
                               </li>
                           @endif
                           @if (!empty($user->street_address))
                               <li class="mt-2"> <i class="uil uil-map-marker mt-2 mr-2"></i> <b>
                                       {{ __('Address') }}
                                   </b> :
                                   {{ $user->street_address }}
                               </li>
                           @endif



                       </ul>
                       <?php } ?>

                   </div>
               </div>
           </div>
       </div>
   </section>

   <section class="section-md">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h4 class="header-title mb-3 mt-4">{{ __('About me') }}</h4>
               </div>
               <div class="col-sm-6 col-print-6">
                   <p>{{ $user->getProfileSummary('summary') }}
                   </p>
                   <?php if($true == TRUE){ ?>

                   @if (isset($job) && isset($company))

                       @if (Auth::guard('company')->check() &&
                               Auth::guard('company')->user()->isHiredApplicant($user->id, $job->id, $company->id))
                           <a href="{{ route('remove.hire.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id]) }}"
                               class="btn btn-sm btn-soft-primary mt-3"><i class="fa fa-floppy-o"
                                   aria-hidden="true"></i> {{ __('Remove From Hired List') }} </a>
                       @else
                           @if (Auth::guard('company')->check() &&
                                   Auth::guard('company')->user()->isFavouriteApplicant($user->id, $job->id, $company->id))
                               <a href="{{ route('remove.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id]) }}"
                                   class="btn btn-sm btn-soft-primary mt-3"><i class="fa fa-floppy-o"
                                       aria-hidden="true"></i> {{ __('Shortlisted') }} </a>

                               @if (isset($is_applicant))
                                   <a style="color:#fff"
                                       href="{{ route('reject.applicant.profile', [$job_application->id]) }}"
                                       class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                       {{ __('Reject') }}</a>
                               @endif
                           @else
                               <a href="{{ route('add.to.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id]) }}"
                                   class="btn btn-sm btn-soft-primary mt-3"><i class="fa fa-floppy-o"
                                       aria-hidden="true"></i> {{ __('Shortlist') }}</a>
                           @endif


                           <a href="{{ route('hire.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id]) }}"
                               class="btn btn-sm btn-soft-primary mt-3"><i class="fa fa-floppy-o"
                                   aria-hidden="true"></i> {{ __('Hire This Candidate') }} </a>
                       @endif


                   @endif



                   @if (null !== $profileCv)
                       <a href="{{ asset('cvs/' . $profileCv->cv_file) }}" class="btn btn-sm btn-soft-primary mt-3"><i
                               class="fa fa-download" aria-hidden="true"></i> {{ __('Download CV') }}</a>
                   @endif
                   @if (auth()->check() && auth()->user()->id != $user->id)
                       <a href="javascript:;" onclick="send_message()" class="btn btn-sm btn-soft-primary mt-3"><i
                               class="fa fa-envelope" aria-hidden="true"></i> {{ __('Send Message') }}</a>
                   @endif

                   <?php } ?>
                   @if (Auth::guard('company')->user())
                       <?php if($true == FALSE){?>
                       <a href="{{ route('company.unlock', $user->id) }}" class="btn btn-default report mt-3"><i
                               class="fa fa-lock" aria-hidden="true"></i> {{ __('Profile Locked') }}</a>
                       <span>Unlock profile to view candidate CV and contact details</span>
                       <?php } ?>
                   @endif

               </div>
               <div class="col-sm-5 col-print-5 offset-lg-1 align-self-center">

                   <p>
                       <span class="personal-detail-title"> {{ __('Is Email Verified') }}</span>
                       <span class="personal-detail-info"> {{ ((bool) $user->verified) ? 'Yes' : 'No' }}</span>
                   </p>
                   <p>
                       <span class="personal-detail-title"> {{ __('Immediate Available') }}</span>
                       <span
                           class="personal-detail-info">{{ ((bool) $user->is_immediate_available) ? 'Yes' : 'No' }}</span>
                   </p>

                   <p>
                       <span class="personal-detail-title">{{ __('Age') }}</span>
                       <span class="personal-detail-info">{{ $user->getAge() }} {{ __('Years') }}</span>
                   </p>

                   <p>
                       <span class="personal-detail-title">{{ __('Gender') }}</span>
                       <span class="personal-detail-info">{{ $user->getGender('gender') }}</span>
                   </p>
                   <p>
                       <span class="personal-detail-title">{{ __('Marital Status') }}</span>
                       <span class="personal-detail-info">{{ $user->getMaritalStatus('marital_status') }}</span>
                   </p>
                   <p>
                       <span class="personal-detail-title">{{ __('Current Salary') }}</span>
                       <span class="personal-detail-info">{{ $user->current_salary }}
                           {{ $user->salary_currency }}</span>
                   </p>
                   <p>
                       <span class="personal-detail-title">{{ __('Expected Salary') }}</span>
                       <span class="personal-detail-info">{{ $user->expected_salary }}
                           {{ $user->salary_currency }}</span>
                   </p>


               </div>
           </div>
       </div>
   </section>

   <section class="section-md">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h4 class="header-title mb-3">{{ __('Education') }} & {{ __('Skills') }} </h4>
               </div>
               <div class="col-sm-7 col-print-6">
                   <div class="row">
                       <div class="col-sm-6 col-print-6">
                           <div class="resume-icon">
                               <i class="uil uil-graduation-hat"></i>
                               <h5 class="mt-n2">{{ __('Education') }}</h5>
                           </div><!--end resume-icon-->
                           <div class="timeline" id="education_div">
                           </div><!--end timeline-->
                       </div>
                       <div class="col-sm-6 col-print-6">
                           <div class="resume-icon">
                               <i class="uil uil-suitcase-alt"></i>
                               <h5 class="mt-n2">{{ __('Experience') }}</h5>
                           </div><!--end resume-icon-->
                           <div class="timeline" id="experience_div">
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-sm-5 col-print-6 align-self-center">
                   <div class="timeline" id="skill_div">
                   </div>
               </div>
           </div>
       </div>
   </section>

   <section class="section-md">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h4 class="header-title mb-3">{{ __('Languages') }} </h4>
               </div>
               <div class="col-sm-12 col-print-12">
                   <div id="language_div"></div>
               </div>

           </div>
       </div>
   </section>

   <section class="section-md my-work">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h4 class="header-title mb-3">{{ __('Portfolio') }}</h4>
               </div>
               <div class="col-sm-12">
                   <div class="row">
                       <div class="col-12">
                           <div class="row container-grid nf-col-3  projects-wrapper " id="projects_div">

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>



   <section class="section-md thanks-text">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h3 class="text-center">Thank you !</h3>
               </div>
           </div>
       </div>
   </section>
   <div class="" style="text-align: center;">           
      <input style=""type="button" onclick="printDiv('printableArea')" class="btn btn-primary" value="Print Resume" />
     </div>  
</div>

       
</div>

</div>

</div>

<div class="modal fade" id="sendmessage" role="dialog">

    <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

            <form action="" id="send-form">

                @csrf

                <input type="hidden" name="seeker_id" id="seeker_id" value="{{$user->id}}">

                <div class="modal-header">                    

                    <h4 class="modal-title">Send Message</h4>

                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <textarea class="form-control" name="message" id="message" cols="10" rows="7"></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>
            

        </div>
    </div>

</div>



@endsection

@push('styles')

<style type="text/css">

    .formrow iframe {

        height: 78px;

    }

</style>

@endpush

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

{{--  <script src="js/jquery.min.js"></script>  --}}
<script src="{{ asset('new_template/cv/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/ripple/jquery.ripples.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/counter/waypoints.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/filter/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/filter/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/filter/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('new_template/cv/plugins/animated/headline.js') }}"></script>

<!-- App js -->
<script src="{{ asset('new_template/cv/js/app.js') }}"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#send_applicant_message', function() {
            var postData = $('#send-applicant-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.applicant.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function(data) {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success') {
                        var errorString = '<div role="alert" class="alert alert-success">' +
                            response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-applicant-message-form').hide('slow');
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
        showEducation();
        showProjects();
        showExperience();
        showSkills();
        showLanguages();
    });

    function showProjects() {
        $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {
                user_id: {{ $user->id }},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })
            .done(function(response) {
                $('#projects_div').html(response);
                var procount = $('.cbox-gallary1.mfp-image').length;

                // Update the span with the count
                $('.counter-value.project').attr('data-count', procount).text(procount);
            });
    }

    function showExperience() {
        $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {
                user_id: {{ $user->id }},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })
            .done(function(response) {
                $('#experience_div').html(response);
            });
    }

    function showEducation() {
        $.post("{{ route('show.applicant.profile.education', $user->id) }}", {
                user_id: {{ $user->id }},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })
            .done(function(response) {
                $('#education_div').html(response);
            });
    }

    function showLanguages() {
        $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {
                user_id: {{ $user->id }},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })
            .done(function(response) {
                $('#language_div').html(response);
            });
    }

    function showSkills() {
        $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {
                user_id: {{ $user->id }},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })
            .done(function(response) {
                $('#skill_div').html(response);
            });
    }

    function send_message() {
        const el = document.createElement('div')
        el.innerHTML =
            "Please <a class='btn' href='{{ route('login') }}' onclick='set_session()'>log in</a> as a Employer and try again."
        @if (null !== Auth::guard('company')->user())
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
                @if (null !== Auth::guard('company')->user())
                    $.ajax({
                        url: "{{ route('submit-message-seeker') }}",
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
<script type="text/javascript">
function printDiv(divId) {
  var printContents = document.getElementById(divId).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}

</script>
<script type="text/javascript">

    $(document).ready(function () {

    $(document).on('click', '#send_applicant_message', function () {

    var postData = $('#send-applicant-message-form').serialize();

    $.ajax({

    type: 'POST',

            url: "{{ route('contact.applicant.message.send') }}",

            data: postData,

            //dataType: 'json',

            success: function (data)

            {

            response = JSON.parse(data);

            var res = response.success;

            if (res == 'success')

            {

            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';

            $('#alert_messages').html(errorString);

            $('#send-applicant-message-form').hide('slow');

            $(document).scrollTo('.alert', 2000);

            } else

            {

            var errorString = '<div class="alert alert-danger" role="alert"><ul>';

            response = JSON.parse(data);

            $.each(response, function (index, value)

            {

            errorString += '<li>' + value + '</li>';

            });

            errorString += '</ul></div>';

            $('#alert_messages').html(errorString);

            $(document).scrollTo('.alert', 2000);

            }

            },

    });

    });

    showEducation();

    showProjects();

    showExperience();

    showSkills();

    showLanguages();

    });

    function showProjects()

    {

    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#projects_div').html(response);

            });

    }

    function showExperience()

    {

    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#experience_div').html(response);

            });

    }


    function showEducation()

    {

    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#education_div').html(response);

            });

    }

    function showLanguages()

    {

    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#language_div').html(response);

            });

    }

    function showSkills()

    {

    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#skill_div').html(response);

            });

    }



    function send_message() {

        const el = document.createElement('div')

        el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Employer and try again."

        @if(null!==(Auth::guard('company')->user()))

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

                @if(null !== (Auth::guard('company')->user()))

                $.ajax({

                    url: "{{route('submit-message-seeker')}}",

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
  
@endpush