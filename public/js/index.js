
// setTimeout(function () {
//     window.location.reload();
// }, 600000);

function removemenu() {
    $('.site-wrapper.clearfix').removeClass('site-wrapper--has-overlay');
}
$(document).ready(function () {

    $("#secusrtmail").change(debounce(function () {
        var $this = $(this);

        document.getElementById('form-login-button-submit').disabled = 1;
        validateMailLogin($this.val());

    }, 500));
    $('#secusrtmail').keyup(debounce(function () {
        var $this = $(this);

        document.getElementById('form-login-button-submit').disabled = 1;
        validateMailLogin($this.val())

    }, 500));
    if (tougrp && touinf) {
        var element_group_selected = tougrp.tougrpicode;
        var element_tournament_selected = touinf.touinfscode;
        selected_tournament(null, touinf.secconnuuid);
        $('.posts__item__tournament').removeClass('tournament__select');

        $('.posts__item--category-tournament-' + element_tournament_selected).addClass('tournament__select');

    }
    $.fn.select2.defaults.set("theme", "bootstrap4");
    $.fn.dataTable.ext.classes.sLengthSelect = 'form-control form-control-sm';
    $('#row-container').hide();
    $('#form-edit-perfil').bootstrapValidator({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            // confirmPassword: {
            //     validators: {
            //         identical: {
            //             field: 'password',
            //             message: 'La contraseña y su confirmación no son lo mismo'
            //         }
            //     }
            // }
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'La contraseña y su confirmación no son lo mismo'
                    },
                    notEmpty: {
                        enabled: false // or false
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'La contraseña y su confirmación no son lo mismo'
                    },
                    notEmpty: {
                        enabled: false // or false
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
        // Get the form instance
        var $form = $(e.target);
        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');
        // Use Ajax to submit form data
        e.preventDefault();
        var formData = new FormData();
        var _token = $('input[name=_token]').val();
        var plainftname = $('#edit-perfil-plainftname').val();
        var plainftnick = $('#edit-perfil-plainftnick').val();
        var plainficode = $('#edit-perfil-plainficode').val();
        var secusrtmail = $('#edit-perfil-secusrtmail').val();
        var secusrtpass = $('#edit-perfil-secusrtpass2').val();
        var plainfddobp = $('#edit-perfil-plainfddobp').val();
        var plainftgder = $("input[name='edit-perfil-plainftgder']:checked").val();
        var plainfvimgp = $('input[name=edit-perfil-plainfvimgp]').prop('files')[0];
        formData.append("_token", _token);
        formData.append("plainftname", plainftname);
        formData.append("plainftnick", plainftnick);
        formData.append("plainficode", plainficode);
        formData.append("secusrtmail", secusrtmail);
        formData.append("password", secusrtpass);
        formData.append("plainfddobp", plainfddobp);
        formData.append("plainftgder", plainftgder);
        formData.append("plainfvimgp", plainfvimgp);
        formData.append("tipo", 1);
        $.ajax({
            url: '/secusr',
            type: 'post',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                // 
                // if(data.session_expired){
                //     swal({
                //         title: "Estimado Usuario",
                //         text: "Lo siento, Su session ha expirado.",
                //         timer: 3000,
                //         confirmButtonText: "Ok!",
                //     }, function() {
                //         window.location.href ='/';
                //     });
                //     setTimeout(function() {
                //         window.location.href ='/';
                //     }, 3000);
                // }
                window.location.href = "/";
            },
            error: function (xhr, status, error) {
                // swal({
                //     title: "info",
                //     text: "Su session ha expirado.",
                //     timer: 3000,
                //     confirmButtonText: "Ok!",
                // }, function() {
                //     window.location.href ='/';
                // });
                // setTimeout(function() {
                //     window.location.href ='/';
                // }, 3000);
            }
        });
    });

    selectResponsable();

    var filtre_torneo = window.getParameterByName('q');

    if (tougrp && touinf) {
        var torneo = tougrp.tougrptname;

        var touinfscode = tougrp.touinfscode;
        var tougrpicode = tougrp.tougrpicode;
        var plainficodeurl = tougrp.plainficode;
        var plainficodehidden = $('#plainficode-hidden').val();
        // var imagen = document.getElementById('image-torneo-' + tougrp.tougrpicode);

        var tougrpsmaxp = $('#tougrpsmaxp' + tougrpicode).val();
        var tougrpsmaxp = $('#tougrpsmaxp' + tougrpicode).val();
        var tougrpsmedp = $('#tougrpsmedp' + tougrpicode).val();
        var tougrpsminp = $('#tougrpsminp' + tougrpicode).val();
        var tougrpsxval = $('#tougrpsxval' + tougrpicode).val();
        var tougrpschpt = $('#tougrpschpt' + tougrpicode).val();
    }

    $('#tablepociciones_filter lable input').addClass('modify'); // <-- add this line
    // <-- add this line
    $("#edit-perfil-image-preview").css("background-image", "url('images/" + $('#edit-perfil-image-src').val() + "')");
    $("#edit-perfil-image-preview").css("background-size", "cover");
    $("#edit-perfil-image-preview").css("background-position", "center center");

    if (tougrp && touinf) {
        // $('#row-container').show();
        // $('#slider-index').hide();
        // $('#site-content-intrucciones').hide();
        var a = $('#selecttorneo-edit').find(':selected').data('image');
        var imgs = new Image();
        imgs.src = a;
        // if (plainficodehidden == plainficodeurl) {
        //     $('#grupo-li-admin-group').show();
        //     $('#grupo-li-player-group').hide();
        //     $('#torneo-select-admin').text(null);
        //     $('#torneo-select-admin').text(torneo);
        // } else {
        //     $('#grupo-li-admin-group').hide();
        //     $('#torneo-select-admin').text(null);
        //     $('#torneo-select-player').text(torneo);
        //     $('#grupo-li-player-group').show();
        // }
        $("#image-preview2").css("background-image", "url('images/" + tougrp.tougrpvimgg + "')");
        $("#image-preview2").css("background-size", "cover");
        $("#image-preview2").css("background-position", "center center");
        $("#image-preview3").css("background-image", "url('images/" + tougrp.tougrpvimgg + "')");
        $("#image-preview3").css("background-size", "cover");
        $("#image-preview3").css("background-position", "center center");
        $('#tougrpsmaxp-edit').val(tougrp.tougrpsmaxp);
        $('#tougrpsmedp-edit').val(tougrp.tougrpsmedp);
        $('#tougrpsminp-edit').val(tougrp.tougrpsminp);
        $('#tougrpsxval-edit').val(tougrp.tougrpsxval);
        $('#tougrpschpt-edit').val(tougrp.tougrpschpt);
        $('#tougrptname-edit').val(tougrp.tougrptname);
        $('#touinfscode-edit-hidden').val(tougrp.touinfscode);
        $('#tougrpicode-edit-hidden').val(tougrp.tougrpicode);

        $('#selecttorneo-edit').val(tougrp.touinfscode).trigger('change');
        $("#imagetorneo-edit").attr("src", imgs.src);
    } else {
        // $('#site-content-intrucciones').show();
        // $('#row-container').hide();
        $('.mitorneo_li').hide();
        // $('#grupo-li-player-group').hide();
    }
    $("#selecttorneo").select2({
        placeholder: "Elegir Torneo",
        allowClear: true,
    });
    $("#select-torneo-fixture").select2({
        placeholder: "Filtrar Torneo",
        allowClear: true,
        theme: 'bootstrap4'
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
    $("#select-modal-nuevo-equipo").select2({
        placeholder: "Filtrar Tipos",
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
    $('#select-modal-nuevo-equipo').val(0).trigger('change');
    $('#contypscode1').val(null).trigger('change');
    // $('#selectconmemscode').val(1).trigger('change');
    $('#select-torneo-fixture').val(null).trigger('change');

    $('#selecttorneo').val(null).trigger('change');
    $('#selecttorneo').change(function () {
        var a = $('#selecttorneo').find(':selected').data('image')
        $("#imagetorneo").attr("src", a);
    });
    $('#select-torneo-admin-torneos').change(function () {
        $('#table-admin-gestionar-grupos').DataTable().ajax.reload();
    });
    $('#select-modal-nuevo-equipo').change(function () {
        $('#table-admin-equipo').DataTable().ajax.reload();
    });
    $('#select-torneo-fixture').change(function () {
        $('#table-fixture').DataTable().ajax.reload();
    });
    $('#selecttorneo').on('select2:selecting', function (e) {
        var a = $('#selecttorneo').find(':selected').data('image')
    });
    $('#selecttorneo').on('select2:selecting', function (e) {
        var a = $('#selecttorneo').find(':selected').data('image')
    });
    $('#selecttorneo').on('select2:unselecting', function (e) {
        var a = $('#selecttorneo').find(':selected').data('image')
        $("#imagetorneo").attr("src", null);
    });
    $('#selecttorneo-edit').change(function () {
        var a = $('#selecttorneo-edit').find(':selected').data('image')
        $("#imagetorneo-edit").attr("src", a);
    });
    $('#selecttorneo-edit').on('select2:unselecting', function (e) {
        var a = $('#selecttorneo-edit').find(':selected').data('image')
        $("#imagetorneo-edit").attr("src", null);
    });
    $("#selectconmemscode").select2({
        placeholder: "Filtrar Membresia",
        theme: 'bootstrap4',
        templateResult: formatState1,
        ajax: {
            url: "/selectMenbresia",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
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
        input_field: ".image-upload", // Default: .image-upload
        preview_box: ".image-preview", // Default: .image-preview
        label_field: ".image-label", // Default: .image-label
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
}).on('dp.hide', function (e) {
    $('#table-fixture').DataTable().ajax.reload();
});
$('#selectTorneosEquipos').change(function (e) {
    // var contypscode = $('#contypscode1').val();
    // var touinfscode = $('#touinfscode-select').val();
    // comboEquipos(contypscode,touinfscode);
    // $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#contypscode1').change(function (e) {
    var contypscode = $('#contypscode1').val();
    var touinfscode = $('#touinfscode-select').val();
    comboEquipos(touinfscode, contypscode);
    // $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#select-touteascode1').change(function (e) {
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
}).on("dp.hide", function (e) {
    $('#table-pociciones-dia').DataTable().ajax.reload();
});
$('#datetimepicker3').datetimepicker({
    locale: 'es',
    format: 'DD-MM-YYYY'
});
$('#cancelar').click(function () {
    $('#modal-nuevo-torneo').modal('show');
    $('#modal-admin-add-torneo').modal('hide');
});
$('#cancelar-equipo').click(function () {
    $('#modal-nuevo-equipo').modal('show');
    $('#modal-admin-add-equipo').modal('hide');
});


// $("#form-edit-perfil").submit(function(e) {;
// });
$("#formgrupo").submit(function (e) {
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
        success: function (data) {

            if (data == false) {
                swal({
                    // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
                    title: "ADVERTENCIA",
                    text: "No puede crear mas grupos ya que llego al limite de su membresia. ",
                    type: "info",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                window.location.href = "/";
            }
            document.getElementById('crear-grupo-btn-subtmit').disabled = 0;
        },
    });
});
$("#form-admin-gestionar-grupo-add").submit(function (e) {
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
    var tougrpsxval = $('#admin-gestionar-grupo-tougrpsxval').val();
    var tipo = $('#admin-gestionar-grupo-tipo').val();
    formData.append("tougrptname", tougrptname);
    formData.append("tougrpicode", tougrpicode);
    formData.append("plainficode", plainficode);
    formData.append("touinfscode", touinfscode);
    formData.append("tougrpvimgg", tougrpvimgg);
    formData.append("tougrpsmaxp", tougrpsmaxp);
    formData.append("tougrpsmedp", tougrpsmedp);
    formData.append("tougrpsminp", tougrpsminp);
    formData.append("tougrpsxval", tougrpsxval);
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
        success: function (data) {
            $('#table-admin-gestionar-grupos').DataTable().ajax.reload();
            $('#modal-admin-gestionar-grupo').modal('show');
            $('#modal-admin-gestionar-grupo-add').modal('hide');
            // window.location.href = "/";
        },
    });
});
$("#form-admin-torneo").submit(function (e) {
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
        success: function (data) {
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
$("#form-admin-equipo").submit(function (e) {
    e.preventDefault();
    var _token = $('input[name=_token]').val();
    var formData = new FormData();
    var tipo = $('#tipo-equipo').val();
    var touteascode = $('#touteascode').val();
    var touteatname = $('#touteatname').val();
    var touteatabrv = $('#touteatabrv').val();
    var contypscode = $('#contypscode').val();
    var touteavimgt = $('input[name=touteavimgt]').prop('files')[0];
    formData.append("tipo", tipo);
    formData.append("touteascode", touteascode);
    formData.append("touteatname", touteatname);
    formData.append("touteatabrv", touteatabrv);
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
        success: function (data) {
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
$("#form-admin-torneo-equipo").submit(function (e) {
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
        success: function (data) {
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
        success: function (data) {
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
        url: '/toufixShow/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function (data) {

            $('#select-touteascode1').empty();
            $('#select-touteascode2').empty();
            combo1();
            combo2();
            $('#select-touteascode1').append('<option value="' + data.touttescode1 + '">' + data.touteatname + '</option>');
            $('#select-touteascode2').append('<option value="' + data.touttescode2 + '">' + data.touteatname2 + '</option>');
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
    $('#title-configurar-grupo').text('EDITAR GRUPO');
    $.ajax({
        url: '/tougrpShow/' + tougrpicode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
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
            $('#admin-gestionar-grupo-tougrpsxval').val(data.tougrpsxval);
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
        url: '/toufixShow/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function (data) {
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
    $.ajax({
        url: '/validarCampeonFechas',
        type: 'get',
        datatype: 'json',

        success: function (data) {
            if (data.fecha > 0) {
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
$("#form-edit-score").submit(function (e) {
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
        success: function (data) {
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
        success: function (data) {
            $('#table-fixture').DataTable().ajax.reload();
            // swal("ACTUALIZADO!", "Se ha cambiado el estado del partido!!", "success");
        }
    });
}

function procesarPartido(toufixicode) {
    swal({
        title: "DESEA PROCESAR EL PARTIDO? ",
        text: "¿Esta seguro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
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
                success: function (data) {
                    if (data.success == true && data.error == false) {
                        $('#table-fixture').DataTable().ajax.reload();
                        swal("FINALIZADO!", "Se ha finalizado el partido!!", "success");
                    } else {
                        $('#table-fixture').DataTable().ajax.reload();
                        swal("ERROR!", "Hubo un error en el proceso!!", "error");
                    }
                }
            });
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
        success: function (data) {
            $('#table-fixture').DataTable().ajax.reload();
        }
    });
}

function EditarEquipo(touteascode) {
    $('#modal-nuevo-equipo').modal('hide');
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
        success: function (data) {
            $('#touteascode').val(data.touteascode);
            $('#touteatname').val(data.touteatname);
            $('#touteatabrv').val(data.touteatabrv);
            $('#contypscode').val(data.contypscode).trigger('change');
            $("#image-preview-admin-equipo").css("background-image", "url('images/" + data.touteavimgt + "')");
            $("#image-preview-admin-equipo").css("background-size", "cover");
            $("#image-preview-admin-equipo").css("background-position", "center center");
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
        success: function (data) {
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
                }, function (isConfirm) {
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
                            success: function (data) {
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
        success: function (data) {
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
                }, function (isConfirm) {
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
                            success: function (data) {
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

function EstadoEquipoTorneo(touteascode, touinfscode, touttescode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/EstadoEquipoTorneo',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            touteascode: touteascode,
            touinfscode: touinfscode,
            touttescode: touttescode
        },
        success: function (data) {
            $('#table-admin-torneo-equipo').DataTable().ajax.reload();
            swal({
                title: "EQUIPO ELIMINADO COMPLETO",
                type: "success",
                showConfirmButton: false,
                closeOnConfirm: false,
                timer: 2000
            });
        }
    });
    // swal("Changed!", "Confirm button text was changed!!", "success");
}

function EquipoChampions(touteascode, touinfscode, touttescode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/EquipoChampionsValidate',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        data: {
            touteascode: touteascode,
            touinfscode: touinfscode,
            touttescode: touttescode
        },
        success: function (data) {

            if (data > 0) {
                swal({
                    title: "Faltan equipos por desclasificar? ",
                    text: "¿Desea hacerlo?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        var _token = $('input[name=_token]').val();
                        $.ajax({
                            url: '/EquipoChampions',
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            datatype: 'json',
                            data: {
                                touteascode: touteascode,
                                touinfscode: touinfscode,
                                touttescode: touttescode
                            },
                            success: function (data) {
                                $('#table-admin-torneo-equipo').DataTable().ajax.reload();
                            }
                        });
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
            } else {
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: '/EquipoChampions',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    datatype: 'json',
                    data: {
                        touteascode: touteascode,
                        touinfscode: touinfscode,
                        touttescode: touttescode
                    },
                    success: function (data) {
                        $('#table-admin-torneo-equipo').DataTable().ajax.reload();
                    }
                });
            }
        }
    });
    // swal("Changed!", "Confirm button text was changed!!", "success");
}
$("#formgrupoconfig").submit(function (e) {
    e.preventDefault();
    var torneo = window.getParameterByName("id");
    var formData = new FormData();
    var _token = $('input[name=_token]').val();
    var tougrptname = $('input[name=tougrptname]').val();
    var tougrpicode = $('#tougrpicode-edit-hidden').val();
    var touinfscode = $('#touinfscode-edit-hidden').val();
    var tougrpsmaxp = $('input[name=tougrpsmaxp]').val();
    var tougrpsmedp = $('input[name=tougrpsmedp]').val();
    var tougrpsminp = $('input[name=tougrpsminp]').val();
    var tougrpsxval = $('input[name=tougrpsxval]').val();
    var tougrpschpt = $('input[name=tougrpschpt]').val();
    // var touinfscode = $('#selecttorneo-edit').val();
    var tougrpvimgg = $('input[name=tougrpvimgg2').prop('files')[0];
    formData.append("tougrptname", tougrptname);
    formData.append("touinfscode", touinfscode);
    formData.append("tougrpicode", tougrpicode);
    formData.append("tougrpvimgg", tougrpvimgg);
    formData.append("tougrpsmaxp", tougrpsmaxp);
    formData.append("tougrpsmedp", tougrpsmedp);
    formData.append("tougrpsminp", tougrpsminp);
    formData.append("tougrpsxval", tougrpsxval);
    formData.append("tougrpschpt", tougrpschpt);
    var actionurl = e.currentTarget.action;
    // 
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
        success: function (data) {

            window.location.reload();
        },
    });
});

$("#editform").submit(function (e) {
    ;
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
        success: function (data) {
            ;
            window.location.href = "/";
        }
    });
});
$("#form-agregar-tincazo").submit(function (e) {
    document.getElementById('form-agregar-tincazo-button').disabled = 1;
    var _token = $('input[name=_token]').val();
    e.preventDefault();
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
            toufixicode: toufixicode,
            toufixsscr1: toufixsscr1,
            toufixsscr2: toufixsscr2
        },
        success: function (data) {

            if (data.message == 1 && data.error == true && data.success == false && data.types == "constascode") {
                $('#modal-nuevo-agregar-tinzaso').modal('hide');
                swal({
                    title: "ESTE PARTIDO ESTA EN JUEGO O FINALIZADO",
                    html: true,
                    type: "error",
                    showCancelButton: false,
                    showConfirmButton: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        tusTincazosJuego("");
                        tusTincazosPendientes("");
                        tusTincazosFinalizados("");
                    }
                });
            } else if (data.message == 0 && data.error == false && data.success == true && (data.types == "insert" || data.types == "update")) {
                document.getElementById('form-agregar-tincazo-button').disabled = 0;
                $('#modal-nuevo-agregar-tinzaso').modal('hide');
                $('#agregar-toufixicode-hidden').val(null);
                $('#agregar-plapreicode-hidden').val(null);
                $('#agregar-touteatname1-tincazo').text(null);
                $('#agregar-touteatname2-tincazo').text(null);
                $('#agregar-toufixsscr1-tincazo').val(null);
                $('#agregar-toufixsscr2-tincazo').val(null);
                tusTincazosJuego("");
                tusTincazosFinalizados("");
                tusTincazosPendientes("");
            } else if (data.message == 0 && data.error == true && data.success == false && (data.types == "validate" || data.types == "update")) {
                document.getElementById('form-agregar-tincazo-button').disabled = 0;
                $('#agregar-toufixicode-hidden').val(null);
                $('#agregar-plapreicode-hidden').val(null);
                $('#agregar-touteatname1-tincazo').text(null);
                $('#agregar-touteatname2-tincazo').text(null);
                $('#agregar-toufixsscr1-tincazo').val(null);
                $('#agregar-toufixsscr2-tincazo').val(null);
                $('#modal-nuevo-agregar-tinzaso').modal('hide');
                swal({
                    // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
                    title: "ADVERTENCIA",
                    text: "Algo has hecho mal, revisa los campos!",
                    type: "info",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            }
        }
    });
});
$("#form-admin-toufix").submit(function (e) {
    e.preventDefault();
    var _token = $('input[name=_token]').val();
    touteascode1 = $('#select-touteascode1').val();
    touteascode2 = $('#select-touteascode2').val();
    toufixicode = $('#toufixicode-hidden').val();
    toufixdplay = $('#dates-toufixdplay').val();
    toufixthour = $('#dates-toufixthour').val();
    toufixyxval = $('#toufix-toufixyxval').val();;
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
        success: function (data) {
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
    $.ajax({
        url: '/toufixShow/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function (data) {
            $('#match-preview__team-name-1').text(data.touteatname);
            $('#match-preview__team-name-2').text(data.touteatname2);
            $('#match-preview__team-img-1').attr('src', "images/" + data.touteavimgt);
            $('#match-preview__team-img-2').attr('src', "images/" + data.touteavimgt2);
            $('#mostrar-toufixicode-hidden').val(toufixicode);
            $('#table-tincazos-grupo').DataTable().ajax.reload();
            $('#modal-nuevo-mostrar-tinzaso').modal('show');
        }
    });
}

function mi_tincazo(toufixicode, plapreicode, val1, val2) {

    document.getElementById('form-agregar-tincazo-button').disabled = 0;
    $('#agregar-toufixicode-hidden').val(toufixicode);
    $('#agregar-plapreicode-hidden').val(plapreicode);
    $.ajax({
        url: '/toufix/' + toufixicode,
        type: 'get',
        datatype: 'json',
        data: {
            toufixicode: toufixicode
        },
        success: function (data) {
            if (data.mensaje == 1) {
                // $('#modal-nuevo-agregar-tinzaso').modal('hide');
                swal({
                    title: "ESTE PARTIDO ESTA EN JUEGO O FINALIZADO",
                    html: true,
                    type: "error",
                    showCancelButton: false,
                    showConfirmButton: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        tusTincazosJuego("");
                        tusTincazosPendientes("");
                        tusTincazosFinalizados("");
                        // swal("Changed!", "Confirm button text was changed!!", "success");
                    }
                });
            } else {
                $('#modal-nuevo-agregar-tinzaso').modal('show');
                $('#agregar-toufixicode-hidden').val(data.toufix.toufixicode);
                $('#agregar-touteatname1-tincazo').text(data.toufix.touteatname);
                $('#agregar-touteatname2-tincazo').text(data.toufix.touteatname2);
                $('#agregar-touteavimgt1-tincazo').attr('src', "images/" + data.toufix.touteavimgt);
                $('#agregar-touteavimgt2-tincazo').attr('src', "images/" + data.toufix.touteavimgt2);
                $('#agregar-toufixsscr1-tincazo').val(val1);
                $('#agregar-toufixsscr2-tincazo').val(val2);
            }
        }
    });
}
window.getParameterByName = function (name) {
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
$(document).on('keydown', '[data-toggle=just_number]', function (e) {
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
$(document).on('keyup', '[data-min_max]', function (e) {
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

function invitar(secusrtmail, existUser = false) {
    debugger
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/invitarJugador',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            secusrtmail: secusrtmail,
            existUser: existUser
        },
        success: function (data) {
            if (data == false) {
                $('#tableinvitaciones').DataTable().ajax.reload();
                swal({
                    // title: "EL CORREO > " + secusrtmail + " YA EXISTE",
                    title: "ADVERTENCIA",
                    text: "No puede invitar mas jugadores ya que llego al limite de su membresia. ",
                    type: "info",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                $('#tableinvitaciones').DataTable().ajax.reload();
            }
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
        success: function (data) {
            window.location.href = "/";
        }
    });
}

function validate() { }
// $('#image-upload').on('change', function() {
//     var file_size = $('#image-upload')[0].files[0].size;
//     if (file_size > 1024) {
//         $("#file_error").html("El tamaño del archivo es mayor que 1 MB");
//         return false;
//     }
//     return true;
// });
$('#selectTorneosEquipos').on('select2:selecting', function (e) {
    var touinfscode = e.params.args.data.id;
    var touinftname = e.params.args.data.text;
    $('#touinftname-select').val(touinftname.trim());
    $('#touinfscode-select').val(touinfscode);
    $('#filtre-touinfscode').val(touinfscode);
    $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#selectTorneosEquipos').on('select2:unselecting', function (e) {
    $('#touinftname-select').val(null);
    $('#touinfscode-select').val(null);
    $('#filtre-touinfscode').val(null);
    $('#table-admin-torneo-equipo').DataTable().ajax.reload();
});
$('#select-torneo-admin-torneos').on('select2:selecting', function (e) {
    var touinfscode = e.params.args.data.id;
    var touinftname = e.params.args.data.text;
    $('#admin-gestionar-grupo-touinftname').val(touinftname.trim());
});
$('#select-torneo-admin-torneos').on('select2:unselecting', function (e) {
    $('#admin-gestionar-grupo-touinftname').val(null);
});

function comboEquipos(touinfscode, contypscode) {
    $("#select-torneo-equipo").select2({
        placeholder: "Filtrar equipo",
        ajax: {
            url: "/comboEquipos/" + touinfscode + "/" + contypscode,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.touteatname,
                            id: item.touteascode
                        }
                    })
                };
            },
            cache: true
        }
    });
}

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

function miCampeon(touttescode) {
    var _token = $('input[name=_token]').val();
    var tougrpicode = tougrp.tougrpicode;
    var tougplicode = tougrp.tougplicode;
    var touinfscode = touinf.touinfscode;
    $.ajax({
        url: '/insertarCampeon',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            tougrpicode: tougrpicode,
            tougplicode: tougplicode,
            touttescode: touttescode,
            touinfscode: touinfscode
        },
        success: function (data) {
            if (data.fecha > 0) {
                $('#modal-elegir-campeon').modal('hide');
                swal({
                    title: "No se puede elegir el campeon por que el torneo ya ha comenzado",
                    type: "error",
                    html: true,
                    showConfirmButton: true,
                    closeOnConfirm: true
                });
            } else {
                $('#other_champions').empty();
                $('#modal-elegir-campeon').modal('hide');
                $('li[id*="li-equipo-selected"]').removeClass('select-gb');
                $('li[id*="li-equipo-unselected"]').removeClass('select-gb');
                $('div[id*="div-circle-unselected"]').removeClass('team-stats__icon team-stats__icon--circle-select');
                $('div[id*="div-circle-selected"]').removeClass('team-stats__icon team-stats__icon--circle-select');
                $('div[id*="div-circle-selected"]').addClass('team-stats__icon team-stats__icon--circle');
                var src = $('#img-elegir-equipo-' + touttescode).attr('src');
                $('#image-mi-campeon').attr('src', null);
                $('#image-mi-campeon').attr('src', src);
                var name = $('#equipo-elegir-name-' + touttescode).text();
                $('#mi-campeon-name').text(name);
                // $('#li-equipo-unselected-'+touttescode).removeClass('team-stats__item team-stats__item--clean');
                // $('li[id*="li-equipo-selected"]').addClass('team-stats__item team-stats__item--clean');
                $('#li-equipo-unselected-' + touttescode).addClass('select-gb');
                $('#li-equipo-selected-' + touttescode).addClass('select-gb');
                $('#div-circle-selected-' + touttescode).addClass('team-stats__icon team-stats__icon--circle-select');
                $('#div-circle-unselected-' + touttescode).addClass('team-stats__icon team-stats__icon--circle-select');
            }
            other_champions();

        }

    });
}

function estadisticas() {
    // $('#other_champions').empty();
    // $('#jugadores').empty();
    // var tougrpicode = tougrp.tougrpicode;
    // $.ajax({
    //     url: '/estadisticas',
    //     type: 'get',
    //     dataType: 'json',
    //     data: {
    //         tougrpicode: tougrpicode,
    //     },
    //     success: function (data) {

    //         $('#jugadores').empty();
    //         var text = "";
    //         for (var i = 0; i < data.length; i++) {
    //             var value = data[i].cantidad
    //             if (data[i].touttebenbl == 0 && data[i].touttebisch == 0) {
    //                 var style = "style='cursor: pointer; background-color: rgba(0, 0, 0, 0.1803921568627451); text-decoration:line-through;font-weight:bold; color:black;'";
    //             } else if (data[i].touttebenbl == 0 && data[i].touttebisch == 1) {
    //                 var style = "style='cursor: pointer; background-image: url(/images/champions.png);background-repeat: no-repeat;background-size: cover;'";
    //             } else if (data[i].touttebenbl == 1 && data[i].touttebisch == 0) {
    //                 var style = "style='cursor: pointer'";

    //             }
    //             if (value > 1) {
    //                 text = "JUGAD0RES";
    //             } else {
    //                 text = "JUGADOR";
    //             }
    //             html = "<li " + style + " id='touttescode-" + data[i].touttescode + "'  class='team-stats__item team-stats__item--clean'  data-touttebenbl='" + data[i].touttebenbl + "' data-touteavimgt='" + data[i].touteavimgt + "' data-toutetname='" + data[i].touteatname + "' onclick='listaJugadoresCampeon(" + data[i].touttescode + ")' ><div class='team-stats__icon team-stats__icon--circle'><img style='height: 50px' src='images/" + data[i].touteavimgt + "'  alt=' class='team-stats__icon-primary'></div><div class='team-stats__label' style='color: black;font-size: 14px;font-weight: 600;'> " + data[i].touteatname + "</div><div class='team-stats__value' style='font-size: 12px; color: red'>" + data[i].cantidad + " " + text + "</div></li>";
    //             $('#other_champions').append(html)
    //         }
    //     }
    // });
}

function listaJugadoresCampeon(touttescode) {
    $('#jugadores').empty();
    var touteavimgt = $("#touttescode-" + touttescode).data('touteavimgt');
    var touttebenbl = $("#touttescode-" + touttescode).data('touttebenbl');
    var touteatname = $("#touttescode-" + touttescode).data('toutetname');
    if (touttebenbl <= 0) {
        $('#title-equipo-campon').text(touteatname + " (ELIMINADO) ");
        $('#title-equipo-campon').css({
            'text-decoration': 'line-through',
            'font-weight': 'bold',
            'color': 'black'
        });
    } else {
        $('#title-equipo-campon').text(touteatname);
    }
    $('#title-image-campeon').attr('src', 'images/' + touteavimgt);
    $.ajax({
        url: '/listaJugadoresCampeon',
        type: 'get',
        dataType: 'json',
        data: {
            touttescode: touttescode
        },
        success: function (data) {
            $('#modal-jugadores-campeon').modal('show');
            $('#jugadores').empty();
            var text = "";
            for (var i = 0; i < data.length; i++) {
                html = "<li class='team-stats__item team-stats__item--clean' ><div class='team-stats__icon team-stats__icon--circle'><img style='height:90px' src='images/" + data[i].plainfvimgp + "'  alt='' class='team-stats__icon-primary'></div><div class='team-stats__label' style='color: black;font-size: 10px;    margin: 1px;font-weight: 600;'> " + data[i].plainftnick + "</div></li>";
                $('#jugadores').append(html)
            }
        }
    });
}

function isEmpty(value) {
    return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
}

$(".reveal").on('click', function () {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});

function combo1(argument) {
    var a = $('#select-torneo-fixture').val();
    $("#select-touteascode1").select2({
        placeholder: "Filtrar equipo",
        templateResult: formatState,
        ajax: {
            url: "/select2combos/" + a,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            image: item.touteavimgt,
                            text: item.touteatname,
                            id: item.touttescode
                        }
                    })
                };
            },
            cache: true
        }
    });
}

function combo2(argument) {
    var a = $('#select-torneo-fixture').val();
    $("#select-touteascode2").select2({
        placeholder: "Filtrar equipo",
        templateResult: formatState,
        ajax: {
            url: "/select2combos/" + a,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            image: item.touteavimgt,
                            text: item.touteatname,
                            id: item.touttescode
                        }
                    })
                };
            },
            cache: true
        }
    });
}

function selectResponsable() {
    $("#select-admin-gestionar-grupo-securs").select2({
        placeholder: "Filtrar Responsable",
        templateResult: formatResponsable,
        ajax: {
            url: "/selectResponsable",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            image: item.plainfvimgp,
                            text: item.plainftname,
                            id: item.plainficode
                        }
                    })
                };
            },
            cache: true
        }
    });
}

