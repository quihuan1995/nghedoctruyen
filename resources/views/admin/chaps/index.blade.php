@extends('admin.layouts.master')
@section('title','Chương')
@section('content')

    @if(session('thongbao'))
    <div class="alert bg-success" role="alert">
        <i class="fas fa-duotone fa-check marginright1"></i>{{ session('thongbao') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.chap.create') }}" class="btn btn-primary">Thêm chương</a>
            <div class="card-tools">
                <form class="formsearch" role="form" method="POST" action="{{ route('admin.chap.search') }}">
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
                        <th>Chương</th>
                        <th>Ảnh</th>
                        <th>Sách</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chaps as $chap)
                        <tr>
                            <td>{{ $chap->id }}</td>
                            <td>{{ $chap->name }}</td>
                            <td><img src="{{ isImgBook($chap->Book->image) }}" width="100px"></td>
                            <td>{{ $chap->Book->name }}</td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.chap.edit',$chap->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.chap.delete',$chap->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $chaps->links() }}
            </ul>
        </div>
    </div>
@endsection
