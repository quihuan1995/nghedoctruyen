@extends('admin.layouts.master')
@section('title','Đổi mật khẩu')
@section('content')
<form role="form" method="POST" action="{{  route('admin.user.postchangepass',['id'=>$user->id]) }}" enctype="multipart/form-data" >
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" name="old_pass" class="form-control" id="old_pass" value="{{ old('old_pass') }}">
                <span id="errorpass3" class="errormess error-pass">
                    @error('old_pass')
                        {{ $message }}
                    @enderror
                    @if(session('wrongpass'))
                        {{session('wrongpass')}}
                    @endif
                </span>
            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="new_pass" class="form-control" id="new_pass" value="{{ old('new_pass') }}">
                <span id="errorpass1" class="errormess error-pass">
                    @error('new_pass')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" name="new_repass" class="form-control" id="new_repass" value="{{ old('new_repass') }}">
                <span id="errorpass2" class="errormess error-pass">
                    @error('new_repass')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
</form>
@endsection
