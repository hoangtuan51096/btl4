<th scope="row">{{  $rowid }}</th>
<td>{{ $user->account }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->name }}</td>
<td>
    <div>
        <button class="edit" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Edit</button>
        <button class="delete" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Delete</button>
    </div>
</td>
