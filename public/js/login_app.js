$("#iniciosession").submit(function (e) {
    e.preventDefault();

    $('.lds-ring').show();
    document.getElementById('form-login-button-submit').disabled = 1;

    var checked = $('#termsConditionsCheck').is(':checked')
    var ss = $("#myDiv").length
    var secusrtmail_success = $('#secusrtmail').hasClass('form-control-success');
    var secusrtmail_danger = $('#secusrtmail').hasClass('form-control-danger');
    debugger
    if ($('#termsConditionsCheck').is(':visible')) {
        if (checked == false) {
            $('#false').text('Debe aceptar los Terminos & condiciones para poder ingresar');
            $('.lds-ring').hide();
            $('#false').show();
            setTimeout(function () {
                $('#false').hide();
                document.getElementById('form-login-button-submit').disabled = 0;
            }, 2500);
            return;
        }
    }

    if (secusrtmail_danger == true) {
        $('#false').text('Estas credenciales no coinciden con nuestros registros');
        $('.lds-ring').hide();
        $('#false').show();
        setTimeout(function () {
            $('#false').hide();
            document.getElementById('form-login-button-submit').disabled = 0;
        }, 2500);
        return;
    }
    $.ajax({
        url: '/login',
        type: 'post',
        datatype: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'secusrtmail': $('#secusrtmail').val(),
            'password': $('#password').val()
        },
        success: function (data) {
            debugger
            if (data.success == 0) {
                setTimeout(function () {
                    $('#true').hide();
                    $('.lds-ring').hide();
                    $('#false').text(data.mensaje);
                    $('#false').show();

                    setTimeout(function () {
                        $('#false').hide();
                    }, 2500);
                    document.getElementById('form-login-button-submit').disabled = 0;
                }, 2500);
            } else {
                // $('#true').show();
                // $('#true').text(data.mensaje);
                setTimeout(function () {
                    $('.lds-ring').hide();
                    $('#false').hide();
                    $('#modal-login-register-tabs').modal('hide');

                    window.location.href = "/";
                    document.getElementById('form-login-button-submit').disabled = 0;
                }, 2500);
            }
        }
    });
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
        success: function (data) {
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
                    success: function (data2) {
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