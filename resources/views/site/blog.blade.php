@extends('site.include.layout')
@section('content')
<main id="content" class="site-main">
    <!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
       <div class="inner-baner-container" style="background-image: url({{ it()->url(setting()->logo) }});">
        
       </div>
    </section>
    <!-- Inner Banner html end-->
    <div class="archive-section blog-archive">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 primary right-sidebar">
                <!-- blog post item html start -->
                <div class="grid blog-inner row">

                    @foreach ($videos as $index=>$video)

                        <div class="grid-item col-md-4">
                            <article class="post">
                                <figure class="feature-image">
                                    <a href="{{route('show',$video->id)}}">
                                        <img src="{{asset('storage/'.$video->image)}}" alt="">
                                </a>
                            </figure>
                            <div class="entry-content">
                                <h3>
                                <a href="{{route('show',$video->id)}}">{{$video->title}}</a>
                                </h3>

                                <div class="entry-meta">

                                </div>
                            </div>
                        </article>
                    </div>
                   @endforeach

                </div>
             </div>

          </div>
       </div>
    </div>
 </main>
@endsection

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@endsection
