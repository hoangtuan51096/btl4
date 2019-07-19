@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUẢN LÝ TÁC GIẢ</div>
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
                Tạo mới tác giả
            </button>
            <div>
                <div class="modal" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tạo mới tác giả</h4>
                            <div class="alert alert-danger print-error-msg" style="display:none"></div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="errors"></div>
                            <form>
                                @csrf
                                Tên:<input id="name"type="text" class="form-control" name="name">
                                <br>
                                <button type="button" class="btn btn-info" id="createAuthor">Tạo mới</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </nav>
        <div id="tag_container">
            @include('admin.authors.paginate')
        </div>
    </div>
@endsection

@push('after_js')
    <script src="{{ asset('js/authors.js') }}"></script>
@endpush
