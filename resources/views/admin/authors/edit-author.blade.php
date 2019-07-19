<th scope="row">{{ $rowid }}</th>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $author->name }}"></td>
    <td>{{ count($author->books) }}</td>
    <td>
        <div>
            <button class="save-author" data-rowid="{{ $rowid }}" data-id="{{ $author->id }}">Lưu</button>
            <button class="cancel-edit-author" data-rowid="{{ $rowid }}" data-id="{{ $author->id }}">Hủy</button>
        </div>
    </td>
</form>