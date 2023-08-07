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
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Thêm tài khoản</a>
            <div class="card-tools">
                <form class="formsearch" role="form" method="POST" action="{{ route('admin.user.search') }}">
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
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td> {{ $user->name }}</td>
                            <td> {{ $user->email }}</td>
                            <td>
                                @foreach ($user->Role as $role)
                                    <button class="btn btn-primary">{{ $role->name }}</button>
                                @endforeach
                            </td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.user.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.user.delete',$user->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $users->links() }}
            </ul>
        </div>
    <!-- /.card-body -->
    </div>
@endsection
