@if($detailBook == null)
    <div>
        <span class="alert alert-danger">Hien tai quyen sach nay dang duoc nguoi khac giu</span>
    </div>
@else
    <div id="content-book" class="container">
        <div class="header">XEM CHI TIET SACH</div>
        <br/>
        <div class="title">
            <a href="{{ route('book-client.index') }}">Sach</a>&emsp;>&emsp;
            <span>Xem sach</span>
        </div>
        <div class="body">
            <div class="container" style="padding:50px 100px 50px 100px;">
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
                    <label for="staticEmail" class="col-sm-6 col-form-label"></label>
                    <div class="col-sm-6">
                        <form action="{{ url('view-rent-book') }}" action="GET">
                            <input type="hidden" name="book_id" value="{{ $detailBook->id }}">
                            <button>Muon sach</button> 
                        </form> 
                        <form action="{{ route('book-client.index') }}" action="GET">
                            <button>Tro lai</button> 
                        </form>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif