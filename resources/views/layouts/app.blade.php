<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vodacom Foundation') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{mix('css/paper-theme.css')}}">
    <link rel="stylesheet" href="{{mix('css/vendor.css')}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-primary navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                 @if (!Auth::guest())
                    <ul class="nav navbar-nav">
                        <li>
                            <li><a href="http://portal.innovationpark.co.ls/" target="_blank">Applications</a></li>
                            {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Applications <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('application.sessions.list')}}">Cohorts</a></li>
                                <li><a href="">Applicatants</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Settings</li>
                                <li><a href="{{route('questions.list')}}">Questions</a></li>
                                <li><a href="{{route('questions.categories.list')}}">Question Categories</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="{{ route('partner.list') }}">Partners</a></li>
                        <li><a href="{{ route('mentor.list') }}">Mentors</a></li>
                        <li><a href="{{ route('startup.list') }}">Startups</a></li>
                        <li><a href="{{ route('slideshow.list') }}">Sliders</a></li>
                        <li><a href="{{ route('heads-up.list') }}">Heads up</a></li>
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="{{ mix('vendor/bundle.js') }}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    {{--  <script src="{{asset('vendor/summernote/summernote.min.js')}}"></script>  --}}
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('page-script')
</body>
</html>
