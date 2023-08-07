<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ url('home') }}/images/logo.png" rel="shortcut icon" type="image/x-icon">
    @section('styles')
    {{-- <link rel="stylesheet" href="{{ url('home') }}/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="{{ url('home') }}/css/custom_bootstrap.css">
    <link rel="stylesheet" href="{{ url('admins') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ url('home') }}/css/main.css">
    @show

</head>
<body>

<!--Loader-->
	{{-- <div id="ms_loader_chap" class="ms_loader" >
		<div class="wrap" >
		<img src="{{ url('home') }}/images/loader.gif" alt="">
		</div>
	</div>
    <div  id="ms_loader" class="ms_loader">
        <div class="ms_bars">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div> --}}
<!--End Loader-->


<!--Body content-->
<div class="ms_main_wrapper">

    <!--Slide Menu-->
    @include('home.layouts.slide_menu')
    <!--End Slide Menu-->

    <!--Content wrapper-->
    <div class="ms_content_wrapper ">

        <!--Header-->
            @include('home.layouts.header_login')
        <!--End Header-->

        <!--Main-->
        <div id="main_content">
        @yield('main')
        </div>
        <!--End Main-->
    </div>
    <!--End Content wrapper-->

    <!--Footer-->
   @include('home.layouts.footer_audio')
    <!--End Footer-->
</div>
<!--End Body Content-->



@section('script')
    <script src="{{ url('admins') }}/plugins/jquery/jquery.min.js"></script>
@show
</body>
</html>

<script>
$(document).ready(function() {
    //Open menu
    $(".ms_nav_close").on('click', function() {
        $(".ms_sidemenu_wrapper").toggleClass('open_menu');
    });

    //Modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    if( btn !== null){
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
});
</script>
