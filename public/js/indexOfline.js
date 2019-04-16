// $(document).keydown(function(event){
//     if(event.keyCode==123){
//         return false;
//     }
//     else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
//              return false;
//     }
// });
// $(document).on("contextmenu",function(e){        
//    e.preventDefault();
// });
function removemenu() {
    $('.site-wrapper.clearfix').removeClass('site-wrapper--has-overlay');
}
$(document).ready(function() {
   

 
    $("#selecttorneo").select2({
        placeholder: "Elegir Torneo",
        allowClear: true,
    });
         $("#select-torneo-fixture").select2({
        placeholder: "Filtrar Torneo",
        allowClear: true,
    });
    $("#contypscode").select2({
        placeholder: "Filtrar Tipo",
        allowClear: true,
    });
    $("#selecttorneo-edit").select2({
        placeholder: "Filtrar Torneo",
        allowClear: true,
    });
    $("#selecttorneo-edit").select2({
        placeholder: "Filtrar Torneo",
        allowClear: true,
    });
    $("#selectTorneosEquipos").select2({
        placeholder: "Filtrar Torneos",
        allowClear: true,
    });
    $("#select-torneo-admin-torneos").select2({
        placeholder: "Filtrar Torneos",
        allowClear: true,
    });
    $("#contypscode1").select2({
        placeholder: "Filtrar Tipo",
        allowClear: true,
    });
    $("#select-torneo-equipo").select2({
        placeholder: "Filtrar Torneos",
        allowClear: true,
    });
    $('#selectTorneosEquipos').val(0).trigger('change');
    $('#select-torneo-admin-torneos').val(0).trigger('change');
    $('#contypscode1').val(null).trigger('change');
    // $('#selectconmemscode').val(1).trigger('change');
    $('#select-torneo-fixture').val(null).trigger('change');
    // $('#selectconmemscode').change(function() {
    //     var a = $('#selectconmemscode').find(':selected').data('image')
    //     $("#imagemember").attr("src", a);
    // });
    // $('#selectconmemscode').on('select2:selecting', function(e) {
    //     var a = $('#selectconmemscode').find(':selected').data('image')
    // });
    // $('#selectconmemscode').on('select2:unselecting', function(e) {
    //     var a = $('#selectconmemscode').find(':selected').data('image')
    //     $("#imagemember").attr("src", null);
    // });
    $('#selecttorneo').val(null).trigger('change');
    $('#selecttorneo').change(function() {
        var a = $('#selecttorneo').find(':selected').data('image')
        $("#imagetorneo").attr("src", a);
    });
    $('#select-torneo-admin-torneos').change(function() {
        $('#table-admin-gestionar-grupos').DataTable().ajax.reload();
    });
    $('#selecttorneo').on('select2:selecting', function(e) {
        var a = $('#selecttorneo').find(':selected').data('image')
    });
    $('#selecttorneo').on('select2:selecting', function(e) {
        var a = $('#selecttorneo').find(':selected').data('image')
    });
    $('#selecttorneo').on('select2:unselecting', function(e) {
        var a = $('#selecttorneo').find(':selected').data('image')
        $("#imagetorneo").attr("src", null);
    });
    $('#selecttorneo-edit').change(function() {
        var a = $('#selecttorneo-edit').find(':selected').data('image')
        $("#imagetorneo-edit").attr("src", a);
    });
    $('#selecttorneo-edit').on('select2:unselecting', function(e) {
        var a = $('#selecttorneo-edit').find(':selected').data('image')
        $("#imagetorneo-edit").attr("src", null);
    });
    $("#selectconmemscode").select2({
        placeholder: "Filtrar Membresia",
        templateResult: formatState1,
        ajax: {
            url: "/selectMenbresia",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            image: item.conmemvimgm,
                            text: item.conmemtname,
                            id: item.conmemscode
                        }
                    })
                };
            },
            cache: true
        }
    }).val(1).change();
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#edit-perfil-image-upload", // Default: .image-upload
        preview_box: "#edit-perfil-image-preview", // Default: .image-preview
        label_field: "#edit-perfil-image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload1", // Default: .image-upload
        preview_box: "#image-preview1", // Default: .image-preview
        label_field: "#image-label1", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload2", // Default: .image-upload
        preview_box: "#image-preview2", // Default: .image-preview
        label_field: "#image-label2", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload-admin-torneo", // Default: .image-upload
        preview_box: "#image-preview-admin-torneo", // Default: .image-preview
        label_field: "#image-label-admin-torneo", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload-admin-equipo", // Default: .image-upload
        preview_box: "#image-preview-admin-equipo", // Default: .image-preview
        label_field: "#image-label-admin-equipo", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload3", // Default: .image-upload
        preview_box: "#image-preview3", // Default: .image-preview
        label_field: "#image-label3", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: "#image-upload5", // Default: .image-upload
        preview_box: "#image-preview5", // Default: .image-preview
        label_field: "#image-label5", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
   
    // ('btn-refresh');
});
$('#datetimepicker1').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY'
});
$('#edit-perfil-datetimepicker1').datetimepicker({
    viewMode: 'years',
    locale: 'es',
    format: 'DD-MM-YYYY'
});
$('#datetimepicker-toufixthour').datetimepicker({
    // format: 'HH:mm',
    locale: 'es',
    format: 'HH:mm',
    defaultDate: new Date(),
});
$('#datetimepicker-toufixdplay').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY',
    defaultDate: new Date(),
})
$('#datetimepicker-fixture').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY',
    defaultDate: new Date(),
}).on('dp.hide', function(e) {
    debugger
    $('#table-fixture').DataTable().ajax.reload();
});
$('#selectTorneosEquipos').change(function(e) {
    // var contypscode = $('#contypscode1').val();
    // var touinfscode = $('#touinfscode-select').val();
    // comboEquipos(contypscode,touinfscode);
    // $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#contypscode1').change(function(e) {
    var contypscode = $('#contypscode1').val();
    var touinfscode = $('#touinfscode-select').val();
    comboEquipos(touinfscode, contypscode);
    // $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#select-touteascode1').change(function(e) {
    // $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#datetimepicker2').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY'
});
$('#datetimepicker-filtrer-posiciones').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY',
    defaultDate: new Date(),
}).on("dp.hide", function(e) {
    $('#table-pociciones-dia').DataTable().ajax.reload();
});
$('#datetimepicker3').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY'
});
$('#cancelar').click(function() {
    $('#modal-nuevo-torneo').modal('show');
    $('#modal-admin-add-torneo').modal('hide');
});
$('#cancelar-equipo').click(function() {
    $('#modal-nuevo-equipo').modal('show');
    $('#modal-admin-add-equipo').modal('hide');
});
$("#formStore").submit(function(e) {
    e.preventDefault();
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var plainftname = $('input[name=plainftname]').val();
    var secusrtmail = $('#register-secusrtmail').val();
    var secusrtpass = $('#register-secusrtpass').val();
    var plainfddobp = $('input[name=plainfddobp]').val();
    var plainftgder = $("input[name='plainftgder']:checked").val();
    var conmemscode = $('#selectconmemscode').val();
    var plainfvimgp = $('input[name=plainfvimgp').prop('files')[0];
    if (plainfvimgp != null) {
        var file_size = $('#image-upload')[0].files[0].size / 1024;
    } else {
        var file_size = 0;
    }
    if (file_size > 1024) {
        // $("#file_error").html("El tamaño del archivo es mayor que 1 MB");
        swal({
            // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
            title: "El tamaño del archivo",
            text: "es mayor que 1 MB",
            type: "error",
            html: true,
            showConfirmButton: true,
            closeOnConfirm: true
        });
    } else {
        formData.append("_token", _token);
        formData.append("plainftname", plainftname);
        formData.append("secusrtmail", secusrtmail);
        formData.append("secusrtpass", secusrtpass);
        formData.append("plainfddobp", plainfddobp);
        formData.append("plainftgder", plainftgder);
        formData.append("plainfvimgp", plainfvimgp);
        formData.append("conmemscode", conmemscode);
        formData.append("tipo", 0);
        $.ajax({
            url: '/secusr',
            type: 'post',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function(data) {
                // 
                if (data.mail == true) {
                    swal({
                        // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
                        title: "CORREO DUPLICADO",
                        text: "EL CORREO: " + " <strong> " + secusrtmail.toUpperCase() + "</strong>" + " YA EXISTE",
                        type: "error",
                        html: true,
                        showConfirmButton: true,
                        closeOnConfirm: true
                    });
                } else {
                    window.location.href = "/";
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
});

function validateMail() {
    var _token = $('input[name=_token]').val();
    secusrtmail = $('#secusrtmail').val();
    $.ajax({
        url: '/validateMail',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            secusrtmail: secusrtmail
        },
        success: function(data) {
            if (data.mail == false) {
                $("#secusrtmail").focus();
                swal({
                    title: "CORREO INCORRECTO",
                    text: "El correo: " + " <strong> " + secusrtmail + "</strong>" + " introduccida no existe",
                    type: "error",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
                $("#secusrtmail").focus();
            } else if (data.mail == null) {
                $("#secusrtmail").focus();
                swal({
                    title: "CORREO INCORRECTO",
                    text: "El correo: " + " <strong> " + secusrtmail + "</strong>" + " introduccida no existe",
                    type: "error",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                $.ajax({
                    url: '/sendValidateMail',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: {
                        secusricode: data.secusr.secusricode,
                        secusrtmail: data.secusr.secusrtmail
                    },
                    success: function(data2) {
                        swal({
                            title: "CORREO CORRECTO",
                            text: "Se ha enviado un enalce al correo: " + " <strong> " + secusrtmail + "</strong> <br>" + " para reestablecer su contraseña",
                            type: "success",
                            html: true,
                            showConfirmButton: true,
                            closeOnConfirm: true
                        });
                    }
                });
            }
        }
    });
}
// $("#form-edit-perfil").submit(function(e) {;
// });
$("#formgrupo").submit(function(e) {
    e.preventDefault();
    document.getElementById('crear-grupo-btn-subtmit').disabled = 1;
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var tougrptname = $('input[name=tougrptnamec]').val();
    var touinfscode = $('#selecttorneo').val();
    var tougrpvimgg = $('input[name=tougrpvimgg').prop('files')[0];
    formData.append("_token", _token);
    formData.append("tougrptname", tougrptname);
    formData.append("touinfscode", touinfscode);
    formData.append("tougrpvimgg", tougrpvimgg);
    $.ajax({
        url: '/tougrp',
        type: 'post',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function(data) {
            if(data == false){
                swal({
                        // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
                        title: "ADVERTENCIA",
                        text: "No puede crear mas grupos ya que llego al limite de su membresia. ",
                        type: "info",
                        html: true,
                        showConfirmButton: true,
                        closeOnConfirm: true
                    });
            }else{
            window.location.href = "/";

            }
    document.getElementById('crear-grupo-btn-subtmit').disabled = 0;

        },
    });
});

$("#form-admin-gestionar-grupo-add").submit(function(e) {
    e.preventDefault();;
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var tougrptname = $('#admin-gestionar-grupo-tougrptname').val();
    var touinfscode = $('#admin-gestionar-grupo-touinfscode-hidden').val();
    var tougrpicode = $('#admin-gestionar-grupo-tougrpicode-hidden').val();
    var plainficode = $('#select-admin-gestionar-grupo-securs').val();
    var tougrpvimgg = $('input[name=admin-gestionar-grupo-tougrpvimgg]').prop('files')[0];

    var tougrpsmaxp = $('#admin-gestionar-grupo-tougrpsmaxp').val();
    var tougrpsmedp = $('#admin-gestionar-grupo-tougrpsmedp').val();
    var tougrpsminp = $('#admin-gestionar-grupo-tougrpsminp').val();
    var tipo = $('#admin-gestionar-grupo-tipo').val();
    debugger
    formData.append("tougrptname", tougrptname);
    formData.append("tougrpicode", tougrpicode);
    formData.append("plainficode", plainficode);
    formData.append("touinfscode", touinfscode);
    formData.append("tougrpvimgg", tougrpvimgg);
    formData.append("tougrpsmaxp", tougrpsmaxp);
    formData.append("tougrpsmedp", tougrpsmedp);
    formData.append("tougrpsminp", tougrpsminp);
    formData.append("tipo", tipo);
    var actionurl = e.currentTarget.action;

    $.ajax({
        url: actionurl,
        type: 'post',
         headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function(data) {
            debugger

            $('#table-admin-gestionar-grupos').DataTable().ajax.reload();
            $('#modal-admin-gestionar-grupo').modal('show');
            $('#modal-admin-gestionar-grupo-add').modal('hide');
            // window.location.href = "/";
        },
    });
});
$("#form-admin-torneo").submit(function(e) {
    e.preventDefault();
    var formData = new FormData();
    var tipo = $('#tipo').val();
    var touinfscode = $('#touinfscode').val();
    var touinfsnumt = $('#touinfsnumt').val();
    var touinfdstat = $('#touinfdstat').val();
    var touinfdendt = $('#touinfdendt').val();
    var touinftname = $('#touinftname').val();
    var _token = $('input[name=_token]').val();
    var touinfvlogt = $('input[name=touinfvlogt]').prop('files')[0];
    formData.append("tipo", tipo);
    formData.append("touinfscode", touinfscode);
    formData.append("touinfsnumt", touinfsnumt);
    formData.append("touinfdstat", touinfdstat);
    formData.append("touinfdendt", touinfdendt);
    formData.append("touinftname", touinftname);
    formData.append("touinfvlogt", touinfvlogt);
    var actionurl = e.currentTarget.action;
    $.ajax({
        url: actionurl,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        dataType: 'json',
        data: formData,
        processData: false,
        success: function(data) {
            $('.c').val(null);
            $("#image-preview-admin-torneo").css("background-image", "url('')");
            $("#image-preview-admin-torneo").css("background-size", "cover");
            $("#image-preview-admin-torneo").css("background-position", "center center");
            $('#table-admin-torneo').DataTable().ajax.reload();
            $('#modal-nuevo-torneo').modal('show');
            $('#modal-admin-add-torneo').modal('hide');
        },
    });
});
$("#form-admin-equipo").submit(function(e) {
    e.preventDefault();
    var _token = $('input[name=_token]').val();
    var formData = new FormData();
    var tipo = $('#tipo-equipo').val();
    var touteascode = $('#touteascode').val();
    var touteatname = $('#touteatname').val();
    var contypscode = $('#contypscode').val();
    var touteavimgt = $('input[name=touteavimgt]').prop('files')[0];
    formData.append("tipo", tipo);
    formData.append("touteascode", touteascode);
    formData.append("touteatname", touteatname);
    formData.append("contypscode", contypscode);
    formData.append("touteavimgt", touteavimgt);
    var actionurl = e.currentTarget.action;
    $.ajax({
        url: actionurl,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        dataType: 'json',
        data: formData,
        processData: false,
        success: function(data) {
            $('.c').val(null);
            $("#image-preview-admin-equipo").css("background-image", "url('')");
            $("#image-preview-admin-equipo").css("background-size", "cover");
            $("#image-preview-admin-equipo").css("background-position", "center center");
            $('#table-admin-equipo').DataTable().ajax.reload();
            $('#modal-nuevo-equipo').modal('show');
            $('#modal-admin-add-equipo').modal('hide');
        },
    });
});
$("#form-admin-torneo-equipo").submit(function(e) {
    e.preventDefault();
    var _token = $('input[name=_token]').val();
    var touinfscode = $('#touinfscode-select').val();
    var contypscode1 = $('#contypscode1').val();
    var equipos = $('#select-torneo-equipo').val();
    var actionurl = '/agregarTorneosEquipos';
    $.ajax({
        url: actionurl,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        dataType: 'json',
        data: {
            touinfscode: touinfscode,
            contypscode1: contypscode1,
            equipos: equipos
        },
        success: function(data) {
            $('#table-admin-torneo-equipo').DataTable().ajax.reload();
            $('#modal-nuevo-torneo-equipo').modal('show');
            $('#modal-admin-add-torneo-equipo').modal('hide');
        },
    });
});

function EditarTorneo(touinfscode) {
    $('#tipo').val(1);
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/touinf/' + touinfscode,
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            touinfscode: touinfscode
        },
        success: function(data) {
            $('#touinfscode').val(data.touinfscode);
            $('#touinfsnumt').val(data.touinfsnumt);
            $('#touinfdstat').val(data.touinfdstat);
            $('#touinfdendt').val(data.touinfdendt);
            $('#touinftname').val(data.touinftname);
            $("#image-preview-admin-torneo").css("background-image", "url('images/" + data.touinfvlogt + "')");
            $("#image-preview-admin-torneo").css("background-size", "cover");
            $("#image-preview-admin-torneo").css("background-position", "center center");
            $('#modal-nuevo-torneo').modal('hide');
            $('#modal-admin-add-torneo').modal('show');
        }
    });
}

function editarFixture(toufixicode) {
    $('#modal-gestionar-fixture').modal('show');
    $('#modal-admin-add-fixture').modal('hide');
    $('#toufixicode-tipo').val(1);
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/toufix/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#select-touteascode1').empty();
            $('#select-touteascode2').empty();
            $('#select-touteascode1').append('<option value="' + data.touteascode + '">' + data.touteatname + '</option>');
            $('#select-touteascode2').append('<option value="' + data.touteascode2 + '">' + data.touteatname2 + '</option>');
            $('#toufixicode-hidden').val(data.toufixicode);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#dates-toufixthour').val(data.toufixthour);
            $('#dates-toufixdplay').val(data.toufixdplay);
            $('#toufix-toufixyxval').val(data.toufixyxval);
            $('#table-fixture').DataTable().ajax.reload();
            $('#modal-gestionar-fixture').modal('hide');
            $('#modal-admin-add-fixture').modal('show');
        }
    });
}



function editarAdminGrupo(tougrpicode) {
    $('#modal-admin-gestionar-grupo-add').modal('show');
    $('#modal-admin-gestionar-grupo').modal('hide');
    $('#admin-gestionar-grupo-tipo').val(1);
    $.ajax({
        url: '/tougrpShow/' + tougrpicode,
        type: 'get',
        datatype: 'json',
      
        success: function(data) {
            debugger
            $('#select-admin-gestionar-grupo-securs').empty();
            $('#select-admin-gestionar-grupo-securs').append('<option value="' + data.plainficode + '">' + data.plainftnick + '</option>');
            $('#admin-gestionar-grupo-tougrpicode-hidden').val(data.tougrpicode);
            $('#admin-gestionar-grupo-touinfscode-hidden').val(data.touinfscode);
            $('#admin-gestionar-grupo-touinftname').val(data.touinftname);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#admin-gestionar-grupo-tougrptname').val(data.tougrptname);
                 $("#image-preview5").css("background-image", "url('images/" + data.tougrpvimgg + "')");
            $("#image-preview5").css("background-size", "cover");
            $("#image-preview5").css("background-position", "center center");
            $('#admin-gestionar-grupo-tougrpsmaxp').val(data.tougrpsmaxp);

            $('#admin-gestionar-grupo-tougrpsmaxp').val(data.tougrpsmaxp);
            $('#admin-gestionar-grupo-tougrpsmedp').val(data.tougrpsmedp);
            $('#admin-gestionar-grupo-tougrpsminp').val(data.tougrpsminp);
            // $('#table-admin-gestionar-grupos').DataTable().ajax.reload();
            // $('#modal-admin-gestionar-grupo-add').modal('hide');
            // $('#modal-admin-gestionar-grupo').modal('show');
        }
    });
}
function editarScoreTofix(toufixicode) {
    $('#modal-gestionar-fixture').modal('hide');
    $('#modal-edit-score').modal('show');
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/toufix/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#edit-toufixicode-hidden').val(data.toufixicode);
            $('#edit-touteatname1').val(data.touteatname);
            $('#edit-touteatname2').val(data.touteatname2);
            $('#edit-touteavimgt1').attr('src', "images/" + data.touteavimgt);
            $('#edit-touteavimgt2').attr('src', "images/" + data.touteavimgt2);
            $('#edit-toufixsscr1').val(data.toufixsscr1);
            $('#edit-toufixsscr2').val(data.toufixsscr2);
        }
    });
}

