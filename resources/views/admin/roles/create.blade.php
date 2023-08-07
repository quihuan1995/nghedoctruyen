@extends('admin.layouts.master')
@section('title','Thêm')
@section('content')
<form role="form" method="POST" action="{{ route('admin.role.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <span class="errormess">@error('name') {{ $message }} @enderror </span>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                <span class="errormess">@error('slug') {{ $message }} @enderror </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Thêm</button>
</form>
@endsection
