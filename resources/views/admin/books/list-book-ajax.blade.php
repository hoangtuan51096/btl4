@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUAN LY SACH</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="float-left" id="result">
            @if (session('status'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('errors') }}
                </div>
            @endif
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
                        <a class="nav-link list-book" data-url="list-book" data-href="{{ route('listBook') }}">Tat ca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list-book" data-url="list-book-view" data-href="{{ route('bookViewing') }}">Đang xem</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list-book" data-url="list-book-rent" data-href="{{ route('bookRenting') }}">Đang mượn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list-book" data-url="list-book-none" data-href="{{ route('bookNone') }}">Chua muon</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="tab-content content-book" id="tag_container">
            @include('admin.books.paginate')
        </div>
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/books.js') }}"></script>
@endpush