function validarCampeonFechas() {
    var touinfdstat = $('#fecha-actual-server').val();
    var touinfscode = $('#session-select-touinfscode').val();
    $.ajax({
        url: '/validarCampeonFechas',
        type: 'get',
        datatype: 'json',
        data: {
            touinfscode: touinfscode,
            touinfdstat: touinfdstat
        },
        success: function(data) {
            if (data.fecha == 0) {
                swal({
                    title: "No se puede elegir el campeon por que el torneo ya ha comenzado",
                    type: "error",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                $('#modal-elegir-campeon').modal('show');
            }
        }
    });
}
$("#form-edit-score").submit(function(e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var toufixicode = $('#edit-toufixicode-hidden').val();
    var toufixsscr1 = $('#edit-toufixsscr1').val();
    var toufixsscr2 = $('#edit-toufixsscr2').val();
    $.ajax({
        url: 'editarScore',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            toufixsscr2: toufixsscr2,
            toufixsscr1: toufixsscr1,
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#table-fixture').DataTable().ajax.reload();
            $('#modal-gestionar-fixture').modal('show');
            $('#modal-edit-score').modal('hide');
        },
    });
});

function enJuego(toufixicode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/enJuego',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#table-fixture').DataTable().ajax.reload();
        }
    });
}

function procesarPartido(toufixicode) {
    debugger
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/procesarPartido',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            debugger
            $('#tablepociciones').DataTable().ajax.reload();
            $('#modal-gestionar-fixture').modal('hide');
        }
    });
}

