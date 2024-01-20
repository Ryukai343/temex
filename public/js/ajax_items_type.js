$(document).ready(function () {
    var typeId;
    $('.ajax_type_mobile').click(function (e) {
        e.preventDefault();
        typeId = $(this).data('type-id');
        alert(typeId);
        $.ajax({
            type: 'GET',
            url: '/type/' + typeId,
            data: {
                // 'type_id': typeId,
            },
            success: function (data) {
                // Replace the content of #item-container with the loaded items
                $('#item-container').html(data);
            },
            error: function (data) {
                console.error('Error loading items:', data);
            }
        });
    });
});
$(document).ready(function () {
    var typeId;
    $('.ajax_type').click(function (e) {
        e.preventDefault();
        typeId = $(this).data('type-id');
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
    });
});
