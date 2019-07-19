
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ten sach</th>
                <th scope="col">Tac gia</th>
                <th scope="col">Trang thai</th>
                @if ($status != 'none')
                    <th scope="col">Tai khoan</th>
                @endif
                @if ($status == 'all'|| $status == 'none')
                    <th scope="col">Hanh dong</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr id="newRow"></tr>
            @foreach($listBooks as $key => $book)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    @if($book->status == DANGMUON)
                        <td>Dang muon</td>
                        @foreach($book->users as $user)
                            @if($user->pivot->status == DANGMUON)
                                <td>{{ $user->account }}</td>
                                @if ($status != 'rent')
                                    <td></td>
                                @endif
                            @endif
                        @endforeach
                    @elseif($book->delay == DANGXEM || $status == 'view')
                        <td>Dang xem</td>
                        <td>{{ $book->load('userDelay')->userDelay->account }}</td>
                    @else
                        <td>Chua muon</td>
                        @if ($status != 'none')
                            <td></td>
                        @endif
                        <td>
                            <div class="row">
                                <button name="edit" data-id="{{ $book->id }}" data-rowid="{{ $key+1 }}" class="edit-book">Sua</button> 
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="Xoa" name="delete"/>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $listBooks->render() !!}