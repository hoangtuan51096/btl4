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
            dataType: 'html',
            data: data,
            success: function(result){
                $('#result').html(result);
                $('#myModal').modal('hide');
                $('.modal-backdrop').remove()
            }
        });
    });
    $('button.edit').click(function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-user', $(this));
    })
    
});