@extends('layouts.app')

@section('content')
<div id="content-book" class="container">
    <div class="header">TRA SACH</div>
    <br/>
    <div class="title">
        <a href="">Sach</a>&emsp;>&emsp;
        <span>Tra sach</span>
    </div>
     @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    @if (empty($detailUser))
        <div class="alert alert-danger" role="alert">
            <span>Hien tai ban dang khong muon quyen sach nao</span>    
        </div>
    @else
        <div class="body">
            <div class="container" style="padding:50px 100px 50px 100px;">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tai khoan:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $detailUser->users->account }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ten sach:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $detailUser->books->name }}">
                    </div>
                </div>
               <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ten tac gia:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $detailBook->author->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ngay Muon:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly name="end_at" class="form-control-plaintext" value="{{ $detailUser->created_at }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ngay Tra:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly name="end_at" class="form-control-plaintext" value="{{ $detailUser->end_at }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-6 col-form-label"></label>
                    <div class="col-sm-6">
                        <form action="{{ route('giveBackBook') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $detailUser->user_id }}">
                            <input type="hidden" name="book_id" value="{{ $detailUser->book_id }}">
                            <button type="submit">Tra sach</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
@push('after_js')
    <script src="{{ asset('js/book-client.js') }}"></script>
@endpush
