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
            dataType: 'html',
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
            }
        });
    });
    $('button.edit-author').click(function(event) {
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
                tr.empty();
                tr.html(result);
            }
        });
    });
});