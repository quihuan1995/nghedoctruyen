@extends('home.layouts.master')
@section('title',$book->name)
@section('main')
@section('styles')
@parent
<link rel="stylesheet" href="{{ url('home') }}/css/detail.css" >
@endsection
{{-- <input type="hidden" id="numbersong" value="{{ count($book->Chap) - 1 }}"> --}}
<div class="ms_top_artist">
    <div class="container-fluid">
        <div class="main-content main-category">
            <div class="col-left">
                <img width="450" height="675" src="{{ isImgBook($book->image) }}" sizes="(max-width: 450px) 100vw, 450px" class="thum-post">
                    {{-- <div class="rate">
                        <input type="checkbox" name="rate1" id="rate1" value="0" class="checkboxs">
                        <label for="rate1" class="fa fa-star rate1 {{ $book->rate == 1 || $book->rate == 2 || $book->rate == 3 || $book->rate == 4 || $book->rate == 5  ? "orange" : "" }}"></label>
                        <input type="checkbox" name="rate2" id="rate2" value="0" class="checkboxs">
                        <label for="rate2" class="fa fa-star rate2 {{ $book->rate == 2 || $book->rate == 3 || $book->rate == 4 || $book->rate == 5 ? "orange" : "" }}"></label>
                        <input type="checkbox" name="rate3" id="rate3" value="0" class="checkboxs">
                        <label for="rate3" class="fa fa-star rate3 {{  $book->rate == 3 || $book->rate == 4 || $book->rate == 5 ? "orange" : "" }}"></label>
                        <input type="checkbox" name="rate4" id="rate4" value="0" class="checkboxs">
                        <label for="rate4" class="fa fa-star rate4 {{ $book->rate == 4 || $book->rate == 5 ? "orange" : "" }}"></label>
                        <input type="checkbox" name="rate5" id="rate5" value="0" class="checkboxs">
                        <label for="rate5" class="fa fa-star rate5 {{ $book->rate == 5 ? "orange" : "" }}"></label>

                        <input type="hidden" id="slug" value="{{ $book->slug }}">
                    </div> --}}
                <div class="info-post">
                    <span>Tác Giả : <p> <a href="{{ urlAuthor($book->Author->slug) }}" > {{ $book->Author->name }} </a></p></span>
                    <span>Giọng đọc : <p><a href="{{ urlAccent($book->Accent->slug) }}" > {{ $book->Accent->name }} </a></p></span>
                    <span>Tình trạng : <p> {{ $book->status }} </p></span>
                    <span>Thể loại :
                        @foreach ($book->Genre as $genre)
                            <a href="{{ urlGenre($genre->slug) }}" > {{ $genre->name }}</a> -
                        @endforeach
                    </span>
                </div>
                <div class="content">
                    <h3 class="content-post-title">Nội dung truyện </h3>
                    <p>{{ $book->content }}</p>
                </div>
            </div>
            <div class="col-right">
                <div class="title-post">
                    <span class="icon-main-post"> </span>
                    <div class="title-post-mc"> <h1>{{ $book->name }}</h1> </div>
                </div>

                <div id="jquery_jplayer_1" class="jp-jplayer" >
                    <audio id="jp_audio" preload="metadata" src="" title=""></audio>
                </div>
                <div class="play-audio">
                    <div id="jp_container_1" class="jp-audio" aria-label="media player" role="application">
                        <div class="jp-type-playlist">
                            <div class="jp-gui jp-interface">
                                <div class="jp-controls">
                                    <div class="play-audio-button">
                                        <button id="btn_prev" class="jp-previous fa fa-backward" role="button" tabindex="0"></button>
                                        <button id="btn_play" class="jp-play fa fa-play firstplay" role="button" tabindex="0"></button>
                                        <button id="btn_next" class="jp-next fa fa-forward" role="button" tabindex="0"></button>
                                    </div>
                                    <div class="jp-progress">
                                        <div class="jp-seek-bar" id="progress-container" style="width: 100%;">
                                            <div class="jp-play-bar" id="progress"></div>
                                        </div>
                                    </div>
                                    <div class="jp-time-holder">
                                        <div id="currTime" class="jp-current-time" role="timer" aria-label="time">0:00:00</div>
                                        <div id="durTime" class="jp-duration" role="timer" aria-label="duration">0:00:00</div>
                                        {{-- <div id="thetimeAudio">00:00:00 - 00:00:00</div> --}}
                                    </div>
                                </div>
                                <div class="jp-playlist">
                                    <ul>
                                        @foreach ($book->Chap as $chap)
                                            <li class="jp-playlist-item" onclick="choosesong(this)" data-audio="http://truyenhan.top/audios/{{ $chap->audio }}" data-title="{{ $chap->name }}">{{ $chap->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zingtua">
                        <button class="btnspeed" onclick="speed05(this)">x0.5</button>
                        <button class="btnspeed" onclick="speed1(this)">x1</button>
                        <button class="btnspeed" onclick="speed15(this)">x1.5</button>
                        <button class="btnspeed" onclick="speed2(this)">x2</button>
                    </div>
                </div>

                @php
                    if(Auth::check()){
                        $user_id = Auth::user()->id;
                        $avatar = isAvatar(Auth::user()->avatar);
                    }else{
                        $user_id = 0;
                        $avatar = '/avatar_users/no-avatar.png';
                    }
                @endphp


                <div class="comment" id="wpdcom">
                    <div class="wpd-form wpd-form-wrapper wpd-main-form-wrapper" >
                        <form method="POST" action="{{ route('home.book.comment') }}" onsubmit="return validate()">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <div class="wpd-field-comment">
                                <div class="wpdiscuz-item wc-field-textarea">
                                    <div class="wpdiscuz-textarea-wrap wpd-txt">
                                        <div class="wpd-avatar">
                                            <img alt="guest" src="{{ $avatar }}"  class="avatar avatar-56 photo avatar-default" height="56" width="56" loading="lazy" decoding="async">
                                        </div>
                                        <div class="wpd-textarea-wrap">
                                            <label style="display: none;" for="wc-textarea-0_0">Label</label>
                                            <textarea id="wc-textarea" pattern=".{10,500}" maxlength="500" placeholder="Bình Luận..." aria-label="Bình Luận..." name="comment" class="wc_comment wpd-field"></textarea>
                                            <div class="autogrow-textarea-mirror" >.<br>.</div>
                                        </div>
                                        <div class="wpd-editor-buttons-right"> </div>
                                    </div>
                                    <button type="submit" class="wc_comm_submit wpd_not_clicked wpd-prim-button">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="wpd-threads" class="wpd-thread-wrapper">
                        <div class="wpd-thread-head">
                            <div class="wpd-thread-info"> <span class="wpdtc" title="2">{{ count($book->Comment) }}</span> Bình Luận </div>
                        </div>
                        <div class="wpd-comment-info-bar"></div>
                        <div class="wpd-thread-list">

                            @foreach ($book->Comment as $comment)
                                <div id="wpd-comm-{{ $comment->id }}" class="comment even thread-even depth-1 wpd-comment wpd_comment_level-1">
                                    <div class="wpd-comment-wrap wpd-blog-guest">
                                        <div id="comment-2749" class="wpd-comment-right">
                                            <div class="wpd-comment-header">
                                                <div class="wpd-avatar ">
                                                    <img src="{{ isAvatar($comment->User->avatar) }}" class="avatar avatar-64 photo" height="64" width="64" loading="lazy" decoding="async">
                                                </div>
                                                <div class="wpd-user-info">
                                                    <div class="wpd-uinfo-top"><div class="wpd-comment-author "> {{ $comment->User->name }}</div></div>
                                                        <div class="wpd-uinfo-bottom wpd-comment-date">
                                                            <i class="far fa-clock" aria-hidden="true"></i>
                                                            @php $time = str_totime($comment->created_at)  @endphp
                                                            {{ date('d-m-Y',$time) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpd-comment-text"> <p>{{ $comment->comment }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
@parent
<script src="{{ url('home') }}/js/detail_book.js" type="text/javascript"></script>
@endsection
