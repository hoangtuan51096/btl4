@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="header"> 
            <div>QUAN LY TAC GIA</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="float-left" id="result">
            @if (session('status'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('errors') }}
                </div>
            @endif
        </div>
    </div>
    <div class="container">
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
                            <div class="errors"></div>
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
                <tr id="newRow"></tr>
                @foreach($listAuthors as $key => $author)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $author->name }}</td>
                    <td>{{ count($author->books) }}</td>
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
