$(document).ready(function () {
    var typeId;
    $('.ajax_type_mobile').click(function (e) {
        e.preventDefault();
        typeId = $(this).data('type-id');
        callAjax(typeId);
    });
});
$(document).ready(function () {
    var typeId;
    $('.ajax_type').click(function (e) {
        e.preventDefault();
        typeId = $(this).data('type-id');
        callAjax(typeId);
    });
});

function callAjax(typeId) {
    $.ajax({
        type: 'GET',
        url: '/type/' + typeId,
        success: function (data) {
            var itemContainerHtml = $('<div>').html(data).find('#item-container').html();
            console.log(itemContainerHtml);
            $('#item-container').html(itemContainerHtml);
        },
        error: function (data) {
            console.error('Error loading items:', data);
        }
    });
}
