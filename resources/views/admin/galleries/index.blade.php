@extends('admin.layouts.master')
@section('title','Ảnh bìa')
@section('content')

    @if(session('thongbao'))
    <div class="alert bg-success" role="alert">
        <i class="fas fa-duotone fa-check marginright1"></i>{{ session('thongbao') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Thêm Ảnh</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td><img src="{{ isGallery($gallery->image) }}" width="100px"></td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.gallery.edit',$gallery->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.gallery.delete',$gallery->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $galleries->links() }}
            </ul>
        </div>
    <!-- /.card-body -->
    </div>
@endsection
