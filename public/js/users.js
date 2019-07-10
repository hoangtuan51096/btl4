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
            url: 'create-user',
            type: 'POST',
            dataType: 'html',
            data: data,
            success: function(result){
                $('#result').html(result);
                $('#myModal').modal('hide');
            }
        });
    });
    $('button.edit').click(function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-user', $(this));
    })
    
});