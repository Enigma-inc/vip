<template>
  <div>
    <section v-if="showBrief == 'true'" v-bind:style="{ backgroundImage: 'url(' + startupsBgImage + ')' }" class="padding-top-50 margin-top-30 padding-bottom-20 grid-news-hover pre-banner-1 bg-fixed parallax-bg fullscreen-banner valign-wrapper overlay"
        data-stellar-background-ratio="0.5" style="background-position: 0% -513px; height: 315px;">
        <div class="container">

            <div class="text-center mb-20">
                <h2 class="section-title">Startups</h2>
                <p class="section-sub">The companies that have been through the Vodacom Innovation Park cut across multiple sectors, including Agriculture, Data Mining, ICT companies, as well as Retail and Services Business.  They have become successful and driven innovation in each of their areas in various ways. Below are some of the companies we have supported to success;
                click on the links to visit their websites and pages to learn more about each. </p>
            </div>


     
            <div class="row"> 
                     <div class="col-sm-6 col-md-4 item" v-for="(startup, index) in startups" v-if="index <=2 " :key="startup.id">
                    <article class="post-wrapper card">
                        <div class="thumb-wrapper waves-effect waves-block waves-light">
                            <a href="#"><img :src="startup.logo" class="img-responsive" alt=""></a>
                        </div>
                        <!-- .post-thumb -->

                        <div class="blog-content">

                            <div class=""></div>

                            <header class="entry-header-wrapper sticky">
                                <div class="entry-header text-center">
                                    <h2 class="entry-title"><a href="#">{{startup.name}}</a></h2>
                                </div>
                                <!-- /.entry-header -->
                            </header>
                            <!-- /.entry-header-wrapper -->

                            <div class="entry-content text-justify padding-10" style="height: 220px;overflow-y:auto;">
                                <p v-html="startup.description"></p>
                            </div>
                            <!-- .entry-content -->

                        </div>
                        <!-- /.blog-content -->

                    </article>
                    <!-- /.post-wrapper -->
                </div>
               <div class="col-xs-12" style="text-align:center">    
                      <a :href="startupsPageLink"  class="btn btn-lg vodacom waves-effect waves-light mt-30">
                      View More
                    </a>
               </div>
            </div>
          
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
  </div>
</template>
<script>

    export default {
        props:['showBrief'],
        data() {
            return {
                startups: [],
                startupsBgImage:'./img/startups-cover.jpg',
                startupsPageLink:"./startups"

            }
        },
        methods: {
        },
        created:onCreate(),
        mounted() {

            //GET LIST OF STARTUPS
            axios.get('../api/startups').then(res => {
                if (res.data) {
                    console.log();
                    this.startups = res.data;
                }
            });

            
        }
    }

    function onCreate(){
        
    }

</script>
<style lang="scss">
    .entry-content {
        font-size: 0.9em;
    }
    
    .entry-title {
        font-size: 1em !important;
    }
    
    .entry-header {
        margin-bottom: 0 !important;
    }
    
    .blog-content {
        padding: 10px 10px 0 !important;
        /*  border: 1px solid rgba(255, 0, 0, 0.1) !important;*/
        p {
            line-height: 22px !important;
        }
    }
    
    .pre-banner-1 {
        background-image: url(/assets/img/pre-banner-1.jpg);
     
    }
    .blur{
           -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
        z-index:-10;
    }
    .section-title {
        font-size: 60px;
        line-height: 80px;
        letter-spacing: -1px;
        display: block;
        color: #fff;
        font-weight: 500;
        text-shadow: 0px 4px 3px rgba(0, 0, 0, 0.4), 0px 8px 13px rgba(0, 0, 0, 0.1), 0px 18px 23px rgba(0, 0, 0, 0.1);
    }
    
     .section-sub {
        color: #fff !important;
        font-weight: 300;
    }
</style>