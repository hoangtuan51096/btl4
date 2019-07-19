@if ($status == 'all')
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
            <tr id="newRow"></tr>
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
@else
    <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Hạn trả</th>
                    <th scope="col">Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <tr id="newRow"></tr>
                @foreach($allUsers as $key => $user)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $user->users->account }}</td>
                    <td>{{ $user->users->email }}</td>
                    <td>{{ $user->users->name }}</td>
                    <td>{{ $user->books->name }}</td>
                    <td>{{ $user->end_at }}</td>
                    <td>
                        @if($user->end_at < now())
                            <span class="danger">Qua han</span>
                        @else
                            <span>Dang muon</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $allUsers->links() }}
@endif