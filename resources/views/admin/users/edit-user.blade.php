<th scope="row">{{ $rowid }}</th>
<td>{{ $user->account }}</td>
<td>{{ $user->email }}</td>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $user->name }}"></td>
    <td>
        <div>
            <button class="save-user" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Luu</button>
            <button class="cancel" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Huy</button>
        </div>
    </td>
</form>