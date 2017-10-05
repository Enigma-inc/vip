    <section>
        <div id="headsups" class="headsup-container margin-bottom-20">
        @foreach($headsup as $item)
            @if ($item->body)
              <a  href="{{route('pages.heads-up-single',['slug'=>$item->slug])}}">
                  <div class="headsup-container">
                      <div class="image-container" style="background-image: url('{{Storage::url($item->image_path)}}');">
                      </div>
                      <div class="title-container">
                          <p class="title">{{$item->title}}</p>
                      </div>
                  </div>
              </a>
            @else
                <a target="_blank" href="{{$item->url}}">
                    <div class="headsup-container">
                        <div class="image-container" style="background-image: url('{{Storage::url($item->image_path)}}');">
                        </div>
                        <div class="title-container">
                            <p class="title">{{$item->title}}</p>
                        </div>
                    </div>
                </a>
              @endif

        @endforeach
       </div>
    </section>
