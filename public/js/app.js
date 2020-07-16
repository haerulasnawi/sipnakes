$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
    $('#modal-title').text(title);
    $('#modal-button-save').text(me.hasClass('edit')? 'Update' : 'Create');
    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });
    $('#modal').modal('show');
});
$('#modal-button-save').click(function(event){
    event.preventDefault();
    var form= $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';
        form.find('.invalid-feedback').remove();
        form.find('.form-control').removeClass('is-invalid');
        // console.log(url);
    $.ajax({
        url:url,
        method:method,
        data:form.serialize(),
        success:function(response){
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();
            swal.fire(
                'Success!',
                'Password Berhasil Diubah',
                'success'
            );
        },
        error:function(xhr){
            var res=xhr.responseJSON;
            // console.log(res);
            if($.isEmptyObject(res)==false){    
                $.each(res.errors,function(key,value){
                    $('#'+key)
                    .closest('.form-control')
                    .addClass('is-invalid')
                    // .append('<span class="help-block"><strong>' + value + '</strong></span>')
                    .after('<div class="invalid-feedback">' + value + '</div>')
                });
            }
        }
    })
});