function suspender(toufixicode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/suspender',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#table-fixture').DataTable().ajax.reload();
        }
    });
}

function EditarEquipo(touteascode) {
    $('#tipo-equipo').val(1);
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/toutea/' + touteascode,
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            touteascode: touteascode
        },
        success: function(data) {
            $('#touteascode').val(data.touteascode);
            $('#touteatname').val(data.touteatname);
            $('#contypscode').val(data.contypscode).trigger('change');
            $("#image-preview-admin-equipo").css("background-image", "url('images/" + data.touteavimgt + "')");
            $("#image-preview-admin-equipo").css("background-size", "cover");
            $("#image-preview-admin-equipo").css("background-position", "center center");
            $('#modal-').modal('hide');
            $('#modal-admin-add-equipo').modal('show');
        }
    });
}

function EliminarEquipo(touteascode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/tieneDatosTorneo",
        headers: {
            'X-CSRF-TOKEN': _token
        },
        dataType: 'json',
        type: 'POST',
        data: {
            touteascode: touteascode
        },
        success: function(data) {
            var tiene = data;
            if (tiene > 0) {
                swal({
                    title: "NO SE PUEDE ELIMINAR <br> EL PLANTEL <br> por que esta siendo usado en un Torneo. <br>",
                    type: "info",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                swal({
                    title: "DESEA ELIMINAR EL REGISTRO Nº " + touteascode,
                    text: "Esta seguro?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, eliminarlo!",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/toutea/' + touteascode,
                            type: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            datatype: 'json',
                            data: {
                                touteascode: touteascode
                            },
                            success: function(data) {
                                $('#table-admin-equipo').DataTable().ajax.reload();
                                swal({
                                    title: "ELIMINACION COMPLETA",
                                    type: "success",
                                    showConfirmButton: false,
                                    closeOnConfirm: false,
                                    timer: 2000
                                });
                            }
                        });
                        // swal("Changed!", "Confirm button text was changed!!", "success");
                    } else {
                        swal({
                            title: "CANCELADO",
                            type: "error",
                            showConfirmButton: false,
                            closeOnConfirm: false,
                            timer: 1000
                        });
                    }
                });
            }
        }
    });
}

