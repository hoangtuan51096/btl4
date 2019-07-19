$(document).on('click', '.list-trash', function(event){
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
            $('.content-trash').html(result);
        }
    });
});