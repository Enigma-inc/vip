 @extends('layouts.front')
  @section('content')
        @include('_partials.slideshow') 
        @include('_partials.heads-up') 
        @include('_partials.startups') 
         @include('_partials.mentors') 
         @include('_partials.partners') 
  @endsection

  @section('page-script')
  <script>
        $(document).ready(function(){
          $('#slideshow').slick({
            autoplay:true,
            autoplaySpeed:8000,
            fade:true,
            speed:3000
          });
          $('#headsups').slick({
                slidesToShow: 4,
                autoplay:true,
                dots:true,
                  responsive: [
                                {
                                  breakpoint: 1024,
                                  settings: {
                                    slidesToShow: 3
                                  }
                                },
                                {
                                  breakpoint: 600,
                                  settings: {
                                    slidesToShow: 2
                                  }
                                },
                                {
                                  breakpoint: 480,
                                  settings: {
                                    slidesToShow: 1
                                  }
                                }
                              ]
          });
        });
  </script>

          
  @endsection