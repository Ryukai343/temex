var deleteItemId;
$('html').on('click', '.delete-item-btn', function () {
    deleteItemId = $(this).data('item-id');

    $('#deleteItemModal').modal('show');
});

$('#confirmDeleteBtn').click(function () {
    var csrf = $("meta[name='csrf']").attr("content");
    alert(csrf);
    $.ajax({
        type: 'POST',
        url: '/items/delete/' + deleteItemId,
        data: {
            '_token': csrf,
            '_method': 'DELETE'
        },
        success: function (data) {
            $('#item_id_' + deleteItemId).remove();
            $('#deleteItemModal').modal('hide');
        },
        error: function (data) {
            console.error('Error deleting item:', data);

            $('#deleteItemModal').modal('hide');
        }
    });
});
