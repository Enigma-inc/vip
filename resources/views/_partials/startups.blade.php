    <section style="background-image: url('./img/startups-cover.jpg')" class="padding-top-50 margin-top-30 padding-bottom-20 grid-news-hover pre-banner-1 bg-fixed parallax-bg fullscreen-banner valign-wrapper overlay home-page-startups"
        data-stellar-background-ratio="0.5" style="background-position: 0% -513px; height: 315px;">
        <div class="container">

            <div class="text-center mb-20">
                <h2 class="section-title">Startups</h2>
                <p class="section-sub">The companies that have been through the Vodacom Innovation Park cut across multiple sectors, including Agriculture, Data Mining, ICT companies, as well as Retail and Services Business.  They have become successful and driven innovation in each of their areas in various ways. Below are some of the companies we have supported to success;
                click on the links to visit their websites and pages to learn more about each. </p>
            </div>


     
            <div class="row"> 
            @foreach($startups as $startup)
            
                <div class="col-xs12 col-sm-6 col-md-4 item">
                    <article class="post-wrapper card">
                        <div class="thumb-wrapper waves-effect waves-block waves-light">
                            <a href="#"><img src="{{$startup->logo}}" class="img-responsive" alt=""></a>
                        </div>
                        <!-- .post-thumb -->

                        <div class="blog-content">

                            <div class=""></div>

                            <header class="entry-header-wrapper sticky">
                                <div class="entry-header text-center">
                                    <h2 class="entry-title"><a href="#">{{$startup->name}}</a></h2>
                                </div>
                                <!-- /.entry-header -->
                            </header>
                            <!-- /.entry-header-wrapper -->

                            <div class="entry-content text-justify padding-10" style="height: 210px;overflow-y:auto;">
                                <p>{{$startup->about}}</p>
                            </div>
                            <!-- .entry-content -->

                        </div>
                        <!-- /.blog-content -->

                    </article>
                    <!-- /.post-wrapper -->
                </div>
                @endforeach
               <div class="col-xs-12" style="text-align:center">    
                      <a href="./startups"  class="btn btn-lg vodacom waves-effect waves-light mt-30">
                      View More
                    </a>
               </div>
            </div>
          
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>