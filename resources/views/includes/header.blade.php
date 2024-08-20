{{--  <div class="header" id="siteheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-12"> <a href="{{url('/')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>
                <div class="navbar-header navbar-light">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i></button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-10 col-md-12 col-12"> 

                <!-- Nav start -->
                <nav class="navbar navbar-expand-lg navbar-light">
					
                    <div class="navbar-collapse collapse" id="nav-main">
                    <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>

                        <ul class="navbar-nav">
                            <li class="nav-item {{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{url('/')}}" class="nav-link">{{__('Home')}}</a> </li>
							
                            
							@if (Auth::guard('company')->check())
							<li><a href="{{url('/job-seekers')}}" class="nav-link">{{__('Seekers')}}</a> </li>
							@else
							<li class="nav-item"><a href="{{url('/jobs')}}" class="nav-link">{{__('Jobs')}}</a> </li>
							@endif




							<li class="nav-item {{ Request::url()}}"><a href="{{url('/companies')}}" class="nav-link">{{__('Companies')}}</a> </li>


                            @foreach ($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                            <li class="nav-item {{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $top_menu->page_slug) }}" class="nav-link">{{ $cmsContent->page_title }}</a> </li>
                            @endforeach


							<li class="nav-item {{ Request::url() == route('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}" class="nav-link">{{__('Blog')}}</a> </li>


                            <li class="nav-item {{ Request::url() == route('contact.us') ? 'active' : '' }}"><a href="{{ route('contact.us') }}" class="nav-link">{{__('Contact us')}}</a> </li>



                            @if (Auth::check())
                            <li class="nav-item dropdown userbtn"><a href="">{{Auth::user()->printUserImage()}}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('my.profile') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('view.public.profile', Auth::user()->id) }}" class="nav-link"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                                    <li><a href="{{ route('my.job.applications') }}" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Job Applications')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 
                            
                            
                            @if (Auth::guard('company')->check())
                            <li class="nav-item postjob"><a href="{{route('post.job')}}" class="nav-link register">{{__('Post a job')}}</a> </li>
                            <li class="nav-item dropdown userbtn"><a href="">{{Auth::guard('company')->user()->printCompanyImage()}}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('company.home')}}" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('company.profile') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Profile')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('post.job') }}" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
                                    <li class="nav-item"><a href="{{route('company.messages')}}" class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 
                            
                            
                            @if (!Auth::user() && !Auth::guard('company')->user())
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">{{__('Sign in')}}</a> </li>
							<li class="nav-item"><a href="{{route('register')}}" class="nav-link register">{{__('Register')}}</a> </li>                            
                            @endif

                            <li class="dropdown userbtn"><a href="{{url('/')}}"><img src="{{asset('/')}}images/lang.png" alt="" class="userimg" /></a>
                                <ul class="dropdown-menu">
                                    @foreach ($siteLanguages as $siteLang)
                                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();" class="nav-link">{{$siteLang->native}}</a>
                                        <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                            <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                            <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>


                        </ul>

                        <!-- Nav collapes end --> 

                    </div>
                    <div class="clearfix"></div>
                </nav>

                <!-- Nav end --> 

            </div>
        </div>

        <!-- row end --> 

    </div>

    <!-- Header container end --> 

</div>

  --}}




<?php /*?> ?>@if (!Auth::user() && !Auth::guard('company')->user())
    <div class="">my dive 2</div>
@endif<?php */?>



