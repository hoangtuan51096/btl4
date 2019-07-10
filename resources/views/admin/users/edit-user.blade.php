
<th scope="row">{{  $rowid }}</th>
<td>{{ $user->account }}</td>
<td>{{ $user->email }}</td>
<form >
    <td class="name"><input classtype="text" name="name" value="{{ $user->name }}"></td>
    <td>
        <div>
            <button class="save-user" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Save</button>
            <button class="cancel" data-rowid="{{ $rowid }}" data-id="{{ $user->id }}">Cancel</button>
        </div>
    </td>
</form>
@push('after_js')
	<script type="text/javascript">
		$(document).on('click', 'button.save-user', function(event){
        console.log(1);
        event.preventDefault();
        var id = $(this).data('id');
        var rowid = $(this).data('rowid');
        var tr = $(this).parents('tr');
        var name = tr.find('td.name').children.val();
        $ajax({
            url: 'edit-user',
            type: 'POST',
            data: {id: id, name: name, rowid: rowid},
            success: function(){
                tr.empty();
                tr.html(result);
            }
        });
    });
	</script>
@endpush