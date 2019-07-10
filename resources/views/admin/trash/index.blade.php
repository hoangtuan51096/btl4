@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header"> QUAN LY THUNG GIAC</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-url="trash-user" href="">Tai khoan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-url="trash-book" href="">Sach</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-url="trash-author" href="">Tac gia</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="viewTrash"></div>
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/trash.js') }}"></script>
@endpush
