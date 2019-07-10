@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header"> QUAN LY TAI KHOAN</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tạo mới tài khoản
            </button>
            <div>
                <div class="modal" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tao moi tai khoan</h4>
                            <div class="alert alert-danger print-error-msg" style="display:none"></div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
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
                        <div class="row">
                            <button name="edit" data-id="{{ $user->id }}" data-rowid="{{ $key+1 }}" class="edit"> Edit</button> 
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
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
        {{ $allUsers->links() }}
    </div>
@endsection

@push('after_js')
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function ajaxLoad(method, url, button) {

            var id = button.data('id');
            var rowid = button.data('rowid');
            var tr = button.parents('tr'); 
            var data = {id : id , rowid: rowid};
             $.ajax({
                type: method,
                url: url,
                data: data,
                dataType: 'html',
                success: function(result) {
                    tr.empty();
                    tr.html(result);
                },
            });
        }

        $('button#createUser').click(function(){
            var data = {
                account : $('#account').val(),
                email : $('#email').val(),
                password : $('#password').val(),
                name : $('#name').val(),
                role : $('#role').val(),
            }
            $.ajax({
                url: 'create-user',
                type: 'POST',
                dataType: 'html',
                data: data,
                success: function(result){
                    $('#result').html(result);
                    $('#myModal').modal('hide');
                }
            });
        });
        $('button.edit').click(function(event){
            event.preventDefault();
            ajaxLoad('GET', 'edit-user', $(this));
        });
        $('button.save').click(function(event){
            alert(1);
            event.preventDefault();
            var id = $(this).data('id');
            var rowid = $(this).data('rowid');
            var tr = $(this).parents('tr');
            var name = tr.find('td.name').children.val();
            $ajax({
                url: 'edit-user',
                type: 'POST',
                data: {id: id, name: name, rowid: rowid},
                success: function(){
                    tr.empty();
                    tr.html(result);
                }
            });
        });
    });
</script>
@endpush
