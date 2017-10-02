@extends('layouts.front')
@section('content')
<section class="page-title padding-top-90 color-vodacom">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12 ">
                          <h2>{{$article->title}}</h2>
                      </div>
                  </div>
              </div>
          </section>
          <section class="padding-top-30 padding-bottom-70 ">
              <div class="container">
                  <div class="row">
                    <img class="pull-left margin-10" src="{{Storage::url($article->image_path)}}" alt="">
                    <div class="">
                        {!! $article->body!!}
                    </div>
                  </div>

              </div>

          </section>
@endsection