<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a href="{{ url('/') }}" class="d-flex"><img alt="{{ $siteSetting->site_name }}"
                            src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" /></a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li class="">
                                <a class="{{ Request::url() == route('index') ? 'active' : '' }}"
                                    href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            @if (Auth::guard('company')->check())
                                <li class="">
                                    <a class=""
                                        href="{{ url('/job-seekers') }}">{{ __('Seekers') }}</a>
                                </li>
                            @else
                                <li class="">
                                    <a class=""
                                        href="{{ url('/jobs') }}">{{ __('Jobs') }}</a>
                                </li>
                            @endif

                            <li class="">
                                <a class=""
                                    href="{{url('/companies')}}">{{__('Companies')}}</a>
                            </li>

                            @foreach ($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                            <li class=""><a  class="{{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}" href="{{ route('cms', $top_menu->page_slug) }}" >{{ $cmsContent->page_title }}</a> </li>
                            @endforeach

                            <li class=""><a href="{{ route('blogs') }}" class="{{ Request::url() == route('blogs') ? 'active' : '' }}">{{__('Blog')}}</a> </li>

                            <li class=""><a href="{{ route('contact.us') }}" class="{{ Request::url() == route('contact.us') ? 'active' : '' }}">{{__('Contact us')}}</a> </li>



                            @if (Auth::check())
                            <li class="has-children iconss"><a class="user-img" href="" >{{Auth::user()->printUserImage()}}</a>
                                <ul class="sub-menu">
                                    <li ><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li ><a href="{{ route('my.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                                    <li ><a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                                    <li><a href="{{ route('my.job.applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Job Applications')}}</a> </li>
                                    <li ><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 


                            @if (Auth::guard('company')->check())
                            <li class=""><a href="{{route('post.job')}}" class="">{{__('Post a job')}}</a> </li>

                            <li class="has-children iconss"><a class="user-img"  href="">{{Auth::guard('company')->user()->printCompanyImage()}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('company.home')}}" ><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li><a href="{{ route('company.profile') }}" ><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Profile')}}</a></li>
                                    <li><a href="{{ route('post.job') }}" ><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
                                    <li><a href="{{route('company.messages')}}" ><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
                                    <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" ><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 

                            @if (!Auth::user() && !Auth::guard('company')->user())
                       
                            <li class="has-children">
                                <a href="#">{{__('Sign in')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('candidate_login')}}">{{__('Candidate')}}</a></li>
                                    <li><a href="{{route('company_login')}}">{{__('Employer')}} </a></li>
                                </ul>
                            </li>  
                            <li class="has-children">
                                <a href="#">{{__('Register')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('candidate_register')}}">{{__('Candidate')}}</a></li>
                                    <li><a href="{{route('employer_register')}}">{{__('Employer')}} </a></li>
                                </ul>
                            </li>  
							                           
                            @endif

                            <li class="has-children">
                                <a href="#"><img src="{{asset('/')}}images/lang.png" alt=""  style="width: 26px;    height: 20px;    object-fit: cover;" /></a>
                                <ul class="sub-menu">
                                    @foreach ($siteLanguages as $siteLang)
                                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();" class="nav-link">{{$siteLang->native}}</a>
                                        <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                            <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                            <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                        </form>
                                    </li>
                                  
                                    @endforeach
                                </ul>
                            </li> 


                            {{--  
                                <li class="has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-service.html">Our Services</a></li>
                                        <li><a href="page-pricing.html">Pricing Plan</a></li>
                                        <li><a href="pages-faqs.html">FAQs</a></li>
                                        <li><a href="page-contact.html">Contact Us</a></li>
                                    </ul>
                                </li>  --}}

                           



                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
            {{--  <div class="header-right">
                
                <div class="block-signin">
                    
                    <a href="#" class="btn btn-default btn-shadow ml-40 hover-up">Sign in</a>
                </div>
            </div>  --}}
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="user-account">
                <img alt="{{ $siteSetting->site_name }}"
                src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" />
              
            </div>
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
               
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="">
                                <a class="{{ Request::url() == route('index') ? 'active' : '' }}"
                                    href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            @if (Auth::guard('company')->check())
                                <li class="">
                                    <a class=""
                                        href="{{ url('/job-seekers') }}">{{ __('Seekers') }}</a>
                                </li>
                            @else
                                <li class="">
                                    <a class=""
                                        href="{{ url('/jobs') }}">{{ __('Jobs') }}</a>
                                </li>
                            @endif

                            <li class="">
                                <a class=""
                                    href="{{url('/companies')}}">{{__('Companies')}}</a>
                            </li>

                            @foreach ($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                            <li class=""><a  class="{{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}" href="{{ route('cms', $top_menu->page_slug) }}" >{{ $cmsContent->page_title }}</a> </li>
                            @endforeach

                            <li class=""><a href="{{ route('blogs') }}" class="{{ Request::url() == route('blogs') ? 'active' : '' }}">{{__('Blog')}}</a> </li>

                            <li class=""><a href="{{ route('contact.us') }}" class="{{ Request::url() == route('contact.us') ? 'active' : '' }}">{{__('Contact us')}}</a> </li>



                            @if (Auth::check())
                            <li class="has-children iconss"><a class="user-img" href="" >{{Auth::user()->printUserImage()}}</a>
                                <ul class="sub-menu">
                                    <li ><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li ><a href="{{ route('my.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                                    <li ><a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                                    <li><a href="{{ route('my.job.applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Job Applications')}}</a> </li>
                                    <li ><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 


                            @if (Auth::guard('company')->check())
                            <li class=""><a href="{{route('post.job')}}" class="">{{__('Post a job')}}</a> </li>

                            <li class="has-children iconss"><a class="user-img"  href="">{{Auth::guard('company')->user()->printCompanyImage()}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('company.home')}}" ><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li><a href="{{ route('company.profile') }}" ><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Profile')}}</a></li>
                                    <li><a href="{{ route('post.job') }}" ><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
                                    <li><a href="{{route('company.messages')}}" ><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
                                    <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" ><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif 

                            @if (!Auth::user() && !Auth::guard('company')->user())
                       
                            <li class="has-children">
                                <a href="#">{{__('Sign in')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('candidate_login')}}">{{__('Candidate')}}</a></li>
                                    <li><a href="{{route('company_login')}}">{{__('Employer')}} </a></li>
                                </ul>
                            </li>  
                            <li class="has-children">
                                <a href="#">{{__('Register')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('candidate_register')}}">{{__('Candidate')}}</a></li>
                                    <li><a href="{{route('employer_register')}}">{{__('Employer')}} </a></li>
                                </ul>
                            </li>  
							                           
                            @endif

                            <li class="has-children">
                                <a href="#"><img src="{{asset('/')}}images/lang.png" alt=""  style="width: 26px;    height: 20px;    object-fit: cover;" /></a>
                                <ul class="sub-menu">
                                    @foreach ($siteLanguages as $siteLang)
                                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();" class="nav-link">{{$siteLang->native}}</a>
                                        <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                            <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                            <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                        </form>
                                    </li>
                                  
                                    @endforeach
                                </ul>
                            </li> 


                          
                        </ul>
                    </nav>
               
                </div>
                
            </div>
        </div>
    </div>
</div>