function EliminarEquipoTorneo(touteascode, touinfscode, touttescode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/tieneDatosFix",
        headers: {
            'X-CSRF-TOKEN': _token
        },
        dataType: 'json',
        type: 'POST',
        data: {
            touttescode: touttescode
        },
        success: function(data) {
            var tiene = data;
            if (tiene > 0) {
                swal({
                    title: "NO SE PUEDE ELIMINAR <br> EL PLANTEL DEL TORNEO <br> por que ya esta relacionado en el Fixture. <br>",
                    type: "info",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                swal({
                    title: "DESEA ELIMINAR EL REGISTRO",
                    text: "Esta seguro?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, eliminarlo!",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/eliminarTorneoEquipo',
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            datatype: 'json',
                            data: {
                                touteascode: touteascode,
                                touinfscode: touinfscode
                            },
                            success: function(data) {
                                $('#table-admin-torneo-equipo').DataTable().ajax.reload();
                                swal({
                                    title: "ELIMINACION COMPLETA",
                                    type: "success",
                                    showConfirmButton: false,
                                    closeOnConfirm: false,
                                    timer: 2000
                                });
                            }
                        });
                        // swal("Changed!", "Confirm button text was changed!!", "success");
                    } else {
                        swal({
                            title: "CANCELADO",
                            type: "error",
                            showConfirmButton: false,
                            closeOnConfirm: false,
                            timer: 1000
                        });
                    }
                });
            }
        }
    });
}
$("#formgrupoconfig").submit(function(e) {
    e.preventDefault();
    var torneo = window.getParameterByName("id");
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var tougrptname = $('input[name=tougrptname]').val();
    var tougrptname = $('input[name=tougrptname]').val();
    var tougrpicode = $('#tougrpicode-edit-hidden').val();
    var touinfscode = $('#touinfscode-edit-hidden').val();
    var tougrpsmaxp = $('input[name=tougrpsmaxp]').val();
    var tougrpsmedp = $('input[name=tougrpsmedp]').val();
    var tougrpsminp = $('input[name=tougrpsminp]').val();
    // var touinfscode = $('#selecttorneo-edit').val();
    var tougrpvimgg = $('input[name=tougrpvimgg2').prop('files')[0];
    formData.append("tougrptname", tougrptname);
    formData.append("touinfscode", touinfscode);
    formData.append("tougrpicode", tougrpicode);
    formData.append("tougrpvimgg", tougrpvimgg);
    formData.append("tougrpsmaxp", tougrpsmaxp);
    formData.append("tougrpsmedp", tougrpsmedp);
    formData.append("tougrpsminp", tougrpsminp);
    var actionurl = e.currentTarget.action;
    $.ajax({
        url: actionurl,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        dataType: 'json',
        data: formData,
        processData: false,
        // data: {
        //  tougrptname: tougrptname,
        //     touinfscode: touinfscode,
        //     tougrpicode: tougrpicode
        // },
        success: function(data) {
            window.location.reload();
        },
    });
});
$("#iniciosession").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/login',
        type: 'post',
        datatype: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'secusrtmail': $('#secusrtmail').val(),
            'secusrtpass': $('#secusrtpass').val()
        },
        success: function(data) {
            debugger
            if (data.success == 0) {
                $('#false').show();
                $('#true').hide();
                $('#false').text(data.mensaje);
                setTimeout(function() {
                    $('#false').hide();
                }, 5000);
            } else {
                $('#false').hide();
                $('#true').show();
                $('#true').text(data.mensaje);
                setTimeout(function() {
                    window.location.href = "/";
                }, 2000);
            }
        }
    });
});
$("#editform").submit(function(e) {;
    e.preventDefault();
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var plainftname = $('input[name=plainftname]').val();
    var secusrtmail = $('input[name=secusrtmail]').val();
    var secusrtpass = $('input[name=secusrtpass]').val();
    var plainfddobp = $('input[name=plainfddobp]').val();
    var plainftgder = $('input[name=plainftgder]').val();
    var secusrtface = $('#secusrtface').val();
    var plainfvimgp = $('input[name=plainfvimgp').prop('files')[0];
    formData.append("_token", _token);
    formData.append("plainftname", plainftname);
    formData.append("secusrtmail", secusrtmail);
    formData.append("secusrtpass", secusrtpass);
    formData.append("plainfddobp", plainfddobp);
    formData.append("plainftgder", plainftgder);
    formData.append("plainfvimgp", plainfvimgp);
    formData.append("secusrtface", secusrtface);
    $.ajax({
        url: '/actualizarPerfil',
        type: 'post',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function(data) {;
            window.location.href = "/";
        }
    });
});
$("#form-agregar-tincazo").submit(function(e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    tougplicode = $('#session-select-tougplicode').val();
    toufixsscr1 = $('#agregar-toufixsscr1-tincazo').val();
    toufixsscr2 = $('#agregar-toufixsscr2-tincazo').val();
    toufixicode = $('#agregar-toufixicode-hidden').val();
    plapreicode = $('#agregar-plapreicode-hidden').val();
    $.ajax({
        url: '/plapre',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            plapreicode: plapreicode,
            tougplicode: tougplicode,
            toufixicode: toufixicode,
            toufixsscr1: toufixsscr1,
            toufixsscr2: toufixsscr2
        },
        success: function(data) {
            if (data.mensaje == 1) {
                $('#modal-nuevo-agregar-tinzaso').modal('hide');
                swal({
                    title: "ESTE PARTIDO ESTA EN JUEGO O FINALIZADO",
                    html: true,
                    type: "error",
                    showCancelButton: false,
                    showConfirmButton: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        tusTincazosJuego("");
                        tusTincazosPendientes("");
                        tusTincazosFinalizados("");
                        // swal("Changed!", "Confirm button text was changed!!", "success");
                    }
                });
            } else {
                document.getElementById('form-agregar-tincazo-button').disabled = 0;
                $('#modal-nuevo-agregar-tinzaso').modal('hide');
                $('#agregar-toufixicode-hidden').val(null);
                $('#agregar-plapreicode-hidden').val(null);
                $('#agregar-touteatname1-tincazo').text(null);
                $('#agregar-touteatname2-tincazo').text(null);
                $('#agregar-toufixsscr1-tincazo').val(null);
                $('#agregar-toufixsscr2-tincazo').val(null);
                // $('#agregar-touteavimgt1-tincazo').attr('src', "images/" + img1);
                // $('#agregar-touteavimgt2-tincazo').attr('src', "images/" + img2);
                tusTincazosJuego("");
                tusTincazosFinalizados("");
                tusTincazosPendientes("");
            }
            // window.location.href = "/";
        }
    });
});
$("#form-admin-toufix").submit(function(e) {
    e.preventDefault();
    var _token = $('input[name=_token]').val();
    touteascode1 = $('#select-touteascode1').val();
    touteascode2 = $('#select-touteascode2').val();
    toufixicode = $('#toufixicode-hidden').val();
    toufixdplay = $('#dates-toufixdplay').val();
    toufixthour = $('#dates-toufixthour').val();
    toufixyxval = $('#toufix-toufixyxval').val();
    tipo = $('#toufixicode-tipo').val();
    $.ajax({
        url: '/toufix',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            tipo: tipo,
            toufixicode: toufixicode,
            touteascode1: touteascode1,
            touteascode2: touteascode2,
            toufixdplay: toufixdplay,
            toufixthour: toufixthour,
            toufixyxval: toufixyxval
        },
        success: function(data) {
            $('#table-fixture').DataTable().ajax.reload();
            $('#modal-gestionar-fixture').modal('show');
            $('#modal-admin-add-fixture').modal('hide');
            $('#select-touteascode1').val(null).trigger('change');
            $('#select-touteascode2').val(null).trigger('change');
            // $('#select-torneo-fixture').val(null).trigger('change');
        }
    });
});