function tougrptname_name_link(tougrptname, tougrpicode, touinfscode, tougplicode, plainficode, tougrpsxval, tougrpschpt) {

    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/sessionLink',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            tougrptname: tougrptname,
            tougrpicode: tougrpicode,
            touinfscode: touinfscode,
            tougplicode: tougplicode,
            plainficode: plainficode,
            tougrpsxval: tougrpsxval,
            tougrpschpt: tougrpschpt,
        },
        success: function (data) {
            window.location.href = '/';
        }
    });
}

function selected_tournament(element, secconnuuid) {
    if (element) {
        $('.posts__item__tournament').removeClass("tournament__select");
        $(element).addClass("tournament__select");
        $('#list_groups').empty();
        $('.lds-spinner').removeClass('d-none').show();
    }

    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/selected_tournament',
        type: 'get',
        dataType: 'json',
        data: {
            secconnuuid: secconnuuid,
        },
        success: function (data) {
            desing_menu_groups(data);
        }
    });
}
function selected_tournament_group(element, secconnuuid, tougplicode) {


    $('.posts__item__groups').removeClass("group__select");
    $(element).addClass("group__select");
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/selected_group',
        type: 'get',
        dataType: 'json',
        data: {
            secconnuuid: secconnuuid,
            tougplicode: tougplicode
        },
        success: function (data) {
            debugger
            window.location.href = '/';
        }
    });
}
function desing_menu_groups(data) {
    setTimeout(function () {
        var desing_menu_groups = '';
        $.each(data, function (i, item) {
            title = " Participante";
            if (item.total <= 1) {
                title = " Participante";

            } else {
                title = " Participantes";

            }
            desing_menu_groups += '<li class="posts__item posts__item--category-group posts__item--category-group-' + item.tougrpicode + ' posts__item__groups" style="cursor: pointer;" onclick=selected_tournament_group(this,"' + item.secconnuuid1 + '",' + item.tougplicode + ')>';
            desing_menu_groups += ' <figure class="posts__thumb">';
            desing_menu_groups += '<a>';
            desing_menu_groups += '<img src="/images/' + item.tougrpvimgg + '" class="img-thumbnail img-thumbnail-primary" style="width: 50px ; height: auto;border-top-right-radius: 50%;border-bottom-right-radius: 50%;"/>';
            desing_menu_groups += '</a>';
            desing_menu_groups += '</figure>';
            desing_menu_groups += '<div class="posts__inner">';
            desing_menu_groups += '<h6 class="posts__title pt-2"><a >' + item.tougrptname + '</a></h6>';
            desing_menu_groups += '<div class="posts__cat">';
            desing_menu_groups += '<span class="label posts__cat-label badge-primary" style="font-size: 9px"> ' + item.total + ' ' + title + '</span>';
            desing_menu_groups += '</div>';
            desing_menu_groups += '</div>';
            desing_menu_groups += '</li>';
            $('.lds-spinner').addClass('d-none').hide();

        });
        $('#list_groups').append(desing_menu_groups);
        $('.posts__item--category-group-' + tougrp.tougrpicode).addClass('group__select');
    }, 1000);

}
// $(".buscar").keyup(function (e) {
//     // $(".buscar").css("background-color", "pink");
//     var search = $(".buscar").val();
//     if ($.inArray(e.keyCode, [13]) !== -1 ||
//         // Permitir: Ctrl+A
//         (e.keyCode == 65 && e.ctrlKey === true) ||
//         // Permitir: Ctrl+C
//         (e.keyCode == 67 && e.ctrlKey === true) ||
//         // Permitir: Ctrl+X
//         (e.keyCode == 88 && e.ctrlKey === true) ||
//         // Permitir: home, end, left, right
//         (e.keyCode >= 35 && e.keyCode <= 39)) {
//         // deja que ocurra, no hagas nada
//         tusTincazosFinalizados(search);
//         tusTincazosJuego(search);
//         tusTincazosPendientes(search);
//     }
//     if (search == "") {
//         tusTincazosFinalizados(search);
//         tusTincazosJuego(search);
//         tusTincazosPendientes(search);
//     }
// });
$("#shearh-tincazos").on('click', function () {
    var search = $("ul.info-block--header > div > div > #input-buscar").val();
    var elmnt = document.getElementById("tustincazos-div");
    elmnt.scrollIntoView();

    tusTincazosFinalizados(search);
    tusTincazosJuego(search);
    tusTincazosPendientes(search);
});
$(".refresh-button").on('click', function () {
    tusTincazosFinalizados("");
    tusTincazosJuego("");
    tusTincazosPendientes("");
});

