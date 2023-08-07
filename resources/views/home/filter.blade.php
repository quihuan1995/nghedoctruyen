@extends('home.layouts.master')
@section('title','Tìm kiếm')
@section('styles')
@parent
<link rel="stylesheet" href="{{ url('admins') }}/plugins/select2/css/select2.min.css" >
<style>

</style>
@endsection
@section('main')
<div class="ms_top_artist" id="tabFilter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h1>Tìm Kiếm Truyện</h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <input id="inputTitle" type="text" class="form-control" placeholder="Tên truyện...">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="form-group">
                    <button id="btnFilterTitle" onclick="ajax_search()" class="form-control">Tìm Truyện</button>
                </div>
            </div>


            <div style="margin-top: 25px;" class="col-12">
                <div class="ms_heading">
                    <h1>Lọc Truyện</h1>
                </div>
            </div>
            <!--<div class="col-lg-2 col-md-3 col-sm-6 col-12">-->
            <!--    <select id="status" name="status" class="form-control">-->
            <!--        <option value="">- Trạng Thái -</option>-->
            <!--        <option value="full">Trọn bộ</option>-->
            <!--        <option value="pending">Đang ra</option>-->
            <!--    </select>-->
            <!--</div>-->
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <select id="genre_id" name="genre" class="form-control">
                    <option>- Thể Loại -</option>
                    @foreach ($genres as $genre)
                    <option class="genre_id_data" value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <select id="sort" name="sort" class="form-control">
                    <option >- Sắp Xếp -</option>
                    <option value="view">Lượt nghe</option>
                    <option value="new">Mới cập nhật</option>
                    <option value="abc">A-Z</option>
                </select>
            </div>
            {{-- <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="form-group">
                    <button onclick="ajax_filter(this)" id="btnFilterNow" class="form-control" style="background: #3bc8e7; color: white;">Lọc Truyện</button>
                </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div style="padding-top: 10px;">
                    <span id="msg_filter" style="color: white;"></span>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="ms_top_artist filter1">
    <div class="container-fluid">
        <div class="row filter2">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h1 id="thekey"></h1>
                </div>
            </div>

            <div id="showbooks"> </div>
        </div>
    </div>
</div>


@endsection
@section('script')
@parent
<script src="{{ url('admins') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script>
function ajax_search(){
    var key = $('#inputTitle').val();
    $("#msg_filter").empty();
    $('#showbooks').empty();
    $.ajax({
        url:"/ajax_search",
        method:"GET",
        async: false,
        cache: false,
        data:{key:key},
        success: function (data){
            $('#showbooks').append(data);
            $("#thekey").text(key);
        }
    })
}
$(document).ready(function() {
    $('#genre_id').select2({
        data: $('.genre_id_data').val()
    });

    $("#status").change(function() {
        var status = $(this).val();
        // $('#btnFilterNow').attr('data-status', status);
        $('#showbooks').empty();
        $("#thekey").empty();
        $.ajax({
            url:"/ajax_filter_book",
            async: false,
            cache: false,
            method:"GET",
            data:{status:status},
            success: function (data){
                $('#showbooks').append(data);
                $("#msg_filter").text("Tìm truyện sắp xếp theo "+status);
            }
        })
    })
    $("#genre_id").change(function() {
        var genre_id = $(this).val();
        // $('#btnFilterNow').attr('data-genre_id', genre_id);
        $('#showbooks').empty();
        $("#thekey").empty();
        $.ajax({
            url:"/ajax_filter_getBookbyGenre",
            async: false,
            cache: false,
            method:"GET",
            data:{genre_id:genre_id},
            success: function (data){
                $('#showbooks').append(data);

            }
        })
    })
    $("#sort").change(function() {
        var sort = $(this).val();
        // $('#btnFilterNow').attr('data-sort', sort);
        $('#showbooks').empty();
        $("#thekey").empty();
        $.ajax({
            url:"/ajax_filter_book",
            async: false,
            cache: false,
            method:"GET",
            data:{sort:sort},
            success: function (data){
                $('#showbooks').append(data);
                $("#msg_filter").text("Tìm truyện sắp xếp theo "+sort);
            }
        })
    })
});
</script>
@endsection
