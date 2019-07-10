@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header"> QUAN LY TAC GIA</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tạo mới tac gia
            </button>
            <div>
                <div class="modal" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tao moi tac gia</h4>
                            <div class="alert alert-danger print-error-msg" style="display:none"></div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                Name:<input id="name"type="text" class="form-control" name="name">
                                <br>
                                <button type="button" class="btn btn-info" id="createAuthor">Tao moi</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </nav>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity Book</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listAuthors as $key => $author)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $author->name }}</td>
                    <td>{{ count($author->book) }}</td>
                    <td>
                        <div class="row">
                            <button name="edit" data-id="{{ $author->id }}" data-rowid="{{ $key+1 }}" class="edit-author"> Edit</button> 
                            <form action="{{ route('author.destroy', $author->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input onclick="return confirm('Ban co chac muon xoa tai khoan nay hay khong?');" type="submit" class="" value="DELETE" name="delete"/>
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
    </div>
@endsection

@push('after_js')
    <script src="{{ asset('js/authors.js') }}"></script>
@endpush
