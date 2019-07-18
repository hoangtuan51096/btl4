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
// $(document).ready(function(){
//     $(document).on('click', '.list-book-client', function(event){
//         var url = $(this).data('url');
//         $.ajax({
//             type: GET,
//             url: url,
//             dataType: 'html',
//             success: function(result) {
//                 $('div#content-book').html($result);
//             }
//         });
//     });
// });