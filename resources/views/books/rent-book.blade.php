@extends('layouts.app')

@section('content')
<div id="content-book" class="container">
    <div class="header">MUON SACH</div>
    <br/>
    <div class="title">
        <a href="{{ route('book-client.index') }}">Sach</a>&emsp;>&emsp;
        <span>Muon sach</span>
    </div>
    <div class="body">
        <div class="container" style="padding:50px 100px 50px 100px;">
                <input type="hidden" id="id-book" name="id" value="{{ $detailBook->id }}">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ten sach</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $detailBook->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ten tac gia</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $detailBook->author->name }}">
                    </div>
                </div>
               <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ngay muon</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" value="{{ date("m/d/Y") }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" required class="col-sm-2 col-form-label">Ngay tra(Toi da 4 ngay)</label>
                    <div class="col-sm-10">
                      <input id="end-time" type="date" name="end_at" class="form-control-plaintext" min="{{ date("m/d/Y") }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-6 col-form-label"></label>
                    <div class="col-sm-6">
                        <button class="rent-book">Muon</button>
                        <button >Huy</button>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@push('after_js')
    <script src="{{ asset('js/book-client.js') }}"></script>
@endpush
