@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUAN LY THUNG RAC</div>
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allTrashUser') }}">Tai khoan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allTrashBook') }}">Sach</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allTrashAuthor') }}">Tac gia</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="viewTrash">
        </div>
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/trash.js') }}"></script>
@endpush
