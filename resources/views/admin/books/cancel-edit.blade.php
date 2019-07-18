<th scope="row">{{ $rowid }}</th>
<form >
    <td class="name">{{ $book->name }}</td>
    <td class="authorID">{{ $book->author->name }}</td>
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
        <div class="row">
            <button name="edit" data-id="{{ $book->id }}" data-rowid="{{ $rowid }}" class="edit-book">Sua</button> 
            <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="Xoa" name="delete"/>
            </form>
        </div>
    </td>
</form>