function info_player(plainficode, name) {

    $('#modal-info-player-tinzaso-plainficode').val(plainficode);
    $('#modal-info-player-tinzaso-player-name').text(name);
    $('#table-info-player-grupo').DataTable().ajax.reload();
    $('#modal-info-player-tinzaso').modal('show');
}

function info_player_dia(plainficode, name) {
    $('#modal-info-player-tinzaso-dia-name').text(name);
    $('#modal-info-player-tinzaso-plainficode-dia').val(plainficode);
    $('#table-info-player-grupo-dia').DataTable().ajax.reload();
    $('#modal-info-player-tinzaso-dia').modal('show');
}

function winner_loser_team1(item) {

    if (item.constascode == 1) {

        var toufixsscr1 = '';
        if (!isEmpty(item.plapreicode)) {
            if (!isEmpty(item.toufixsscr1)) {
                toufixsscr1 = item.toufixsscr1;
            } else {
                toufixsscr1 = '';
            }

        } else {
            toufixsscr1 = '';
        }
        if (item.toufixsscr1 > item.toufixsscr2) {
            return '<span class="game-result__score-result game-result__score-result--winner">' + toufixsscr1 + '</span>';
        } else if (item.toufixsscr1 < item.toufixsscr2) {
            return '<span class="game-result__score-result game-result__score-result--loser">' + toufixsscr1 + '</span>';
        } else {
            return '<span class="game-result__score-result game-result__score-result--draw1">' + toufixsscr1 + '</span>';
        }
    } else {
        if (item.toufixsscr1 > item.toufixsscr2) {
            return '<span class="game-result__score-result game-result__score-result--winner">' + item.toufixsscr1 + '</span>';
        } else if (item.toufixsscr1 < item.toufixsscr2) {
            return '<span class="game-result__score-result game-result__score-result--loser">' + item.toufixsscr1 + '</span>';
        } else {
            return '<span class="game-result__score-result game-result__score-result--draw1">' + item.toufixsscr1 + '</span>';
        }
    }
}
function winner_loser_team2(item) {
    if (item.constascode == 1) {
        var toufixsscr2 = '';
        if (!isEmpty(item.plapreicode)) {
            if (!isEmpty(item.toufixsscr1)) {
                toufixsscr2 = item.toufixsscr2;
            } else {
                toufixsscr2 = '';
            }
        } else {
            toufixsscr2 = '';
        }
        if (item.toufixsscr2 > item.toufixsscr1) {
            return '<span class="game-result__score-result game-result__score-result--winner">' + toufixsscr2 + '</span>';
        } else if (item.toufixsscr2 < item.toufixsscr1) {
            return '<span class="game-result__score-result game-result__score-result--loser">' + toufixsscr2 + '</span>';
        } else {
            return '<span class="game-result__score-result game-result__score-result--draw2">' + toufixsscr2 + '</span>';
        }
    } else {
        if (item.toufixsscr2 > item.toufixsscr1) {
            return '<span class="game-result__score-result game-result__score-result--winner">' + item.toufixsscr2 + '</span>';
        } else if (item.toufixsscr2 < item.toufixsscr1) {
            return '<span class="game-result__score-result game-result__score-result--loser">' + item.toufixsscr2 + '</span>';
        } else {
            return '<span class="game-result__score-result game-result__score-result--draw2">' + item.toufixsscr2 + '</span>';
        }
    }

}

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

