@extends('admin.layouts.master')
@section('title','Sửa')
@section('content')
<form role="form" method="POST" action="{{ route('admin.chap.update',['id'=>$chap->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Tên </label>
                <input  type="text" name="name" class="form-control" value="{{ $chap->name }}">
                <span class="errormess">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label>Sách</label>
                <select name="book_id" id="book_id" class="form-control">
                    <option value="0" >Chọn sách</option>
                    @foreach ($books as $book)
                    <option {{ ($chap->book_id == $book->id) ? 'selected' : '' }}  class="book_id_data" value='{{ $book->id }}'>{{ $book->name }}</option>
                    @endforeach
                </select>
                <span class="errormess" id="errorbook"></span>
            </div>
            <div class="form-group">
                <label>Audio </label>
                <input type="file" name="audio" class="form-control" value="{{ $chap->audio }}">
                <span class="errormess">
                    @error('audio')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Sửa</button>
</form>
@endsection
@section('script')
@parent
    <script>
        $(document).ready(function() {
            $('#book_id').select2({
                data: $('.book_id_data').val()
            });
        });
        function requestBook(){
            if ($('#book_id').val() == 0) {
                document.getElementById('errorbook').innerHTML = 'Chọn sách';
                $('#book_id').focus();
                return false;
            } else {
                document.getElementById('errorbook').innerHTML = '';
            }
        }
    </script>

@endsection
