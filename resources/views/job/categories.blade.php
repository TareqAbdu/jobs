@extends('layouts.app')



@section('content') 



<!-- Header start --> 



@include('includes.header') 



<!-- Header end --> 


<!-- Inner Page Title start --> 
{{-- @include('includes.inner_page_title', ['page_title'=>__('All Categories')]) --}}


<section class="section-box bg-banner-about banner-home-3 pages blog  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp mt-35">
                            {{ __('All Categories') }}</h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Inner Page Title end -->




@include('flash::message')


<div class="section">

    <div class="container">

        <div class="topsearchwrap">




                <div class="srchint">

                    <ul class="row categorylisting">

                        @if(isset($functionalAreas) && count($functionalAreas)) 
                        @foreach($functionalAreas as $functionalArea)
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
                                    ({{ $functionalArea->jobs_count }})
                                    {{ __('Jobs') }}</p>
                            </div>
                        </div>
                    @endif
                        @endforeach
                        @endif

                    </ul>

                    <!--Categories end-->

                </div>



          



            

        </div>

    </div>

</div>


@include('includes.footer')



@endsection

