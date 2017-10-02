<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vodacom Innovation Park</title>

    <link rel="canonical" href="http://www.innovationpark.co.ls" />
    <meta property="og:title" content="Vodacom Innovation Park" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.innovationpark.co.ls" />
    <meta property="og:image" content="{{asset('images/innovationpark.jpg')}}" />
    <meta property="og:description" content="The Innovation Park is an incubation and acceleration program for budding entrepreneurs in any area of business, that are looking to leverage the power of technology and mobile communications to differentiate, and make their businesses more competitive and productive." />

    <meta name="description" content="The Innovation Park is an incubation and acceleration program for budding entrepreneurs in any area of business, that are looking to leverage the power of technology and mobile communications to differentiate, and make their businesses more competitive and productive.">
    <meta name="keywords" content="Vodacom, Vodafone Innovation park, Vodacom Innovation Park">
    <meta name="application-name" content="Vodacom Innovation Park">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>

    <!--inject:css-->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{mix('css/front-theme-bundle.css')}}">
    <!--endinject-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css" />
</head>

<body id="top">
   <img class="logo-rhomby" src="{{asset('img/logo-rhomby.png')}}" alt="" />
    <div id="app">
        <!--inject:header:html-->
        <header id="header-" class="tt-nav transparent-header sticky">

    <div class="header-sticky light-header">

        <div class="container">

            <div id="materialize-menu" class="menuzord">

                <!--logo start-->
                {{--  <a href="./" class="logo-brand">
                    <img class="logo-dark" src="{{asset('img/logo.png')}}" alt="Logo" />
                    <img class="logo-light" src="{{asset('img/logo.png')}}" alt="Logo" />
                </a>  --}}
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu pull-right light">
                    <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                        <a href="{{route('pages.home')}}">Home</a>
                    </li>
                    <li {{ Request::is('about') ? ' class=active' : null }}>
                        <a href="{{route('pages.about')}}">About</a>
                    </li>
                    <li {{ Request::is('mentors') ? ' class=active' : null }}>
                        <a href="{{route('pages.mentors')}}">Mentors</a>
                    </li>
                    <li {{ Request::is('startups') ? ' class=active' : null }}>
                        <a href="{{route('pages.startups')}}">Startups</a>
                    </li>
                    <li {{ Request::is('heads-up') ? ' class=active' : null }}>
                        <a href="{{route('pages.heads-up')}}">Heads up</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
 @yield('content')

        <footer class="footer footer-four">
    <div class="primary-footer dark-bg lighten-4 text-center">
        <div class="container">

            <a href="#top" class="page-scroll btn-floating btn-large back-top waves-effect waves-light" data-section="#top">
                <i class="material-icons"></i>
            </a>
            <hr class="mt-15">
            <ul class="social-link tt-animate ltr mt-20">
                <li><a target="_blank" href="https://www.facebook.com/VodacomLesotho"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/VodacomLes"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="https://www.youtube.com/user/VodacomLesotho"><i class="fa fa-youtube"></i></a></li>
                <li><a target="_blank" href="https://plus.google.com/u/0/+VodacomLesothoVcl"><i class="fa fa-google-plus"></i></a></li>
            </ul>


            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <!-- /.primary-footer -->

    <div class="secondary-footer dark-bg lighten-3 text-center">
        <div class="container">
            <ul>
                <li>
                    <a href="{{route('pages.home')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('pages.about')}}">About</a>
                </li>
                <li>
                    <a href="{{route('pages.mentors')}}">Mentors</a>
                </li>
                <li>
                    <a href="{{route('pages.startups')}}">Startups</a>
                </li>
            </ul>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.secondary-footer -->
</footer>

    </div>


   <script src="{{mix('vendor/bundle.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    @yield('page-script')

</body>

</html>
