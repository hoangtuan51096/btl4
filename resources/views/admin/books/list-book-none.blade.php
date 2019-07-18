@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUAN LY SACH</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="float-left" id="result">
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tạo mới sach
            </button>
            <div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tao moi sach</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="errors"></div>
                                Name:<input id="name" type="text" class="form-control" name="name">
                                Tac gia:<select id="author_id" class="form-control">
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button type="button" class="btn btn-info" id="createBook">Tao moi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book.index') }}">Tat ca</a>
                    </li>
                    <li  class="nav-item ">
                        <a class="nav-link" href="{{ route('bookViewing') }}">Đang xem</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookRenting') }}">Đang mượn</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" id="active" href="{{ route('bookNone') }}">Chua muon</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="tab-content">
            <div id="none" class="">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ten sach</th>
                            <th scope="col">Tac gia</th>
                            <th scope="col">Trang thai</th>
                            <th scope="col">Tai khoan</th>
                            <th scope="col">Hanh dong</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="newRow"></tr>
                        @foreach($listBookNone as $key => $book)
                        <tr>
                            <th scope="row">{{  $key+1 }}</th>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>Chua muon</td>
                            <td></td>
                            <td>
                                <div class="row">
                                    <button name="edit" data-id="{{ $book->id }}" data-rowid="{{ $key+1 }}" class="edit-book">Sua</button> 
                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="Xoa" name="delete"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <div id="result">
                        </div>
                    </tbody>
                </table>
                {{ $listBookNone->links() }}
            </div>

        </div>
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/books.js') }}"></script>
@endpush
