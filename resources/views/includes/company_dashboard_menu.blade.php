


<div class="user-menu">
    <div class="container">
        <div class="navigation">
            <ul>

                <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}">
                    <a href="{{ route('company.home') }}">
                        <span class="icon">
                            <i class="fas fa-tachometer" aria-hidden="true"></i>
                        </span>
                        <span class="title">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="{{ Request::url() == route('company.profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}">
                        <span class="icon"> <i class="fas fa-pencil" aria-hidden="true"></i> </span>
                        <span class="title"> {{ __('Edit Profile') }} </span>
                    </a>
                </li>
                <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"> <span class="icon"> <i class="fas fa-user-alt" aria-hidden="true">
                            </i> </span> <span class="title">{{__('Company Public Profile')}}</span></a></li>
                <li class="{{ Request::url() == route('post.job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"> <span class="icon"> <i class="fas fa-desktop" aria-hidden="true"></i> </span> <span class="title">{{__('Post Job')}}</span>
                    </a>
                </li>

                <li class="{{ Request::url() == route('posted.jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}"> <span class="icon"> <i class="fab fa-black-tie" aria-hidden="true"></i></span> <span class="title">
                    {{__('Company Jobs')}}</span></a>
                </li>

                <li class="{{ Request::url() == route('company.packages') ? 'active' : '' }}"><a href="{{ route('company.packages')  }}"> <span class="icon"> <i class="fas fa-search" aria-hidden="true"></i></span> <span class="title">
                    {{__('CV Search Packages')}}</span></a>
                </li>
                <li class="{{ Request::url() == route('company.unloced-users') ? 'active' : '' }}"><a  href="{{ route('company.unloced-users') }}"> <span class="icon"> <i class="fas fa-user" aria-hidden="true"></i></span> <span class="title">
                    {{__('Unlocked Users')}}</span></a>
                </li>
                <li class="{{ Request::url() == route('company.messages') ? 'active' : '' }}"><a href="{{route('company.messages')}}"> <span class="icon"> <i class="fas fa-envelope" aria-hidden="true"></i> </span> <span class="title">
                    {{__('Company Messages')}}</span></a>
                </li>
                <li class="{{ Request::url() == route('company.followers') ? 'active' : '' }}"><a href="{{route('company.followers')}}"> <span class="icon"> <i class="fas fa-users" aria-hidden="true"></i></span> <span class="title">
                    {{__('Company Followers')}}</span></a>
                </li>
          
                <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="icon"><i class="fas fa-sign-out" aria-hidden="true"></i> </span> <span class="title">{{ __('Logout') }} </span> </a>
                    <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


            </ul>
            <div class="toggle"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
</div>
<script>
    let navigation = document.querySelector('.user-menu .navigation');
    let listpgWraper = document.querySelector('.listpgWraper');

    let toggle = document.querySelector('.user-menu .toggle');
    toggle.onclick = function() {
        navigation.classList.toggle('active');
        listpgWraper.classList.toggle('active');
    }

</script>
