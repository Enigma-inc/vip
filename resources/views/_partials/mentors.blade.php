    <section class="padding-bottom-110">
        <div class="container">

            <div class="text-center mb-80">
                <h2 class="section-title color-black" >Mentors</h2>
                <p class="section-sub color-black">Through our wide network of seasoned professionals, regionally and globally successful business people, and full access to the program’s and Vodacom’s vast expertise; you will receive world class business coaching
                 and mentoring during and after completion of the program. </p>
            </div>

            <div class="row">
            @foreach($partners as $partner)
                      <div class="col-sm-4 col-md-3" >
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img src="./img/mentor-pace-holder.jpg" class="img-responsive" alt="Image"></a>
                        </div>
                        <!-- /.team-img -->

                        <div class="team-title">
                            <h3><a href="#">{{$partner->name}}</a></h3>
                        </div>
                        <!-- /.team-title -->

                        <ul class="team-social-links list-inline text-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                        </ul>

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