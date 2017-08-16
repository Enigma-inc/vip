<div id="slideshow" class="slideshow">
@foreach($slides as $slide)
     <section style="background-image:url({{$slide->slide_image}});height:400px;" class="slide-image"
                data-stellar-background-ratio="0.5">
                    <div class="slide-container">
                            <h1 class="slide-title text-uppercase white-text flex-item" style="z-index:20">{{$slide->title}}</h1>
                            <span class="sub-description lead white-text flex-item" style="z-index:20" >{{$slide->description}}</span>
                            <a target="_blank" href="{{$slide->button_link}}" style="z-index:20"  class="btn btn-lg vodacom waves-effect waves-light flex-item">
                                  Apply Now
                            </a>
        </div>
            

    </section>
@endforeach
</div>
