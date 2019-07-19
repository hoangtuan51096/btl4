<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Số lượng sách</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <tr id="newRow"></tr>
        @foreach($listAuthors as $key => $author)
        <tr>
            <th scope="row">{{  $key+1 }}</th>
            <td>{{ $author->name }}</td>
            <td>{{ count($author->books) }}</td>
            <td>
                <div class="row">
                    <button name="edit" data-id="{{ $author->id }}" data-rowid="{{ $key+1 }}" class="edit-author"> Sửa</button> 
                    <form action="{{ route('author.destroy', $author->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input onclick="return confirm('Bạn có muốn xoá tác giả này không?');" type="submit" class="" value="Xoá" name="delete"/>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        <div id="row-author">
        </div>
    </tbody>
</table>
{{ $listAuthors->links() }}