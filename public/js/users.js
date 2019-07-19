$(document).ready(function(){
    $('button#createUser').click(function(){
        var data = {
            account : $('#account').val(),
            email : $('#email').val(),
            password : $('#password').val(),
            name : $('#name').val(),
            role : $('#role').val(),
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'create-user',
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
    $(document).on('click', 'button.edit', function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-user', $(this));
    });
    $(document).on('click', 'button.cancel-edit-user', function(event){
        event.preventDefault();
        ajaxLoad('GET', 'cancel-edit-user', $(this));
    });
    $(document).on('click', 'button.save-user', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var rowid = $(this).data('rowid');
        var tr = $(this).parents('tr');
        var name = tr.find('td.name').children().val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'edit-user',
            type: 'POST',
            data: {id: id, name: name, rowid: rowid},
            success: function(result){
                $("#result").notify("Sua thanh cong", "success", { position:"right" });
                tr.empty();
                tr.html(result);
            }
        });
    });
    $(document).on('click', '.list-user', function(event){
        event.preventDefault();
        var href = $(this).data('href');
        var url = $(this).data('url');
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(result){
                history.pushState({
                    id: 'homepage'
                }, 'pageTitle', href);
                $('.content-users').html(result);
            }
        });
    });
});
