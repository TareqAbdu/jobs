@extends('layouts.app')
@section('content') 
<section class="section-box bg-banner-about banner-home-3 pt-3">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">
                            {{ __('Jobs') }} </h3>
                        <div class="form-find mw-720 mt-25">
                            <form action="{{ route('job.list') }}" method="get">

                                <input type="text" name="search" id="jbsearch" value="{{ Request::get('search', '') }}"
                                    class="form-control m-2 mb-0 mt-0" placeholder="{{ __('Enter Skills or job title') }}" autocomplete="off">
                                <!-- <input type="text" class="form-input input-keysearch mr-10" placeholder="City, Postcode... " /> -->
                                {!! Form::select(
                                    'functional_area_id[]',
                                    ['' => __('Select Functional Area')] + $functionalAreas,
                                    Request::get('functional_area_id', null),
                                    ['class' => 'form-input mr-10 select-active', 'id' => 'functional_area_id'],
                                ) !!}
                        
                                <button type="submit" class="btn btn-default btn-find">Find
                                    now</button>
                                
                        
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
              
                        @if(Auth::guard('company')->check())
                        <a href="{{ route('post.job') }}" class="btn btn-default btn-find mt-3" style="margin-left: 46%;"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Post Job')}}</a>
                        @else
                        <a href="{{url('my-profile#cvs')}}" class="btn btn-default btn-find mt-3" style="margin-left: 46%;"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Upload Your Resume')}}</a>
                        @endif
                   

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('flash::message')
     


<form action="{{route('job.seeker.list')}}" method="get">

    <section class="section-box mt-80">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job mt-15 mb-10">
                            <div class="row">
                          
                                    @if(isset($jobSeekers) && count($jobSeekers))
                                        @foreach($jobSeekers as $jobSeeker)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="candidate-grid-box bookmark-post card mt-4">
                                                <div class="card-body p-4">
                                                    <div class="d-flex mb-4">
                                                        <div class="flex-shrink-0 position-relative circle-image">
                                                            {!! $jobSeeker->printUserImage(50, 50) !!}
                                                        </div>
                                                        <div class="ms-3">
                                                            <a href="{{ route('user.profile', $jobSeeker->id) }}" class="primary-link"><h5 class="fs-17">{{ $jobSeeker->getName() }}</h5></a>
                                                            
                                                            <p>{{ $jobSeeker->getLocation() }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="text-muted">{{ \Illuminate\Support\Str::limit($jobSeeker->getProfileSummary('summary'), 150, '...') }}</p>
                                                    <div class="mt-3">
                                                        <a href="{{ route('user.profile', $jobSeeker->id) }}" class="btn btn-default  mt-2"><i class="fas fas-eye"></i> {{ __('View Profile') }}</a>
                                                    </div>
                                                </div>
                                            </div> <!--end card-->
                                        </div><!--end col-->
                                        @endforeach
                                    @else
                                        <p>No active and verified job seekers found.</p>
                                    @endif
                             

                            </div>
                        </div>
                     

                        
                         
                        @if ($jobSeekers->hasPages())
                        <div class="paginations wow animate__animated animate__fadeIn">
                            <ul class="pager">

                                {{-- Previous Page Link --}}
                                @if ($jobSeekers->onFirstPage())
                                <li><a href="javascript:void(0);" class="pager-prev disabled"></a></li>
                                @else
                                <li><a href="{{ $jobSeekers->previousPageUrl() }}" class="pager-prev"></a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($jobSeekers->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                <li><a href="javascript:void(0);" class="pager-number">{{ $element }}</a></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                @foreach ($element as $page => $url)
                                @if ($page == $jobSeekers->currentPage())
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
                  


                    @include('includes.job_seeker_list_side_bar')
                </div>
                <div class=""><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div>

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
    .hide_vm_ul{
        height:100px;
        overflow:hidden;
    }
    .hide_vm{
        display:none !important;
    }
    .view_more{
        cursor:pointer;
    }
</style>
@endpush
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });
        $('#reset-filters').click(function() {
            event.preventDefault();
    
            // Uncheck all checkboxes
            $('input[type="checkbox"]').prop('checked', false);
    
            // Optionally, you can trigger a form submission or AJAX call here if needed
            // $('form').submit();
        });
    });
</script>
@include('includes.country_state_city_js')
@endpush


