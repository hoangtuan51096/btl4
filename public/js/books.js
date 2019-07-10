$(document).ready(function(){
    $('button#createBook.btn.btn-info').click(function(){
        var data = {
            name : $('#name').val(),
            author_id : $('#author_id').val(),
        }
        console.log(data.author_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'create-book',
            type: 'POST',
            dataType: 'html',
            data: data,
            success: function(result){
                $('#result').html(result);
                $('#myModal').modal('hide');
                $('.modal-backdrop').remove()
            }
        });
    });
    $('button.edit-book').click(function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-book', $(this));
    })
    $(document).on('click', 'button.save-book', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var rowid = $(this).data('rowid');
        var tr = $(this).parents('tr');
        var name = tr.find('td.name').children().val();
        var author_id = tr.find('td.authorID').children().val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'update-book',
            type: 'POST',
            data: {id: id, name: name, author_id:author_id, rowid: rowid},
            success: function(result){
                tr.empty();
                tr.html(result);
            }
        });
    }); 
});