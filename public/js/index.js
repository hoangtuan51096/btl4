$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#result').hide();
function ajaxLoad(method, url, button) {
    var id = button.data('id');
    var rowid = button.data('rowid');
    var tr = button.parents('tr');
    var data = {id : id , rowid: rowid};
     $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'html',
        success: function(result) {
            tr.empty();
            tr.html(result);
        },
    });
}
function ajaxLoadBook(method, button) {
    var url = button.data('url');
     $.ajax({
        type: method,
        url: url,
        dataType: 'html',
        success: function(result) {
            $('.content-list-book').html(result);
        },
    });
}
$(document).ready(function(){
    // $(document).on('click', 'button.cancel-edit', function(event){
    //     event.preventDefault();
    //     var id = button.data('id');
    //     var rowid = button.data('rowid');
    //     var tr = button.parents('tr');
    //     var url = button.data('url');
    //     var data = {id : id , rowid: rowid};
    //      $.ajax({
    //         type: POST,
    //         url: url,
    //         data: data,
    //         dataType: 'html',
    //         success: function(result) {
    //             tr.empty();
    //             tr.html(result);
    //         },
    //     });
    //});
    // $(document).on('click', '.list-book-client', function(event){
    //     var url = $(this).data('url');
    //     $.ajax({
    //         type: GET,
    //         url: url,
    //         dataType: 'html',
    //         success: function(result) {
    //             $('div#content-book').html($result);
    //         }
    //     });
    // });
});
$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            getData(page);
        }
    }
});

$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];

        getData(page);
    });

});

function getData(page){
    $.ajax(
    {
        url: '?page=' + page,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#tag_container").empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });
}