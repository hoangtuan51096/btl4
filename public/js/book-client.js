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
});