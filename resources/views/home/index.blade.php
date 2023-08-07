@extends('home.layouts.master')
@section('title','Trang Chủ')
@section('styles')
@parent
<link rel="stylesheet" href="{{ url('home') }}/css/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ url('home') }}/css/slider.css">
@endsection

@section('main')

<div  class="ms_featured_slider">
    <div class="ms_heading">
        <h1>TRUYỆN MỚI CẬP NHẬP</h1>
    </div>
    <div class="ms_feature_slider swiper">
            <div class="swiper-wrapper" >
                @foreach ($getupdates as $book)
                <div class="swiper-slide slidebookgenre" >
                    <a class="ms_rcnt_box" href="{{ urlBook($book->slug) }}">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ isImgBook($book->image) }}" alt="">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_play_icon"><img src="{{ url('home') }}/images/svg/play.svg" alt=""></div>
                            </div>
                            <div class="story_view"><i class="fa fa-headphones"></i> {{ $book->listens }} </div>
                        </div>
                        <div class="ms_rcnt_box_text"><h3><a href="{{ urlBook($book->slug) }}">{{ $book->name }}</a></h3></div>
                    </a>
                </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
</div>

<div  class="ms_featured_slider">
    <div class="ms_heading">
        <h1>TRUYỆN NGHE NHIỀU NHẤT</h1>
    </div>
    <div class="ms_feature_slider swiper">
            <div class="swiper-wrapper" >
                @foreach ($getlistens as $book)
                <div class="swiper-slide slidebookgenre" >
                    <a class="ms_rcnt_box" href="{{ urlBook($book->slug) }}">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ isImgBook($book->image) }}" alt="">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_play_icon"><img src="{{ url('home') }}/images/svg/play.svg" alt=""></div>
                            </div>
                            <div class="story_view"><i class="fa fa-headphones"></i> {{ $book->listens }} </div>
                        </div>
                        <div class="ms_rcnt_box_text"><h3><a href="{{ urlBook($book->slug) }}">{{ $book->name }}</a></h3></div>
                    </a>
                </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
</div>
 @foreach ($genres as $genre)
    <div  class="ms_featured_slider">
        <div class="ms_heading">
            <h1>TRUYỆN {{ $genre->name }}</h1>
            <span class="veiw_all" >
                <a href="{{urlGenre($genre->slug) }}" class="btnHomeMore"  title="{{ $genre->name }}" href="#">Xem thêm</a>
            </span>
        </div>

        <div class="ms_feature_slider swiper">
            <div class="swiper-wrapper" >
                @foreach ($genre->Book as $book)
                <div class="swiper-slide slidebookgenre" >
                    <a class="ms_rcnt_box" href="{{ urlBook($book->slug) }}">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ isImgBook($book->image) }}" alt="">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_play_icon"><img src="{{ url('home') }}/images/svg/play.svg" alt=""></div>
                            </div>
                            <div class="story_view"><i class="fa fa-headphones"></i> {{ $book->listens }} </div>
                        </div>
                        <div class="ms_rcnt_box_text"><h3><a href="{{ urlBook($book->slug) }}">{{ $book->name }}</a></h3></div>
                    </a>
                </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>


    </div>
@endforeach



@endsection
@section('script')
@parent
<script src="{{ url('home') }}/js/swiper-bundle.min.js" type="text/javascript"></script>
<script src="{{ url('home') }}/js/slider.js" type="text/javascript"></script>
@endsection
