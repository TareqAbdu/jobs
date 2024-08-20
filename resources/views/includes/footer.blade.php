
    {{-- subscribe   --}}
    @include('includes.subscribe')

  <footer class="footer mt-50" >
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <a href="{{ url('/') }}" class="d-flex"><img alt="{{ $siteSetting->site_name }}"
                    src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" /></a>

                <h4 class="mt-4">{{ $siteSetting->site_name }}</h4>
                {{--  <a href="index.html"><img alt="jobhub" src="assets/imgs/theme/jobhub-logo.svg" /></a>  --}}
              

                <div class="mt-20 mb-20">{{ __('It is a long established fact that a reader will be of a page reader will be of at its layout.') }}</div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 col-12">
                <h6>{{__('Quick Links')}}</h6>
                <ul class="menu-footer mt-40">
                    <li><a href="{{ route('index') }}"> {{__('Home')}}</a></li>
                    <li><a href="{{ route('contact.us') }}"> {{__('Contact Us')}}</a></li>
                    <li><a href="{{ route('post.job') }}"> {{__('Post a Job')}}</a></li>
                    <li><a href="{{ route('faq') }}"> {{__('FAQs')}}</a></li>
                    @foreach($show_in_footer_menu as $footer_menu)
                    @php
                    $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                    @endphp
                    <li><a href="{{ route('cms', $footer_menu->page_slug) }}">
                             {{ $cmsContent->page_title }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6 col-12">
                <h6>{{__('Jobs By Functional Area')}}</h6>
                <ul class="menu-footer mt-40">
                    @php
                    $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    @endphp
                    @foreach($functionalAreas as $functionalArea)
                    <li><a href="{{ route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}
                    </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 col-12">
                <h6>{{__('Jobs By Industry')}}</h6>
                <ul class="menu-footer mt-40">
                    @php
                    $industries = App\Industry::getUsingIndustries(10);
                    @endphp
                    @foreach($industries as $industry)
                    <li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">
                        {{$industry->industry}}
                    </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 col-12">
                <h6>{{__('Contact Us')}}</h6>
                <ul class="menu-footer mt-40">
                    <div class="address text-white-50">{{ $siteSetting->site_street_address }}</div>
                    <div class="email text-white-50 mt-2"> 
                        <a href="mailto:{{ $siteSetting->mail_to_address }}" class="text-white-50">
                            {{ $siteSetting->mail_to_address }}
                        </a> 
                    </div>
                    <div class="phone text-white-50 mt-2"> 
                        <a href="tel:{{ $siteSetting->site_phone_primary }}" class="text-white-50">
                            {{ $siteSetting->site_phone_primary }}
                        </a>
                    </div>

                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6">
                    {{--  Copyright ©2021 <a href="#"><strong>Jobhub</strong></a>. All Rights Reserved  --}}
                    <p class="text-white-50  mb-0">
                        2024 &copy; {{ $siteSetting->site_name }} - {{__('All Rights Reserved')}}.
                        {{__('Design by')}} <a href="https://themeforest.net/search/themesdesign" target="_blank" class="text-reset text-decoration-underline">Themesdesign</a>
                    </p>

                </div>
                <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social">
                        {{--  <a href="#" class="icon-socials icon-facebook"></a>
                        <a href="#" class="icon-socials icon-twitter"></a>
                        <a href="#" class="icon-socials icon-instagram"></a>
                        <a href="#" class="icon-socials icon-linkedin"></a>  --}}
                        @include('includes.footer_social')
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>