function tincazos(toufixicode) {
    $('#mostrar-toufixicode-hidden').val(toufixicode);
    $('#table-tincazos-grupo').DataTable().ajax.reload();
    $('#modal-nuevo-mostrar-tinzaso').modal('show');
    // $.ajax({
    //     url: '/obtenerPredicciones',
    //     type: 'get',
    //     data: {
    //         tougplicode:tougplicode,
    //         toufixicode:toufixicode,
    //         tougrpicode:tougrpicode,
    //         `:touinfscode
    //     },
    //     success: function(data) {
    //         
    //         for (var i = 0; i < data.length; i++) {
    //         }
    //         // window.location.reload();
    //         // window.location.href = "/";
    //     }
    // });
}

function mi_tincazo(toufixicode, plapreicode, val1, val2) {
    $('#agregar-toufixicode-hidden').val(toufixicode);
    $('#agregar-plapreicode-hidden').val(plapreicode);
    $.ajax({
        url: '/toufix/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function(data) {
            $('#agregar-toufixicode-hidden').val(data.toufixicode);
            $('#agregar-touteatname1-tincazo').text(data.touteatname);
            $('#agregar-touteatname2-tincazo').text(data.touteatname2);
            $('#agregar-touteavimgt1-tincazo').attr('src', "images/" + data.touteavimgt);
            $('#agregar-touteavimgt2-tincazo').attr('src', "images/" + data.touteavimgt2);
            $('#agregar-toufixsscr1-tincazo').val(val1);
            $('#agregar-toufixsscr2-tincazo').val(val2);
        }
    });
    $('#modal-nuevo-agregar-tinzaso').modal('show');
}
window.getParameterByName = function(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.href);
    if (results == null) return "";
    else return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}
$(document).on('keydown', '[data-toggle=just_number]', function(e) {
    // Permitir: retroceso, eliminación, tabulación, escape, entrada y punto (.)
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Permitir: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Permitir: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
        // Permitir: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
        // Permitir: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // deja que ocurra, no hagas nada
        return;
    }
    //  que sea un número y detenga la pulsación de tecla
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
$(document).on('keyup', '[data-min_max]', function(e) {
    var min = parseInt($(this).data('min'));
    var max = parseInt($(this).data('max'));
    var val = parseInt($(this).val());
    if (val > max) {
        $(this).val(max);
        return false;
    } else if (val < min) {
        $(this).val(min);
        return false;
    }
});

function invitar(plainficode) {
    var tougrpicode = $('#session-select-tougrpicode').val();
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/invitarJugador',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            tougrpicode: tougrpicode,
            plainficode: plainficode
        },
        success: function(data) {
            $('#tableinvitaciones').DataTable().ajax.reload();
        }
    });
}

function aceptarInvitacion(value, tougrpicode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/aceptarInvitacion',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            tougrpicode: tougrpicode,
            constascode: value
        },
        success: function(data) {
            window.location.href = "/";
        }
    });
}


$('#selectTorneosEquipos').on('select2:selecting', function(e) {
    var touinfscode = e.params.args.data.id;
    var touinftname = e.params.args.data.text;
    $('#touinftname-select').val(touinftname.trim());
    $('#touinfscode-select').val(touinfscode);
    $('#filtre-touinfscode').val(touinfscode);
    $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#selectTorneosEquipos').on('select2:unselecting', function(e) {
    $('#touinftname-select').val(null);
    $('#touinfscode-select').val(null);
    $('#filtre-touinfscode').val(null);
    $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#select-torneo-admin-torneos').on('select2:selecting', function(e) {
    var touinfscode = e.params.args.data.id;
    var touinftname = e.params.args.data.text;
    $('#admin-gestionar-grupo-touinftname').val(touinftname.trim());
});
$('#select-torneo-admin-torneos').on('select2:unselecting', function(e) {
  $('#admin-gestionar-grupo-touinftname').val(null);
});



function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "images/" + state.image;
    var $state = $('<span><img style="height:30px; width:30px; border-radius: 50%; margin-right:5px" src="' + baseUrl + '" class="img-flag" /> ' + state.text + '</span>');
    return $state;
}
function formatResponsable(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "images/" + state.image;
    var $state = $('<span><img style="height:30px; width:30px; border-radius: 50%; margin-right:5px" src="' + baseUrl + '" class="img-flag" /> ' + state.text + '</span>');
    return $state;
}
function formatState1(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "images/" + state.image;
    var $state = $('<span><img style="height:50px; width:50px; border-radius: 50%; margin-right:5px" src="' + baseUrl + '" class="img-flag" /> ' + state.text + '</span>');
    return $state;
}






