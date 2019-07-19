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
    @if($book->delay == DANGXEM)
        <td>Dang xem</td>
        <td>{{ $book->load('userDelay')->userDelay->account }}</td>
    @elseif($book->status == DANGMUON)
        <td>Dang muon</td>
        @foreach($book->load('users')->users as $user)
            @if($user->pivot->status == DANGMUON)
                <td>{{ $user->account }}</td>
            @endif
        @endforeach
    @else
        <td>Chua muon</td>
        <td></td>
    @endif
    <td>
        <div>
            <button class="save-book" data-rowid="{{ $rowid }}" data-id="{{ $book->id }}">Luu</button>
            <button class="cancel-edit-book" data-rowid="{{ $rowid }}" data-id="{{ $book->id }}">Huy</button>
        </div>
    </td>
</form>