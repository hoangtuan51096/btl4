@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUAN LY TAI KHOAN</div>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="float-left" id="result">
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tao moi tai khoan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="errors"></div>
                            <form>
                                @csrf
                                Account:<input id="account" type="text" class="form-control" name="account">
                                Password:<input id="password" type="password" class="form-control" name="password">
                                Email:<input id="email" type="email" class="form-control" name="email">
                                Name:<input id="name"type="text" class="form-control" name="name">
                                Chuc nang: <select id="role" name="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <br>
                                <button type="button" class="btn btn-info" id="createUser">Tao moi</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs float-right">
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('user.index') }}">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userRenting') }}">Đang mượn sách</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" id="active" href="{{ route('userEndDate') }}">Chưa trả sách quá hạn</a>
                    </li>
                </ul>
            </div>
        </nav>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Hạn trả</th>
                </tr>
            </thead>
            <tbody>
                <tr id="newRow"></tr>
                @foreach($userEndDates as $key => $user)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $user->users->account }}</td>
                    <td>{{ $user->users->email }}</td>
                    <td>{{ $user->users->name }}</td>
                    <td>{{ $user->books->name }}</td>
                    <td>{{ $user->end_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $userEndDates->links() }}
    </div>
@endsection

@push('after_js')
    <script src="{{ asset('js/users.js') }}"></script>
@endpush
