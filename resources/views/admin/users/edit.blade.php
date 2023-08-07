@extends('admin.layouts.master')
@section('title','Sửa')
@section('content')

<form role="form" method="POST" action="{{  route('admin.user.update',['id'=>$user->id]) }}" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        <span class="errormess">@error('name') {{ $message }} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        <span class="errormess"> @error('email') {{ $message }} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <select id="role_id" name="role_id[]" class="form-control" multiple>
                            @foreach ($roles as $role)
                                <option {{ ($user->Role->containsStrict('id', $role->id)) ? 'selected' : '' }} value='{{ $role->id }}'>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.user.getchangepass',['id'=>$user->id]) }}" class="btn btn-primary" >
                            Đổi mật khẩu
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input id="img" type="file" name="avatar" class="form-control hidden" onchange="changeImg(this)">
                        <img id="image" class="thumbnail" width="100%" height="350px" src="{{ isAvatar($user->avatar) }}">
                        <span class="errormess"> @error('image') {{ $message }} @enderror </span>
                    </div>
                </div>
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
            $('#role_id').select2({
                multiple: true,
                placeholder: 'Chọn quyền',
            });
        });

    </script>
@endsection
