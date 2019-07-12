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
            dataType: 'json',
            data: data,
            success: function(result){
                if (result.errors !== null) {
                    let errorsHtml = '<div class="alert alert-danger">';
                    errorsHtml += result.errors.map(function(error) {
                        return `<li>${error}</li>`;
                    }).join('') + '</div>';

                    $('.errors').html(errorsHtml);

                    return;
                } else {
                    $('#result').html(result);
                    $('#myModal').modal('hide');
                    $('.modal-backdrop').remove()
                }
                console.log(result);
            },
            error: function(request, status, error){
                json = $.parseJSON(request.responseText);
                console.log(request);
                $.each(json.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+value+'</p>');
                });
                $("#result").html('');
            }
        });
    });
    $(document).on('click', 'button.edit', function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-user', $(this));
    })
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
                //console.log(result)
                tr.empty();
                tr.html(result);
                //$('#result').append('dwqdwq');
            }
        });
    }); 
});