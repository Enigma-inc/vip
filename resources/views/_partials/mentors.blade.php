    <section class="padding-bottom-110 mentors-home-page">
        <div class="container">

            <div class="text-center mb-80">
                <h2 class="section-title color-black" >Mentors</h2>
                <p class="section-sub color-black">Through our wide network of seasoned professionals, regionally and globally successful business people, and full access to the program’s and Vodacom’s vast expertise; you will receive world class business coaching
                 and mentoring during and after completion of the program. </p>
            </div>

            <div class="row">
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
                         Nozipho Nonyana: is the Founder of NHA Group (comprising of Nonyana Hoohlo & Associates – a development consulting company founded in 2008; NHA Properties – a property management company; as well as Molumong EcoLodge). She is also the Founder and Chief Inspiration Officer at Dynamic Transformations – a personal development company geared towards empowering people to overcome the obstacles that hold them back from living the life that they desire and also a Personal Wellness Mentor. 
                        </div>

                    </div>
                    <!-- /.team-wrapper -->
                </div>
            @endforeach

            </div>


        </div>
        <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <p>If you are interested to become a mentor to the program, click the button below and let us have a chat! </p>
        </div>
        <div class="col-xs-12 margin-bottom-50" style="text-align:center">
            <a href="./mentors" class="btn btn-lg vodacom waves-effect waves-light mt-30">
                      Become a Mentor
                    </a>
        </div>
    </section>