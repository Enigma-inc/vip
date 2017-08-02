
 @extends('layouts.front')
  @section('content')
     <section class="page-title padding-top-90 color-vodacom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <h2>Mentors</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding-top-30 padding-bottom-70 mentors-home-page">
            <div class="container">
                <div class="row margin-top-20">
                    <p class="text-justify">
                        Through our wide network of seasoned professionals, regionally and globally successful business people, and full access to the program’s and Vodacom’s vast expertise; you will receive world class business coaching and mentoring during and after completion of the program.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                               @foreach($mentors as $mentor)
                      <div class="col-xs-12" >
                    <div class="team-wrapper">
                        <div class="mentor-header-details">
                            <div class="team-img">
                                <a href="#"><img src="{{Storage::Url($mentor->image_path)}}" class="img-responsive" alt="Image"></a>
                            </div>
                            <!-- /.team-img -->

                            <div class="team-title">
                                <h3><a href="#">{{$mentor->name}}</a></h3>
                                  <ul>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                  </ul>
                            </div>
                            <!-- /.team-title -->

                          
                        </div >
                        <div class="mentor-body-details">
                         {!! $mentor->bio!!}
                        </div>

                    </div>
                    <!-- /.team-wrapper -->
                </div>
            @endforeach

                    </div>
                </div>
            
            </div>
            <!-- /.container -->
        </section>
  @endsection

  