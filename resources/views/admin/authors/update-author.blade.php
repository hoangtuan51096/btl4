<th scope="row">{{ $rowid }}</th>
<form >
    <td>{{ $updateAuthor->name }}</td>
    <td>{{ count($updateAuthor->books) }}</td>
    <td>
        <div class="row">
            <button name="edit" data-id="{{ $updateAuthor->id }}" data-rowid="{{ $rowid }}" class="edit-author"> Sửa</button> 
            <form action="{{ route('author.destroy', $updateAuthor->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Bạn có muốn xoá tác giả này không?');" type="submit" class="" value="Xoá" name="delete"/>
            </form>
    	</div>
    </td>
</form>