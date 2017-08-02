
 @extends('layouts.front')
  @section('content')
     <section class="page-title padding-top-100 color-vodacom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <h2>Startups</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding-top-30 padding-bottom-70 mentors-home-page">
            <div class="container">
                <div class="row margin-top-20">
                    <p class="text-justify">
                        The companies that have been through the Vodacom Innovation Park cut across multiple sectors, including Agriculture, Data Mining, ICT companies, as well as Retail and Services Business. They have become successful and driven innovation in each of their areas in various ways. Below are some of the companies we have supported to success; 
                        click on the links to visit their websites and pages to learn more about each.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-12">
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

                    </div>
                </div>
            
            </div>
            <!-- /.container -->
        </section>
  @endsection

  