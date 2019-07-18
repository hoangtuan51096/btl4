$(document).ready(function(){
    $(document).on('click', 'button.detail-book', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'detail-book',
            type: 'GET',
            data: {id: id},
            success: function(result){
                $('div#content-book').html(result);
            }
        });
    });
    $(document).on('click', '.rent-book', function(event){
        var time = $('#end-time').val();
        var id = $('#id-book').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'rent-book',
            data: {id: id, end_at: time},
            error: function(data){
                var errors = data.responseJSON.errors;
                $.each( errors, function( key, value ) {
                    $('#end-time').notify(value[0],'error');
                });
            },
            success: function(result){
                $('body').html(result);
            }
        })
    })
});