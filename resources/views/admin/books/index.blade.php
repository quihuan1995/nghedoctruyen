@extends('admin.layouts.master')
@section('title','Sách truyện')
@section('content')

    @if(session('thongbao'))
    <div class="alert bg-success" role="alert">
        <i class="fas fa-duotone fa-check marginright1"></i>{{ session('thongbao') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.book.create') }}" class="btn btn-primary">Thêm truyện</a>
            <div class="card-tools">
                <form class="formsearch" role="form" method="POST" action="{{ route('admin.book.search') }}">
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
                        <th >ID</th>
                        <th>Thông tin</th>
                        <th>Ảnh</th>
                        <th>Thể loại</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>
                                <p><strong>Tên </strong>: <a href="{{ $book->url }}">{{ $book->name }}</a></p>
                                <p><strong>Lượt nghe </strong>: {{ $book->listens }}</p>
                                <p><strong>Tác giả </strong>: {{ $book->Author->name }}</p>
                                <p><strong>Giọng đọc </strong>: {{ $book->Accent->name  }} </p>
                                <p><strong>Trạng thái </strong>: {{ $book->status }}</p>
                            </td>
                            <td><img src="{{ isImgBook($book->image) }}" width="100px"></td>
                            <td>
                                @foreach ($book->Genre as $genre)
                                    <button class="btn btn-primary">{{ $genre->name }}</button>
                                @endforeach
                            </td>
                            <td >
                                <a class="btn btn-info btn-sm" href="{{ route('admin.book.edit',$book->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return isDel()" href="{{ route('admin.book.delete',$book->id) }}"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                {{ $books->links() }}
            </ul>
        </div>
    <!-- /.card-body -->
    </div>
@endsection
