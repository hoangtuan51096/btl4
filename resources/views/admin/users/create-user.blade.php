<tr>
    <th scope="row">new</th>
    <td>{{ $addUser->account }}</td>
    <td>{{ $addUser->email }}</td>
    <td>{{ $addUser->name }}</td>
    <td>
        <div class="row">
            <button name="edit" data-id="{{ $addUser->id }}" data-rowid="new" class="edit"> Edit</button> 
            <form action="{{ route('user.destroy', $addUser->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
            </form>
        </div>
    </td>
</tr>