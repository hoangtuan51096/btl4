<th scope="row">{{ $rowid }}</th>
<form >
    <td>{{ $updateBook->name }}</td>
    <td>{{ $updateBook->author->name }}</td>
    <td></td>
    <td></td>
    <td>
        <div class="row">
            <button name="edit" data-id="{{ $updateBook->id }}" data-rowid="{{ $rowid }}" class="edit-book"> Edit</button> 
            <form action="{{ route('book.destroy', $updateBook->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
            </form>
        </div>
    </td>
</form>