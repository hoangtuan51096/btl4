@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="header"> 
            <div>QUAN LY TAI KHOAN</div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="float-left" id="result">
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tạo mới tài khoản</button>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang mượn sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chưa trả sách quá hạn</a>
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
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allUsers as $key => $user)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $user->account }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <div class="row">
                            <button name="edit" data-id="{{ $user->id }}" data-rowid="{{ $key+1 }}" class="edit">Sửa</button> 
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="Xóa" name="delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $allUsers->links() }}
    </div>
@endsection

@push('after_js')
    <script src="{{ asset('js/users.js') }}"></script>
@endpush
