function updateOrder() {
    var notes = $('ul#sortable li');
    if (notes.length > 0) {

        var order = [];
        $.each(notes.get().reverse(), function(index, value) {
            order.push({'id': $(value).attr('id'), 'order': index});
        });
        $.post('/altadmin/widget/sliderMainPage/changeOrder', {'neworder': JSON.stringify(order)}, function(data) {

            var response = eval('(' + data + ')');
            if (response.status == 'OK') {
                $('#myModal').modal('show');
            }
            else {
                alert(response.mes);
            }
        });
    }
    return false;
}