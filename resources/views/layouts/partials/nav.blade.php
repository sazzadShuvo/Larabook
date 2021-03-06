<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ Auth::check() ? route('status.index') : url('/') }}">Larabook</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li class="{{ Request::is('users/list') ? 'active' : '' }}"><a href="{{ route('users.list') }}">Browse Users <span class="sr-only">(current)</span></a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img id="profile-image" src="{{ Auth::user()->present()->gravatar(Auth::user()->email, 30) }}" alt="{{ Auth::user()->username }}">
                            {{ ucfirst(Auth::user()->username) }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.profile', Auth::user()->username) }}">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('auth.logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout_form').submit();">
                                    Logout
                                </a>
                                <form id="logout_form" action="{{ route('auth.logout') }}" method="POST" style="display: none">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="{{ Request::is('auth/register') ? 'active' : '' }}"><a href="{{ route('auth.register') }}">Register</a></li>
                    <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="{{ route('auth.login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>