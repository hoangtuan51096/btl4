<th scope="row">{{  $rowid }}</th>
<form >
    <td>{{ $updateAuthor->name }}</td>
    <td>{{ count($updateAuthor->book) }}</td>
    <td>
        <div class="row">
            <button name="edit" data-id="{{ $updateAuthor->id }}" data-rowid="{{ $rowid }}" class="edit-author"> Edit</button> 
            <form action="{{ route('author.destroy', $updateAuthor->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
            </form>
    	</div>
    </td>
</form>