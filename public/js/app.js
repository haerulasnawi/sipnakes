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
            var x= $('#number').val();
            $('#nik').val(x).prop('readonly',true);            
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
        res=$('#modal-title').text();
    $.ajax({
        url:url,
        method:method,
        data:form.serialize(),
        success:function(response){
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();
            swal.fire(
                'Yaay!',
                ''+res+' Berhasil',
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
// $('#cariidentitas').click(function(event){
$('.form-control').keypress(function(event){
    if (event.which===13) {
    event.preventDefault();
    $('.author-box').remove();
    $('.form-group').find('.invalid-feedback').remove();
    $('.form-group').find('.form-control').removeClass('is-invalid');
    // var u=json_encode($model);
    //             console.log(u.id);
    var nik=$('input:text').val();
    // console.log(nik);
    $.ajax({
        url:"/datasipnakes",
        method:'get',
        data:$('form').serialize(),
        // data:{
        //     text:$('#text').val()
        // },
        // dataType:"html",
        success:function(response) {
            if (typeof response=="object") {                  
                Swal.fire({
                    title: 'NIK sudah terdaftar',
                    text: "Apakah benar ini identitas milik anda?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Klaim NIK ini!',
                    cancelButtonText: 'Tidak',
                  }).then((result) => {
                    if (result.value) {
                      Swal.fire(
                        'Berhasil!',
                        'Data sudah di klaim.',
                        'success'
                      )
                    } 
                  })
            }else{                
                Swal.fire({
                    customClass:{
                        confirmButton:'swal2-confirm swal2-styled modal-show'
                    },
                    title: '<strong>NIK <u>'+ response +'</u> Tidak Ditemukan</strong>',
                    text: "Apakah nomor induk kependudukan ini sudah tepat dan benar ini milik anda?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'OK Gunakan',
                    cancelButtonText: 'Tidak',
                  }).then((result) => {
                    if (result.value) {
                        $('#cariidentitas').click();                        
                    } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      Swal.fire(
                        'OK Ketik Lagi!',
                        'NIK tidak mungkin tertukar',
                        'warning'
                      )
                    }
                  })
            }
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
        },
        complete:function(xhr,status){

        }
    });
}
});
// $('.form-control').keypress(function(e){
//     if (e.which===13) {
//         e.preventDefault();
//         $('#cariidentitas').click();
        
//     }
// })
