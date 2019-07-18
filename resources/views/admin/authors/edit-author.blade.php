<th scope="row">{{ $rowid }}</th>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $author->name }}"></td>
    <td>{{ count($author->books) }}</td>
    <td>
        <div>
            <button class="save-author" data-rowid="{{ $rowid }}" data-id="{{ $author->id }}">Save</button>
            <button class="cancel-author" data-rowid="{{ $rowid }}" data-id="{{ $author->id }}">Cancel</button>
        </div>
    </td>
</form>