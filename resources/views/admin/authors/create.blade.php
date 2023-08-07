@extends('admin.layouts.master')
@section('title','Thêm')
@section('content')
<form role="form" method="POST" action="{{ route('admin.author.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <span class="errormess">@error('name') {{ $message }} @enderror </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Thêm</button>
</form>
@endsection
