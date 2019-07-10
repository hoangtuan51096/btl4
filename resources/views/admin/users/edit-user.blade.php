
<th scope="row">{{  $rowid }}</th>
<td>{{ $user->account }}</td>
<td>{{ $user->email }}</td>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $user->name }}"></td>
    <td>
        <div>
            <button class="save" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Save</button>
            <button class="cancel" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Cancel</button>
        </div>
    </td>
</form>