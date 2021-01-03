$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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
            if (x!=null) {
                $('#nik').val(x).prop('readonly',true);
            }
            
        }
    });
    $('#modal').modal('show');      
});
$('#modal-button-save').click(function(event){
    event.preventDefault();
        var form= $('#modal-body form');
        url = form.attr('action');
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';
        form.find('.invalid-feedback').remove();
        form.find('.form-control').removeClass('is-invalid');
        res=$('#modal-title').text();
        var x =$('#str_file');
    if (x.length) {
        var form= new FormData(form[0]);
        $.ajax({
            url:url,
            method:method,
            data:form,
            // data:form.serialize(),
            contentType:false,
            processData:false,
            success:function(x){
                $('#modal').modal('hide');
                $('#datatable').DataTable().ajax.reload();
                $('#sip_datatable').DataTable().ajax.reload();
                $('#str_datatable').DataTable().ajax.reload();
                swal.fire(
                    ''+x[1]+'',
                    ''+x[2]+'',
                    ''+x[0]+''
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
    }else{
        $.ajax({
            url:url,
            method:method,
            data:form.serialize(),
            success:function(){
                form.trigger('reset');
                $('#modal').modal('hide');
                $('#datatable').DataTable().ajax.reload();
                Swal.fire(
                    'Yaay!',
                    ''+res+' Berhasil',
                    'success'
                );
                location.reload();
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
    }
    
});
// $('#cariidentitas').click(function(event){
$('.form-control').keypress(function(event){
    if (event.which===13) {
    event.preventDefault();
    $('#dataidentitas').prop('hidden',true);
    $('.form-group').find('.invalid-feedback').remove();
    $('.form-group').find('.form-control').removeClass('is-invalid');
    $.ajax({
        url:"/datasipnakes",
        method:'get',
        data:$('form').serialize(),
        success:function(response) {
            if (typeof response=="object") {
                var dat=response;
                Swal.fire({
                    title: 'NIK sudah terdaftar atas nama:<br>'+dat.Nama,
                    text: "Apakah benar ini identitas milik anda?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Klaim NIK ini!',
                    cancelButtonText: 'Tidak',
                     }).then((result) => {
                    if (result.value) {
                        swal.fire({
                            title: 'Mohon bersabar..!',
                            text: 'Sedang berusaha..',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                        $.ajax({
                            url:'nakes/'+dat.id,
                            method:'put',
                            data:dat,
                            // dataType : "html",
                            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                            success:function(result) {
                                Swal.fire(
                                    result,
                                    'Data sudah di klaim.',
                                    'success'
                                  )
                                  $('.cari').remove();
                                  $('#dataidentitas').removeAttr('hidden');
                                  $.each(response,function(key,value){
                                      $('#'+key)
                                      .text(': '+value)
                                  }); 
                            },
                            error:function(xhr){
                                var res=xhr.responseJSON;
                                console.log(res);
                                // Swal.fire(
                                //     'Gagal',
                                //     'Data sudah di klaim.',
                                //     'error'
                                //   )
                            }
                        });                                             
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
                        $('.modal-show').click(); 
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
