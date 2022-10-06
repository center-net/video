@extends('site.include.layout')
@section('content')
    <!-- home banner section html start -->
    <section class="home-banner" style="background-image: url({{ asset('site/assets/images/unbound-img1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="banner-content">
                        <h2 class="banner-title">{{trans('general_tran.Contribute')}}
                        </h2>
                        <div class="banner-text">
                            <p>{{trans('site_trans.notes')}}</p>
                        </div>
                        <div class="banner-button">
                            <a href="{{ route('donte') }}" class="button-round">{{trans('general_tran.Donate_Now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- home banner section html end -->
    <!-- home client section html start -->

    <!-- home client section html end -->
    <!-- home donate section html start -->



        <!-- home blog section html start -->
        <section class="home-blog">
            <h2 class="section-title text-center" style="color: #f15b43;">{{trans('initiatives_tran.initiatives')}}</h2>

            <div class="container">
                <div class="section-head d-sm-flex align-items-center justify-content-between">
                    <div class="head-wrap">
                        <div class="sub-title"></div>
                        <h3 class="section-title">{{trans('site_trans.achievements')}}({{trans('initiatives_tran.initiatives')}})</h3>
                    </div>
                    <div class="head-btn">
                        <a href="{{ route('blog') }}" class="button-round">{{trans('site_trans.View_all')}}</a>
                    </div>
                </div>
                <div class="blog-inner">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <article class="post">
                                <figure class="feature-image">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('site/assets/images/P02299.jpg') }}" alt="">
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h3>
                                        <a href="blog-single.html"> توفير مساكن الأسر المحتاجة</a>
                                    </h3>
                                    <p>
                                        توفير مساكن الأسر المهمشة الذين لهم عزة نفس ندعمهم و نساعدهم في تكوين بيئة او فتح تأمين
                                        لهم
                                    </p>
                                    <div class="entry-meta">

                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="post">
                                <figure class="feature-image">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('site/assets/images/p45.jpg') }}" alt="">
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h3>
                                        <a href="blog-single.html">وجبات الإفطار في شهر رمضان
                                        </a>
                                    </h3>
                                    <p>
                                        تمت مبادرة في نهاية رمضان تم تقديم وجبات افطار و كسوة العيد للأطفال . </p>
                                    <div class="entry-meta">

                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="post">
                                <figure class="feature-image">
                                    <a href="blog-single.html">
                                        <img src="{{ asset('site/assets/images/P02267.jpg') }}" alt="">
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h3>
                                        <a href="blog-single.html">كسوة الأسر المحتاجة</a>
                                    </h3>
                                    <p>. تم تنفيذ حملة مبادرة كسوة كاملة للأسر المهمشة من اهل الخير, تواصل مع المناشدات باستمرار
                                        لحتى اللحظة متواجدين معهم </p>
                                    <div class="entry-meta">

                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home blog section html end -->
    <!-- home donate section html end -->
    <!-- home about section html start -->
    <section class="home-about" id="age">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="home-about-left">
                        <div class="home-about-image">
                            <img src="{{asset('site/assets/images/don.jpg')}}" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home-about-right">
                        <div class="home-about-content">
                            <h2 class="sub-title">{{trans('serves_tran.serves')}}</h2>

                            <div class="about-list">
                                <ul>
                                    @foreach ($serves as $index=>$serve)
                                        <li> {{$serve->title}}  </li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home about section html end -->

    <!-- home charity section html end -->

    <!-- home event section html start -->
    <section id="goal" class="home-event bg-light-grey">
        <div class="container">
           <div class="section-head text-center">
              {{-- <div class="sub-title">INVOLVE NOW</div> --}}
              <h2 class="section-title"> {{trans('targets_tran.targets')}}</h2>
           </div>
           <div class="event-inner">
              <div class="row align-items-center">
                 <div class="col-lg-5">
                    <article class="event-item event-item-bg" style="background-image: url({{asset('site/assets/images/unbound-img55.jpg')}});">

                       <div class="overlay"></div>
                    </article>
                 </div>
                 <div class="col-lg-7">
                    @foreach ($targets as $index=>$target)
                        <article class="event-item">
                            <div class="event-content">
                                <h3>{{trans('targets_tran.target')}} {{$index+1}}</h3>
                                <div class="event-meta">

                                </div>
                                <p>{{$target->title}} </p>
                            </div>
                            <div class="event-date">
                                <h4>{{$index+1}}</h4>
                            </div>
                        </article>
                    @endforeach

                 </div>
              </div>

           </div>
        </div>
     </section>

   <section class="home-contact" id="connect" style="background-image: url({{ asset('site/assets/images/form.jpg') }});">
    <div class="container">
        <h2 class="section-title text-center">{{ trans('site_trans.Communication_us') }}</p>
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="sub-title"> </div>
                <h2 class="section-title"></p>

            </div>
            <div class="col-lg-8">
                <div class="home-contact-form">
                    <form class="contact-form row" action="{{route('order')}}" method="POST">
                        @csrf
                        <div class="col-12 mb-4">
                            <input type="text" class="form-control" required name="name" placeholder="ادخل الاسم">
                        </div>
                        <div class="col-12 mb-4">
                            <input type="email" class="form-control" required name="email" placeholder="ادخل الايميل">
                        </div>
                        <div class="col-12 mb-4">
                            <input type="text" name="phone" class="form-control" placeholder="ادخل رقم الجوال">
                        </div>
                        <div class="col-12 mb-4">
                            <textarea name="description" id="" cols="5" rows="5"> </textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="button-round">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</section>
<!-- home contact section html end -->
    <!-- home callback section html start -->
    <section class="home-callback" id="team" style="background-image: url({{asset('site/assets/images/unbound-img2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <div class="callback-content">
                        <h2 class="section-title">{{ trans('site_trans.About_team') }}
                        </h2>
                        <br>
                        <h4>
                            {{$setting->team}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <img class="white-logo" src="{{asset('Upload/'.$setting->logo)}}" alt="logo">

                </div>

            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- home callback section html end -->
@endsection
