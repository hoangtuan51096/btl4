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