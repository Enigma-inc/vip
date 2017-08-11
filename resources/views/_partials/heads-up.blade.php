    <section>
        <div id="headsups" class="headsup-container margin-bottom-20"> 
        @foreach($headsup as $item)
                <a target="_blank" href="{{$item->url}}">
                    <div class="headsup-container">
                        <div class="image-container" style="background-image: url('{{Storage::url($item->image_path)}}');">
                        </div>
                        <div class="title-container">
                            <p class="title">{{$item->title}}</p>
                        </div>
                    </div>
                </a>
        @endforeach
         </div>
    </section>