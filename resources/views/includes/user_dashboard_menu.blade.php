

<div class="user-menu">
    <div class="container">
        <div class="navigation">
            <ul>

                <li class="{{ Request::url() == route('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <span class="icon">
                            <i class="fas fa-tachometer" aria-hidden="true"></i>
                        </span>
                        <span class="title">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="{{ Request::url() == route('my.profile') ? 'active' : '' }}"><a href="{{ route('my.profile') }}">
                        <span class="icon"> <i class="fas fa-pencil" aria-hidden="true"></i> </span>
                        <span class="title"> {{ __('Edit Profile') }} </span>
                    </a>
                </li>
                <li><a href="{{ route('resume', Auth::user()->id) }}"> <span class="icon"> <i class="fa fa-print" aria-hidden="true">
                            </i> </span> <span class="title"> {{ __('Print Resume') }} </span></a></li>
                <li><a href="{{ route('view.public.profile', Auth::user()->id) }}"> <span class="icon"> <i class="fas fa-eye" aria-hidden="true"></i> </span> <span class="title">{{ __('View Public Profile') }}</span>
                    </a>
                </li>
                <li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}"><a href="{{ route('my.job.applications') }}"> <span class="icon"> <i class="fas fa-desktop" aria-hidden="true"></i></span> <span class="title">
                            {{ __('My Job Applications') }}</span></a>
                </li>
                <li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}"><a href="{{ route('my.favourite.jobs') }}"> <span class="icon"> <i class="fas fa-heart" aria-hidden="true"></i></span> <span class="title">
                            {{ __('My Favourite Jobs') }}</span></a>
                </li>
                <li class="{{ Request::url() == route('my-alerts') ? 'active' : '' }}"><a href="{{ route('my-alerts') }}"> <span class="icon"> <i class="fas fa-bullhorn" aria-hidden="true"></i></span> <span class="title">
                            {{ __('My Job Alerts') }}</span></a>
                </li>
                <li><a href="{{ url('my-profile#cvs') }}"> <span class="icon"> <i class="fas fa-file" aria-hidden="true"></i></span> <span class="title">
                            {{ __('Manage Resume') }}</span></a>
                </li>
                <li class="{{ Request::url() == route('my.messages') ? 'active' : '' }}"><a href="{{ route('my.messages') }}"> <span class="icon"> <i class="fas fa-envelope" aria-hidden="true"></i></span> <span class="title">
                            {{ __('My Messages') }}</span></a>
                </li>
                <li class="{{ Request::url() == route('my.followings') ? 'active' : '' }}"><a href="{{ route('my.followings') }}"> <span class="icon"> <i class="fas fa-user" aria-hidden="true"></i></span> <span class="title">
                            {{ __('My Followings') }}</span></a>
                </li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="icon"><i class="fas fa-sign-out" aria-hidden="true"></i> </span> <span class="title">{{ __('Logout') }} </span> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


            </ul>
            <div class="toggle"></div>
        </div>
    </div>
</div>


