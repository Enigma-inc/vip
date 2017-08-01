  <section class="padding-bottom-110">
        <div class="container">

            <div class="text-center mb-80">
                <h2 class="section-title color-black">Our Partners</h2>
                <p class="section-sub color-black" style="width:100%">Our partners represent a wide variety of sectors and expertise, and are committed to developing entrepreneurship and driving socio-economic development through business. We strongly believe in forming meaningful partnerships to amplify the outcomes of the program and reach 
                as many Basotho entrepreneurs as possible.</p>
            </div>

            <div class="clients-grid gutter">
                <div class="row">
                   @foreach($partners as $partner)
                   
                         <div class="col-md-3 col-sm-6" >
                            <div class="border-box">
                                <a href="{{$partner->web_link}}" target="_blank">
                                    <img src="{{Storage::url($partner->logo_path)}}" alt="Partner">
                                </a>
                            </div>
                        </div>
                      
                   @endforeach               
                </div>
   
            </div>
         

        </div>
        <!-- /.container -->
    </section>