$(document).ready(function(){
    $('button#createAuthor.btn.btn-info').click(function(){
        var data = {
            name : $('#name').val(),
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'create-author',
            type: 'POST',
            data: data,
            error: function(data){
                var errors = data.responseJSON.errors;
                errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' +value[0]+ '</li>';
                });
                errorsHtml += '</ul></di>';
                $( '.errors' ).html( errorsHtml );
            },
            success: function(result){
                $("#result").notify("Them moi thanh cong", "success");
                $('#newRow').html(result);
                $('#myModal').modal('hide');
                $('.modal-backdrop').remove();
            },
        });
    });
    $(document).on('click', 'button.edit-author', function(event) {
        event.preventDefault();
        ajaxLoad('GET', 'edit-author', $(this));
    });

    $(document).on('click', 'button.save-author', function() {
        event.preventDefault();
        var id = $(this).data('id');
        var rowid = $(this).data('rowid');
        var tr = $(this).parents('tr');
        var name = tr.find('td.name').children().val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'update-author',
            type: 'POST',
            data: {id: id, name: name, rowid: rowid},
            success: function(result){
                $("#result").notify("Sua thanh cong", "success");
                tr.empty();
                tr.html(result);
            }
        });
    });
});