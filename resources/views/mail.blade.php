
<form role="form" method="POST" action="{{ route('postmail') }}" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Thêm</button>
</form>

