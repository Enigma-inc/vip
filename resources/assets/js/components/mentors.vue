<template>
    <section class="padding-bottom-110">
        <div class="container">

            <div class="text-center mb-80">
                <h2 class="section-title color-black" v-if="showTitle=='true'">Mentors</h2>
                <p class="section-sub color-black">Through our wide network of seasoned professionals, regionally and globally successful business people, and full access to the program’s and Vodacom’s vast expertise; you will receive world class business coaching
                 and mentoring during and after completion of the program. </p>
            </div>

            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img :src="mentorImage" class="img-responsive" alt="Image"></a>
                        </div>
                        <!-- /.team-img -->

                        <div class="team-title">
                            <h3><a href="#">Rishaad Tayob</a></h3>
                          <!--   <span>Position</span>
                            <p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing
                                id lobortis cum lacus erat. </p> -->
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
                <div class="col-sm-4 col-md-3">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img :src="mentorImage" class="img-responsive" alt="Image"></a>
                        </div>
                        <!-- /.team-img -->

                        <div class="team-title">
                            <h3><a href="#">Rhett Power</a></h3>
                         <!--   <span>Position</span>
                            <p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing
                                id lobortis cum lacus erat. </p> -->
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
                <div class="col-sm-4 col-md-3">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img :src="mentorImage" class="img-responsive" alt="Image"></a>
                        </div>
                        <!-- /.team-img -->

                        <div class="team-title">
                            <h3><a href="#">Tsepo Ntaopane</a></h3>
                       <!--   <span>Position</span>
                            <p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing
                                id lobortis cum lacus erat. </p> -->
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
                  <div class="col-sm-4 col-md-3">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img :src="mentorImage" class="img-responsive" alt="Image"></a>
                        </div>
                        <!-- /.team-img -->

                        <div class="team-title">
                            <h3><a href="#">Johnny Dos Santos</a></h3>
                       <!--   <span>Position</span>
                            <p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing
                                id lobortis cum lacus erat. </p> -->
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

            </div>


        </div>
        <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <p>If you are interested to become a mentor to the program, click the button below and let us have a chat! </p>
        </div>
        <div class="col-xs-12 margin-bottom-50" style="text-align:center">
            <a :href="mentorsPageLink" class="btn btn-lg vodacom waves-effect waves-light mt-30">
                      Become a Mentor
                    </a>
        </div>
    </section>
</template>
<script>
    export default {
        props:['showTitle'],
        data() {
            return {
                mentorImage: './img/mentor-pace-holder.jpg',
                mentorsPageLink:'./mentors'
            }
        }
    }

</script>

<style lang="scss">
    .color-black {
        color: #000 !important;
    }
    .team-title{
        h3{
            font-size:1.1em;
            text-align: center;
        }
    }
</style>