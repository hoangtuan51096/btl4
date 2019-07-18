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
    </div>    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link active" id="active" href="{{ route('allTrashUser') }}">Tai khoan</a>
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
             <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ten tai khoan</th>
                        <th scope="col">Ten nguoi dung</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngay xoa</th>
                        <th scope="col">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trashUser as $key => $user)
                    <tr>
                        <th scope="row">{{  $key+1 }}</th>
                        <td>{{ $user->account }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <form action="{{ route('restoreUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit">RESTORE</button>
                                </form>
                                <form action="{{ route('deleteUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
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
