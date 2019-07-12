@extends('layouts.app')

@section('content')
    <div id="content-book" class="container">
        <div class="header">SACH</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ten sach</th>
                    <th scope="col">Tac gia</th>
                    <th scope="col">Hanh dong</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listBooks as $key => $book)
                <tr>
                    <th scope="row">{{  $key+1 }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        <div class="row">
                            <form action="{{ url('view-rent-book') }}" action="GET">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button>Muon sach</button> 
                            </form>
                            <button class="detail-book" data-id="{{ $book->id }}" data-rowid="{{ $key+1 }}">Xem chi tiet</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                <div id="result">
                </div>
            </tbody>
        </table>
        {{ $listBooks->links() }}
    </div>
@endsection
@push('after_js')
    <script src="{{ asset('js/book-client.js') }}"></script>
@endpush
