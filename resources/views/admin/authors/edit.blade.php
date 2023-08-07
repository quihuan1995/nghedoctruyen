@extends('admin.layouts.master')
@section('title','Sửa')
@section('content')
<form role="form" method="POST" action="{{ route('admin.author.update',['id'=>$author->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label >Tên</label>
                <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                <span class="errormess">@error('name') {{ $message }} @enderror </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Sửa</button>
</form>
@endsection
