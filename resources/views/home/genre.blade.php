@extends('home.layouts.master')
@section('title','Thể Loại')
@section('main')
<div class="ms_top_artist">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="ms_heading"><h1>Thể loại</h1></div>
            </div>

            @foreach ($genres as $genre)
            <div class="col-lg-3 col-md-3 col-sm-4 col-4" >
                <a href="{{ urlGenre($genre->slug) }}" >
                <div class="ms_genres_box" title="{{ $genre->name }}">
                    <img src="{{ url('image_genres') }}/x0NYJ87pK.jpg" class="img_theloai2">
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div vertical-center" >
                            <span class="ovrly_text1">{{ $genre->name }}</></span>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
