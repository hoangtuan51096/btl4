<th scope="row">{{ $rowid }}</th>
<form >
    <td>{{ $updateBook->name }}</td>
    <td>{{ $updateBook->author->name }}</td>
    @if($updateBook->delay == DANGXEM)
        <td>Dang xem</td>
        <td>{{ $updateBook->load('userDelay')->userDelay->account }}</td>
    @elseif($updateBook->status == DANGMUON)
        <td>Dang muon</td>
        @foreach($updateBook->load('users')->users as $user)
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
            <button name="edit" data-id="{{ $updateBook->id }}" data-rowid="{{ $rowid }}" class="edit-book">Sua</button> 
            <form action="{{ route('book.destroy', $updateBook->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="Xoa" name="delete"/>
            </form>
        </div>
    </td>
</form>