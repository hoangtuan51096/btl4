<th scope="row">{{ $rowid }}</th>
<td>{{ $updateUser->account }}</td>
<td>{{ $updateUser->email }}</td>
<td>{{ $updateUser->name }}</td>
<td>
    <div class="row">
        <button name="edit" data-id="{{ $updateUser->id }}" data-rowid="{{ $rowid }}" class="edit"> Edit</button> 
        <form action="{{ route('user.destroy', $updateUser->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
        </form>
    </div>
</td>
