<div class="ms_header" >
    <div class="ms_top_btn">
        @if(!Auth::check())
            <button class="ms_btn login_btn" id="myBtn">Đăng nhập</button>

            <div id="myModal" class="modal centered-modal" role="dialog" >
                <div class="modal-dialog login_dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="fa_icon form_close"></i>
                        </button>
                        <div class="modal-body">
                            <div class="ms_register_img">
                                <img src="{{ url('home') }}/images/register_img.png" alt="" class="img-fluid">
                            </div>
                            <div class="ms_register_form">
                                <a href="{{ route('facebook.login') }}" class="ms_btn btn-primary"><span>Facebook</span></a>
                                <a href="{{ route('google.login') }}" class="ms_btn btn-danger"><span>Google+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <a href="{{ route('homelogout') }}" class="ms_btn login_btn">Đăng xuất</a>
        @endif
    </div>
</div>
