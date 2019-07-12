<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Ten Sach</th>
            <th scope="col">Ngay xoa</th>
            <th scope="col">Hanh dong</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trashBook as $key => $book)
        <tr>
            <th scope="row">{{  $key+1 }}</th>
            <td>{{ $book->name }}</td>
            <td>{{ $book->deleted_at}}</td>
            <td>
                <div class="row">
                    <form action="{{ route('restoreBook') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <button type="submit">Tao lai</button>
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
