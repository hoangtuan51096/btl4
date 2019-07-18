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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allTrashUser') }}">Tai khoan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allTrashBook') }}">Sach</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" id="active" href="{{ route('allTrashAuthor') }}">Tac gia</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="viewTrash">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ten tac gia</th>
                        <th scope="col">Ngay xoa</th>
                        <th scope="col">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trashAuthor as $key => $author)
                    <tr>
                        <th scope="row">{{  $key+1 }}</th>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <form action="{{ route('restoreAuthor') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $author->id }}">
                                    <button type="submit">Tao lai</button>
                                </form>
                                <form action="{{ route('deleteAuthor') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $author->id }}">
                                    <input onclick="return confirm('Ban co chac muon xoa tac gia nay hay khong?');" type="submit" class="" value="XOA" name="delete"/>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <div id="result">
                    </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/trash.js') }}"></script>
@endpush