function validateMailLogin(secusrtmail) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/validateMailLogin',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            secusrtmail: secusrtmail
        },
        success: function (data) {

            if (data.isTermsConditions == true && data.isValidMail == true) {
                $("#secusrtmail").removeClass('form-control-danger');
                $("#secusrtmail").addClass('form-control-success');
                $("#termsConditions").show();


            } else if (data.isTermsConditions == false && data.isValidMail == true) {
                $("#secusrtmail").removeClass('form-control-danger');
                $("#secusrtmail").addClass('form-control-success');
                $("#termsConditions").hide();
            }
            else if (data.isTermsConditions == true && data.isValidMail == false) {
                $("#secusrtmail").removeClass('form-control-success');
                $("#secusrtmail").addClass('form-control-danger');
                $("#termsConditions").show();
            }

            else if (data.isTermsConditions == false && data.isValidMail == false) {
                $("#secusrtmail").removeClass('form-control-success');
                $("#secusrtmail").addClass('form-control-danger');
                $("#termsConditions").hide();
            }
            document.getElementById('form-login-button-submit').disabled = 0;

            // if (data.mail == false) {
            //     $("#secusrtmail").focus();
            //     swal({
            //         title: "CORREO INCORRECTO",
            //         text: "El correo: " + " <strong> " + secusrtmail + "</strong>" + " introduccida no existe",
            //         type: "error",
            //         html: true,
            //         showConfirmButton: true,
            //         closeOnConfirm: true
            //     });
            //     $("#secusrtmail").focus();
            // } else if (data.mail == null) {
            //     $("#secusrtmail").focus();
            //     swal({
            //         title: "CORREO INCORRECTO",
            //         text: "El correo: " + " <strong> " + secusrtmail + "</strong>" + " introduccida no existe",
            //         type: "error",
            //         html: true,
            //         showConfirmButton: true,
            //         closeOnConfirm: true
            //     });
            // } else {
            //     $.ajax({
            //         url: '/sendValidateMail',
            //         type: 'post',
            //         dataType: 'json',
            //         headers: {
            //             'X-CSRF-TOKEN': _token
            //         },
            //         data: {
            //             secusricode: data.secusr.secusricode,
            //             secusrtmail: data.secusr.secusrtmail
            //         },
            //         success: function (data2) {
            //             swal({
            //                 title: "CORREO CORRECTO",
            //                 text: "Se ha enviado un enalce al correo: " + " <strong> " + secusrtmail + "</strong> <br>" + " para reestablecer su contraseña",
            //                 type: "success",
            //                 html: true,
            //                 showConfirmButton: true,
            //                 closeOnConfirm: true
            //             });
            //         }
            //     });
            // }
        }
    });
}
function validateMailInvite(secusrtmail) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/validateMailInvite',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            secusrtmail: secusrtmail
        },
        success: function (data) {
            debugger
            if (data.isValidMail === true) {
               
                swal({
                    title: "ADVERTENCIA",
                    text: "El usuario ya se encuentra registrado.",
                    type: "info",
                    showCancelButton: false,
                    showConfirmButton: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        tableinvitaciones.search(secusrtmail).draw();
                    }
                });
            } else {
                    invitar(secusrtmail);
            }

        }
    });
}

$('#btn-invite-email').click(function () {
    var email = $('#secusrtmail-invite').val();
    validateMailInvite(email);
});