<th scope="row">{{ $rowid }}</th>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $book->name }}"></td>
    <td class="authorID">
        <select >
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @if($author->id == $book->author->id) selected @endif>{{ $author->name }}</option>
            @endforeach
        </select>
    </td>
    <td></td>
    <td></td>
    <td>
        <div>
            <button class="save-book" data-rowid="{{ $rowid }}" data-id="{{ $book->id }}">Save</button>
            <button class="cancel-book" data-rowid="{{ $rowid }}" data-id="{{ $book->id }}">Cancel</button>
        </div>
    </td>
</form>