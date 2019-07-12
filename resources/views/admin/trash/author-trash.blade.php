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
                    <form action="{{ route('deleteAuthor', $author->id) }}" method="POST">
                        @csrf
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
