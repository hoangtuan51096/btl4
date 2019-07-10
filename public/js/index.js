$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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