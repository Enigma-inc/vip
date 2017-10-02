@extends('layouts.front')
@section('content')
<section class="page-title padding-top-90 color-vodacom">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12 ">
                          <h2>Heads up</h2>
                      </div>
                  </div>
              </div>
          </section>
          <section class="padding-top-30 padding-bottom-70 about-page">
              <div class="container">
                  <div class="row">
                    @foreach($headsup as $item)
                      @if ($item->body)
                          <div  class="margin-bottom-20 col-xs-12 col-md-4">

                                  <a  href="{{route('pages.heads-up-single',['slug'=>$item->slug])}}" >
                                      <div class="headsup-container">
                                          <div class="image-container" style="background-image: url('{{Storage::url($item->image_path)}}');">
                                          </div>
                                          <div class="title-container">
                                              <p class="title">{{$item->title}}</p>
                                          </div>
                                      </div>
                                  </a>
                         </div>
                      @else
                        <div  class="margin-bottom-20 col-xs-12 col-md-4">

                                <a target="_blank" href="{{$item->url}}" >
                                    <div class="headsup-container">
                                        <div class="image-container" style="background-image: url('{{Storage::url($item->image_path)}}');">
                                        </div>
                                        <div class="title-container">
                                            <p class="title">{{$item->title}}</p>
                                        </div>
                                    </div>
                                </a>
                       </div>
                      @endif

                   @endforeach
                  </div>
                  <div class="row text-center">
                    {{$headsup->links()}}
                  </div>

              </div>

          </section>
@endsection
