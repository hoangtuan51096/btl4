<div class="header">
    <div>BTL4</div>
</div>
<div class="list-group" id="list-tab" role="tablist">
    @if(Auth::user()->role == 'admin')
        <a href="{{ route('listBook') }}" class="list-group-item list-group-item-action" id="list-home-list">Sach</a>
        <a href="{{ route('author.index') }}"class="list-group-item list-group-item-action" id="list-profile-list">Tac gia</a>
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action" id="list-messages-list">Tai khoan</a>
        <a href="{{ route('allTrashUser') }}" class="list-group-item list-group-item-action" id="list-messages-list">Thung rac</a>
    @endif
    @if(Auth::user()->role == 'user')
        <a class="list-group-item list-group-item-action list-book-client" href="{{ route('book-client.index') }}">Muon Sach</a>
        <a class="list-group-item list-group-item-action list-book-client" href="{{ route('viewGiveBackBook') }}">Tra sach</a>
    @endif
</div>