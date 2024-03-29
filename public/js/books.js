$(document).ready(function(){
    $('button#createBook.btn.btn-info').click(function(){
        var data = {
            name : $('#name').val(),
            author_id : $('#author_id').val(),
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'create-book',
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
                $('#result').notify("Them moi thanh cong", "success");
                $('#newRow').html(result);
                $('#myModal').modal('hide');
                $('.modal-backdrop').remove();
            },
        });
    });
    $(document).on('click', 'button.edit-book', function(event){
        event.preventDefault();
        ajaxLoad('GET', 'edit-book', $(this));
    });
    $(document).on('click', 'button.cancel-edit-book', function(event){
        event.preventDefault();
        ajaxLoad('GET', 'cancel-edit-book', $(this));
    });
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
                $("#result").notify("Sua thanh cong", "success");
                tr.empty();
                tr.html(result);
            }
        });
    });
    $(document).on('click', '.list-book', function(event){
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
                $('.content-book').html(result);
            }
        });
    });
    // $(document).on('click', '.list-book', function(event){
    //     event.preventDefault();
    //     var myurl = $(this).attr('href');
    //     var page = $(this).attr('href').split('page=')[1];
    //     getData(page);
    // });
});
