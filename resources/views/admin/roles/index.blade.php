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
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Thêm quyền</a>
            <div class="card-tools">
                <form class="formsearch" role="form" method="POST" action="{{ route('admin.role.search') }}">
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
                        <th>Quyền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.role.edit',$role->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.role.delete',$role->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $roles->links() }}
            </ul>
        </div>
    <!-- /.card-body -->
    </div>
@endsection
