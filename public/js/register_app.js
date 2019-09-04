$(document).ready(function () {

    
})
$.uploadPreview({
    input_field: ".image-upload", // Default: .image-upload
    preview_box: ".image-preview", // Default: .image-preview
    label_field: ".image-label", // Default: .image-label
    label_default: "Choose File", // Default: Choose File
    label_selected: "Cambiar Foto", // Default: Cambiar Foto
    no_label: false // Default: false
});

$("#register-invite").submit(function (e) {
    e.preventDefault();
    $('.lds-ring').show();
    var checked = $('#termsConditionsCheck1').is(':checked')
    // if ($('#termsConditionsCheck1').is(':visible')) {
    //     if (checked == false) {
    //         $('#false').text('Debe aceptar los Terminos & condiciones para poder ingresar');
    //         $('.lds-ring').hide();
    //         $('#false').show();
    //         setTimeout(function () {
    //             $('#false').hide();
    //             document.getElementById('form-login-button-submit').disabled = 0;
    //         }, 2500);
    //         return;
    //     }
    // }

    document.getElementById('form-button-register').disabled = 1;
    var formData = new FormData();
    var _token = $('meta[name="_token"]').attr('content');
    var plainftname = $('input[name=plainftname]').val();
    var group = $('input[name=group]').val();
    var secusrtmail = $('#register-secusrtmail').val();
    var secusrtpass = $('#register-secusrtpass').val();
    //  var plainfddobp = $('input[name=plainfddobp]').val();
    //  var plainftgder = $("input[name='plainftgder']:checked").val();
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
        formData.append("secconnuuid", group);
        formData.append("password", secusrtpass);
        //  formData.append("plainfddobp", plainfddobp);
        //  formData.append("plainftgder", plainftgder);
        formData.append("plainfvimgp", plainfvimgp);
        formData.append("conmemscode", conmemscode);
        formData.append("tipo", 2);
        debugger
        $.ajax({
            url: '/secusr',
            type: 'post',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                $('.lds-ring').hide();

                document.getElementById('form-button-register').disabled = 0;
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
                    // $('#modal-login-register').modal('hide');

                    window.location.href = "/";
                    // document.getElementById('form-button-register').disabled = 0;
                }
            },
            error: function (xhr, status, error) {

            }
        });
    }
});

function formatState1(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "images/" + state.image;
    var $state = $('<span><img style="height:50px; width:50px; border-radius: 50%; margin-right:5px" src="/' + baseUrl + '" class="img-flag" /> ' + state.text + '</span>');
    return $state;
}
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