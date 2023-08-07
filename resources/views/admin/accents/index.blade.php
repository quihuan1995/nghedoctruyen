@extends('admin.layouts.master')
@section('title','Thể loại')
@section('content')

    @if(session('thongbao'))
    <div class="alert bg-success" role="alert">
        <i class="fas fa-duotone fa-check marginright1"></i>{{ session('thongbao') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.accent.create') }}" class="btn btn-primary">Thêm người đọc</a>
            <div class="card-tools">
                <form class="formsearch" role="form" method="POST" action="{{ route('admin.accent.search') }}">
                    @csrf
                    <input type="text" placeholder="search.." name="key">
                    <button>Search</button>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người đọc</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accents as $accent)
                        <tr>
                            <td>{{ $accent->id }}</td>
                            <td><a> {{ $accent->name }}</a></td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.accent.edit',$accent->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.accent.delete',$accent->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $accents->links() }}
            </ul>
        </div>
    <!-- /.card-body -->
    </div>
@endsection
