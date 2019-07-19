@if ($status == 'user')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ten tai khoan</th>
                <th scope="col">Ten nguoi dung</th>
                <th scope="col">Email</th>
                <th scope="col">Ngay xoa</th>
                <th scope="col">Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashUser as $key => $user)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $user->account }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->deleted_at}}</td>
                    <td>
                        <div class="row">
                            <form action="{{ route('restoreUser') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit">RESTORE</button>
                            </form>
                            <form action="{{ route('deleteUser') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $trashUser->links() }}
@endif
@if ($status == 'book')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ten Sach</th>
                <th scope="col">Ten tac gia</th>
                <th scope="col">Ngay xoa</th>
                <th scope="col">Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashBook as $key => $book)
            <tr>
                <th scope="row">{{  $key+1 }}</th>
                <td>{{ $book->name }}</td>
                <td>
                    @foreach($authors as $author)
                        @if($book->author_id == $author->id)
                            {{ $author->name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $book->deleted_at}}</td>
                <td>
                    <div class="row">
                        <form action="{{ route('restoreBook') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $book->id }}">
                            <input onclick="return confirm('Ban co chac muon tao lai quyen sach nay hay khong?');" type="submit" class="" value="Tao lai" name="delete"/>
                        </form>
                        <form action="{{ route('deleteBook') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $book->id }}">
                            <input onclick="return confirm('Ban co chac muon xoa quyen sach nay hay khong?');" type="submit" class="" value="Xoa" name="delete"/>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            <div id="result">
            </div>
        </tbody>
    </table>
    {{ $trashBook->links() }}
@endif
@if ($status == 'author')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ten tac gia</th>
                <th scope="col">Ngay xoa</th>
                <th scope="col">Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashAuthor as $key => $author)
            <tr>
                <th scope="row">{{  $key+1 }}</th>
                <td>{{ $author->name }}</td>
                <td>{{ $author->deleted_at}}</td>
                <td>
                    <div class="row">
                        <form action="{{ route('restoreAuthor') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $author->id }}">
                            <button type="submit">Tao lai</button>
                        </form>
                        <form action="{{ route('deleteAuthor') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $author->id }}">
                            <input onclick="return confirm('Ban co chac muon xoa tac gia nay hay khong?');" type="submit" class="" value="XOA" name="delete"/>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            <div id="result">
            </div>
        </tbody>
    </table>
    {{ $trashAuthor->links() }}
@endif