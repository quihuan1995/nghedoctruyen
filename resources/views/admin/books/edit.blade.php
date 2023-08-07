@extends('admin.layouts.master')
@section('title','Sửa')
@section('content')
<form role="form" method="POST" action="{{ route('admin.book.update',['id'=>$book->id]) }}" enctype="multipart/form-data"  onsubmit="return requestBook()">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                        <span class="errormess">@error('name') {{ $message }} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>Sách</label>
                        <select id="genre_id" name="genre_id[]" class="form-control" multiple>
                            @foreach ($genres as $genre)
                                <option {{ ($book->Genre->containsStrict('id', $genre->id)) ? 'selected' : '' }} value='{{ $genre->id }}'>{{ $genre->name.', ' }}</option>
                            @endforeach
                        </select>
                        <span class="errormess" id="errorgenre"></span>
                        <input value="{{ $book->genres }}" type="hidden" id="genres" name="genres" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tác giả </label>
                        <select id="author_id" name="author_id" class="form-control">
                            <option value="0">Chọn tác giả</option>
                            @foreach ($authors as $author)
                                <option {{ ($book->author_id == $author->id) ? 'selected' : '' }} class="author_id_data" value='{{ $author->id }}'>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <span class="errormess" id="errorauthor"></span>
                    </div>
                    <div class="form-group">
                        <label>Người đọc </label>
                        <select id="accent_id" name="accent_id" class="form-control">
                            <option value="0">Chọn Người đọc</option>
                            @foreach ($accents as $accent)
                                <option {{ ($book->accent_id == $accent->id) ? 'selected' : '' }} class="accent_id_data" value='{{ $accent->id }}'>{{ $accent->name }}</option>
                            @endforeach
                        </select>
                        <span class="errormess" id="erroraccent"></span>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái </label>
                        <input  type="text" name="status" class="form-control" value="{{ $book->status }}">
                    </div>
                    <div class="form-group">
                        <label>Nội dung </label>
                        <textarea name="content" cols="50" rows="10">{{ $book->content }}</textarea>
                        <span class="errormess">@error('content') {{ $message }} @enderror </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                        <img id="image" class="thumbnail" width="100%" height="350px" src="/image_books/{{ $book->image }}">
                        <span class="errormess"> @error('image') {{ $message }} @enderror </span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Sửa</button>
        </div>
    </div>

</form>
@endsection
@section('script')
@parent
    <script>
        $(document).ready(function() {
            $('#genre_id').select2({
                multiple: true,
                maximumSelectionLength: 5,
                minimumInputLength: 0,
                placeholder: 'Chọn tối đa 5 thể loại',
            });
            $('#accent_id').select2({
                data: $('.accent_id_data').val()
            });
            $('#author_id').select2({
                data: $('.author_id_data').val()
            });
            $('#genre_id').change(function(){
		        var genres = $('#genre_id option:selected').text();
                $('#genres').val(genres);
		    });
        });
        function requestBook(){
            var flag = true;
            if ($.trim($('#genre_id').val()) == '' || $('#genre_id').val() == 0) {
                document.getElementById('errorgenre').innerHTML = 'Chọn thể loại';
                $('#genre_id').focus();
                flag = false;
            } else {
                document.getElementById('errorgenre').innerHTML = '';
            };
            if ($('#author_id').val() == 0) {
                document.getElementById('errorauthor').innerHTML = 'Chọn tác giả';
                $('#author_id').focus();
                flag = false;
            } else {
                document.getElementById('errorauthor').innerHTML = '';
            }
            if ($('#accent_id').val() == 0) {
                document.getElementById('erroraccent').innerHTML = 'Chọn người đọc';
                $('#accent_id').focus();
                flag = false;
            } else {
                document.getElementById('erroraccent').innerHTML = '';
            }
            return flag;
        }

    </script>
@endsection
