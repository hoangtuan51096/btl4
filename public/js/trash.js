$(document).ready(function(){
    $('a.nav-link').click(function(event) {
        event.preventDefault();
        var url = $(this).data('url');  
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: url,
            dataType: 'html',
            success: function(result){
                $('div#viewTrash').html(result);
            }
        });
    });

    // $(document).on('click', 'button.restore', function() {
    //     event.preventDefault();
    //     var url = $(this).data('url')
    //     var id = $(this).data('id');
    //     var rowid = $(this).data('rowid');
    //     var tr = $(this).parents('tr');
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: url,
    //         type: 'POST',
    //         data: {id: id, rowid: rowid},
    //         success: function(result){
    //             tr.empty();
    //             tr.html(result);
    //         }
    //     });
    // });
});