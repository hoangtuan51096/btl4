@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header"> QUAN LY TAI KHOAN</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tạo mới tài khoản
            </button>
            <div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tao moi tai khoan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            Account:<input id="account" type="text" class="form-control" name="account">
                            @error('account')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            Password:<input id="password" type="password" class="form-control" name="password">
                            Email:<input id="email" type="email" class="form-control name="email">
                            Name:<input id="name"type="text" class="form-control name="name">
                            Chuc nang: <select id="role" name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <br>
                            <button type="button" class="btn btn-info" id="create-user">Tao moi</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-tabs">
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
                    <th scope="col">Account</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
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
                        <div>
                            <input type="submit" name="Edit" value="Edit">
                            <input type="submit" name="" value="Delete">
                        </div>
                    </td>
                </tr>
                @endforeach
                <div id="result">
                </div>
            </tbody>
        </table>
        {{ $allUsers->links() }}
    </div>
@endsection
