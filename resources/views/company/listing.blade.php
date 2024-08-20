@extends('layouts.app')
@section('content') 
    
    <section class="section-box bg-banner-about banner-home-3 compnaies pt-3">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">  {{ __('Browse Companies') }}</h3>
                            <div class="form-find mw-720 mt-25">
                                <form action="{{ route('company.listing') }}" method="get"
                                    class="form-newsletter wow animate__animated animate__fadeInUp">
                                        <input type="text" name="search" value="{{ Request::get('search', '') }}" class="form-input mr-10 ml-10 " placeholder="{{ __('keywords e.g. "Google"') }}" />
                                    <button type="submit"
                                        class="btn btn-default btn-find wow animate__animated animate__fadeInUp">{{ __('Search') }}</button>
                                </form>
                            </div>
                            <div class="list-tags-banner mt-25 text-center wow animate__animated animate__fadeInUp">
                                    <h5 class="text-md-newsletter">  {{ __('Get hired in the most high-rated companies') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="section-box mt-25">
        <div class="container">
            <div class="content-page">
              
                <div class="row">
                    @if($companies->isEmpty())
                    <p>No active and verified companies found.</p>
                @else
                @foreach($companies as $company)
                    <div class="col-lg-3 col-md-6">
                        <div class="card-grid-2 card-employers hover-up wow animate__animated animate__fadeIn">
                            <div class="text-center card-grid-2-image-rd ">
                                <a href="{{ route('company.detail', $company->slug) }}">
                                    <figure>
                                        {!! $company->printCompanyImage(200,200,'img-fluid rounded-3') !!}

                                    </figure>
                                </a>
                            </div>
                            <div class="card-block-info">
                                <div class="card-profile">
                                    <h5><a href="employers-single.html"><strong>{{ $company->name }}</strong></a></h5>
                                  
                                </div>
                                <div class="mt-15">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <div class=" text-center align-items-center">
                                                <i class="fi-rr-marker mr-5"></i> {{ $company->getCity('city') }}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        @if($company->getIndustry('industry'))
                                        <div class=" text-center align-items-center  mt-2">
                                            <i class="fi-rr-briefcase mr-5"></i>{{$company->getIndustry('industry')}}
                                        </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                    <div class="text-center mt-25 mb-5">
                                        <a href="{{ route('company.detail', $company->slug) }}" class="btn btn-border btn-brand-hover">{{ $company->countNumJobs('company_id', $company->id) }} {{ __('Opening Jobs') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             @endforeach
                  @endif
                </div>
             
                <div class="box-filters-job mt-15 mb-10 text-center">
                    <div class="row">
                        <div class="col-12">
                            <span class="text-small"><strong>{{ __('Showing Companies') }} :</strong> {{ $companies->firstItem() }} - {{ $companies->lastItem() }} {{ __('of') }} {{ $companies->total() }} {{ __('results') }}</span>
                        </div>
                
                    </div>
                </div>

                @if ($companies->hasPages())
                <div class="paginations wow animate__animated animate__fadeIn text-center">
                    <ul class="pager">
            
                        {{-- Previous Page Link --}}
                        @if ($companies->onFirstPage())
                            <li><a href="javascript:void(0);" class="pager-prev disabled"></a></li>
                        @else
                            <li><a href="{{ $companies->previousPageUrl() }}" class="pager-prev"></a></li>
                        @endif
            
                        {{-- Pagination Elements --}}
                        @foreach ($companies->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li><a href="javascript:void(0);" class="pager-number">{{ $element }}</a></li>
                            @endif
            
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $companies->currentPage())
                                        <li><a href="javascript:void(0);" class="pager-number active">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}" class="pager-number">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
            
                        {{-- Next Page Link --}}
                        @if ($companies->hasMorePages())
                            <li><a href="{{ $companies->nextPageUrl() }}" class="pager-next"></a></li>
                        @else
                            <li><a href="javascript:void(0);" class="pager-next disabled"></a></li>
                        @endif
            
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </section>
 


@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_company_message', function () {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
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
                        $('#send-company-message-form').hide('slow');
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
    });
</script> 
@endpush