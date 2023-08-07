<div class="ms_sidemenu_wrapper">
        <div class="ms_nav_close">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </div>
        <div class="ms_sidemenu_inner">
            <div class="ms_logo_inner">
                <div class="ms_logo">
                    <a class='btnHome' href="{{ route('home') }}"><img src="{{ url('home') }}/images/logo.png" style='height: 50px;width: 50px;' alt="" class="img-fluid"/></a>
                </div>
                <div class="ms_logo_open">
                    <br>
                    <a class='btnHome' href="{{ route('home') }}"><img src="{{ url('home') }}/images/logo.png" style='margin-left: 20%; height: 50px;width: 50px;' alt="" class="img-fluid"/></a>
                    <br>
                    <br>
                    <h1 style='font-size: 18px'>Nghe Đọc Truyện</h1>
                    <br>
                </div>
            </div>
            <div class="ms_nav_wrapper">
                <ul>
                    <li>
                        <a class="btnHome {{ (Request::routeIs('home')) ? 'active' : '' }}" href="{{ route('home') }}" title="Trang chủ">
                            <span class="nav_icon"><span class="icon icon_discover"></span></span>
                            <span class="nav_text">Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a class="btnNew {{ (Request::routeIs('home.new')) ? 'active' : '' }}" href="{{ route('home.new') }}" title="Truyện mới">
                            <span class="nav_icon"><span class="icon icon_albums"></span></span>
                            <span class="nav_text">Truyện Mới</span>
                        </a>
                    </li>
                    <li>
                        <a class="btnGenre {{ (Request::routeIs('home.genre') || Request::routeIs('home.genre.getBookbyGenre') || Request::routeIs('home.book')) ? 'active' : '' }}" href="{{ route('home.genre') }}" title="Thể loại">
                            <span class="nav_icon"><span class="icon icon_genres"></span></span>
                            <span class="nav_text">Thể Loại</span>
                        </a>
                    </li>
                    <li>
                        <a class="btnFilter {{ (Request::routeIs('home.filter')) ? 'active' : '' }}" href="{{ route('home.filter') }}" title="Tìm Truyện">
                            <span class="nav_icon"><span class="icon icon_station"></span></span>
                            <span class="nav_text">Tìm Truyện</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://play.google.com/store/apps/details?id=net.iris.nghedoctruyen" target="blank" class="foo_app_btn">
                            <img src="{{ url('home') }}/images/google_play_.jpg" alt="" class="img-fluid">
                        </a>
                        <a href="https://apps.apple.com/vn/app/id1484431761" target="blank" class="foo_app_btn">
                            <img src="{{ url('home') }}/images/apple_store.jpg" alt="" class="img-fluid">
                        </a>
                        <a href="https://www.facebook.com/nghedoctruyen360" target="blank" class="foo_app_btn">
                            <img src="{{ url('home') }}/images/conteact_error.jpg" alt="" class="img-fluid">
                        </a>
                        <label class="online" ></label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
