<th scope="row">{{  $rowid }}</th>
<td>{{ $user->account }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->name }}</td>
<td>
    <div class="row">
        <button name="edit" data-id="{{ $user->id }}" data-rowid="{{ $rowid }}" class="edit">Sửa</button> 
        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="Xóa" name="delete"/>
        </form>
    </div>
</td>