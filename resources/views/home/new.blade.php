@extends('home.layouts.master')
@section('title','Truyện mới')
@section('styles')
@parent
<link rel="stylesheet" href="{{ url('home') }}/css/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ url('home') }}/css/slider.css">
@endsection
@section('main')
    <div id="tabNew" class="tabNew">
        <div class="ms_feature_slider swiper">
                <div class="swiper-wrapper">
                @foreach ($genres as $genre)
                    <div class="swiper-slide slidebookgenre">
                        <div class="ms_genres_box">
                            <img class="img_theloai" src="{{ url('image_genres') }}/x0NYJ87pK.jpg"  alt="" class="">
                            <div class="ms_genres_box ten_theloai">
                                <a href="{{ urlGenre($genre->slug) }}" class="a_theloai" >{{ $genre->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="ms_top_artist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ms_heading"><h1>Truyện mới</h1></div>
                </div>

                @foreach ($books as $book)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-4 newbook">
                        <a class="ms_rcnt_box marger_bottom30" href="{{ urlBook($book->slug) }}">
                            <div class="ms_rcnt_box_img">
                                <img src="{{ isImgBook($book->image) }}" alt="" class="img-fluid">
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                    <div class="ms_play_icon"><img src="{{ url('home') }}/images/svg/play.svg" alt=""></div>
                                </div>
                                <div class="story_view"><i class="fa fa-headphones"></i> {{ $book->listens }}</div>
                            </div>
                            <div class="ms_rcnt_box_text"><h3><a href="{{ urlBook($book->slug) }}">{{ $book->name }}</a></h3></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
@parent
<script src="{{ url('home') }}/js/swiper-bundle.min.js" type="text/javascript"></script>
<script src="{{ url('home') }}/js/slider.js" type="text/javascript"></script>
@endsection
