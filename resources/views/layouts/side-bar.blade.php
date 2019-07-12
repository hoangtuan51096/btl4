<div class="header">
    <div>BTL4</div>
</div>
<div class="list-group" id="list-tab" role="tablist">
    @if(Auth::user()->role == 'admin')
        <a href="{{ route('book.index') }}" class="list-group-item list-group-item-action" id="list-home-list">Sach</a>
        <a href="{{ route('author.index') }}"class="list-group-item list-group-item-action" id="list-profile-list">Tac gia</a>
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action" id="list-messages-list">Tai khoan</a>
        <a href="{{ route('trashIndex') }}" class="list-group-item list-group-item-action" id="list-messages-list">Thung rac</a>
    @endif
    @if(Auth::user()->role == 'user')
        <a href="{{ route('book-client.index') }}" class="list-group-item list-group-item-action" id="list-home-list">Muon Sach</a>
        <a href="{{ route('viewGiveBackBook') }}"class="list-group-item list-group-item-action" id="list-profile-list">Tra sach</a>
    @endif
</div>