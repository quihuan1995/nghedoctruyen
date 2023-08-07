@extends('admin.layouts.master')
@section('title','Sửa')
@section('content')
<form role="form" method="POST" action="{{ route('admin.gallery.update',['id'=>$gallery->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label>Ảnh</label>
                    <input id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                    <img id="image" class="thumbnail" width="100%" height="350px" src="/galleries/{{ $gallery->image }}">
                    <span class="errormess">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Sửa</button>
</form>
@endsection
