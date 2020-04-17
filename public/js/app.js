$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
    $('#modal-title').text(title);
    $('#modal-button-save').text('Create');
    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });
    $('#modal').modal('show');
});
