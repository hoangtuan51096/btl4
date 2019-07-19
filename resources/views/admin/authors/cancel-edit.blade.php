<th scope="row">{{ $rowid }}</th>
<td class="name">{{ $author->name }}</td>
<td>{{ count($author->books) }}</td>
<td>
    <div class="row">
        <button name="edit" data-id="{{ $author->id }}" data-rowid="{{ $rowid }}" class="edit-author">Sửa</button> 
        <form action="{{ route('author.destroy', $author->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <input onclick="return confirm('Bạn có muốn xoá tac giả này không?');" type="submit" class="" value="Xoá" name="delete"/>
        </form>
    </div>
</td>
