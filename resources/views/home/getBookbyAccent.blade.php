@extends('home.layouts.master')
@section('title',$accent->name)
@section('main')
    <div class="ms_top_artist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ms_heading"><h1>{{ $accent->name }}</h1></div>
                </div>

                @foreach ($accent->Book as $book)
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
