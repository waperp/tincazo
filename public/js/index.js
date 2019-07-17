 setTimeout(function() {
     window.location.reload();
 }, 600000);

 function removemenu() {
     $('.site-wrapper.clearfix').removeClass('site-wrapper--has-overlay');
 }
 $(document).ready(function() {
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
     }).on('success.form.bv', function(e) {
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
             success: function(data) {
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
             error: function(xhr, status, error) {
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
     // $('#iniciosession').formValidation()
     //         .on('success.field.fv', function(e, data) {
     //             
     //             if (data.fv.getSubmitButton()) {
     //                 data.fv.disableSubmitButtons(false);
     //             }
     //         });
     // $('#modal-login-register').bootstrapValidator({
     //     icon: {
     //         valid: 'glyphicon glyphicon-ok',
     //         invalid: 'glyphicon glyphicon-remove',
     //         validating: 'glyphicon glyphicon-refresh'
     //     },
     //     fields: {
     //     plainfvimgp: {
     //             validators: {
     //                 file: {
     //                     extension: 'jpeg,png',
     //                     type: 'image/jpeg,image/png/image/jpg',
     //                     maxSize: 1024,
     //                     message: 'El archivo seleccionado no es válido'
     //                 }
     //             }
     //         }
     //     }
     // });
     estadisticas();
     tusTincazosPendientes("");

     selectResponsable();
     tusTincazosJuego("");
     tusTincazosFinalizados("");
     $('#modal-gestionar-fixture .modal-body').css({
         width: 'auto',
         height: 'auto',
         'max-height': '90%'
     });
     var torneo = $('#session-select-tougrptname').val();
     var filtre_torneo = window.getParameterByName('q');
     var touinfscode = $('#session-select-touinfscode').val();
     var tougrpicode = $('#session-select-tougrpicode').val();
     var plainficodeurl = $('#session-select-plainficode').val();
     var plainficodehidden = $('#plainficode-hidden').val();
     var imagen = document.getElementById('image-torneo-' + tougrpicode);
     var tougrpsmaxp = $('#tougrpsmaxp' + tougrpicode).val();
     var tougrpsmaxp = $('#tougrpsmaxp' + tougrpicode).val();
     var tougrpsmedp = $('#tougrpsmedp' + tougrpicode).val();
     var tougrpsminp = $('#tougrpsminp' + tougrpicode).val();
     var tougrpsxval = $('#tougrpsxval' + tougrpicode).val();
     var tougrpschpt = $('#tougrpschpt' + tougrpicode).val();
     $('#tablepociciones_filter lable input').addClass('modify'); // <-- add this line
     // <-- add this line
     $("#edit-perfil-image-preview").css("background-image", "url('images/" + $('#edit-perfil-image-src').val() + "')");
     $("#edit-perfil-image-preview").css("background-size", "cover");
     $("#edit-perfil-image-preview").css("background-position", "center center");
     if (filtre_torneo != "") {
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
         $("#image-preview2").css("background-image", "url('" + imagen.src + "')");
         $("#image-preview2").css("background-size", "cover");
         $("#image-preview2").css("background-position", "center center");
         $("#image-preview3").css("background-image", "url('" + imagen.src + "')");
         $("#image-preview3").css("background-size", "cover");
         $("#image-preview3").css("background-position", "center center");
         $('#tougrpsmaxp-edit').val(tougrpsmaxp);
         $('#tougrpsmedp-edit').val(tougrpsmedp);
         $('#tougrpsminp-edit').val(tougrpsminp);
         $('#tougrpsxval-edit').val(tougrpsxval);
         $('#tougrpschpt-edit').val(tougrpschpt);
         $('#tougrptname-edit').val(torneo);
         $('#touinfscode-edit-hidden').val(touinfscode);
         $('#tougrpicode-edit-hidden').val(tougrpicode);

         $('#selecttorneo-edit').val(touinfscode).trigger('change');
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
     $('#select-modal-nuevo-equipo').change(function() {
         $('#table-admin-equipo').DataTable().ajax.reload();
     });
     $('#select-torneo-fixture').change(function() {
         $('#table-fixture').DataTable().ajax.reload();
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
     var table = $("#tablepociciones").DataTable({
         colReorder: true,
         "ordering": false,
         "searching": false,
         "paging": true,
         "info": true,
         dom: 'Bfrtip',
         "pageLength": 25,
         "lengthMenu": [
             [5, 10, 25, 50, -1],
             [5, 10, 25, 50, "Todos"]
         ],
         initComplete: function() {
             var tougrpschpt = $('#session-select-tougrpschpt').val();

             if (tougrpschpt > 0) {
                 this.api().columns([2, 3, 4]).visible(false);
                 this.api().columns([5, 6]).visible(true);
                 $('#tincazos_champions').show();
                 $('#tincazos_champions_not').hide();
             } else {
                 this.api().columns([2, 3, 4]).visible(true);
                 this.api().columns([5, 6]).visible(false);
                 $('#tincazos_champions').hide();
                 $('#tincazos_champions_not').show();
             }

         },
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             // "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfo": "Total de _TOTAL_ jugadores",
             "sInfoEmpty": "Total de 0 jugadores",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Posiciones",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [{
             className: 'fa fa-refresh font-var btn-primary-inverse',
             titleAttr: 'Refrescar Datos',
             action: function(e, dt, node, config) {
                 dt.ajax.reload();
             }
         }, 'pageLength'],
         "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
             $(nRow).children().each(function(index, td) {
                 // 
                 // $('tr', nRow).attr('onClick','info_player('+aData.plainficode+')');
                 if (aData.PTOS > 0) {
                     if (aData.POS == 1) {
                         // $(nRow.cells[4]).css({'background-color': aData.constatclbg, 'color' : 'black', 'font-weight':'600'});
                         $(nRow.cells[0]).css({
                             'background-color': '#FFEB3B',
                             'color': 'black',
                             'font-weight': '600'
                         });
                     } else if (aData.POS == 2) {
                         $(nRow.cells[0]).css({
                             'background-color': '#BDBDBD',
                             'color': 'black',
                             'font-weight': '600'
                         });
                     } else if (aData.POS == 3) {
                         $(nRow.cells[0]).css({
                             'background-color': '#FFA000',
                             'color': 'black',
                             'font-weight': '600'
                         });
                     }
                 }
             });
         },
         "createdRow": function(row, data, dataIndex) {
             $(row).attr('onClick', 'info_player(' + data.plainficode + ',"' + data.JUGADOR + '")');
             $(row).css({
                 cursor: 'pointer',
             });
         },
         ajax: {
             url: '/tablaPosicionesGrupo',
             data: function(d) {
                 var tougrpicode = $('#session-select-tougrpicode').val();
                 if (tougrpicode > 0) {
                     d.tougrpicode = tougrpicode;
                 } else {
                     d.tougrpicode = 0;
                 }
             }
         },
         columns: [{
             className: 'padding-pos',
             width: 20,
             data: 'POS'
         }, {
             orderable: false,
             sortable: false,
             className: 'acciones',
             render: function(data, type, full, meta) {
                 // return '<img class=\"circle\"  src="/images/db/' + data + '" />';
                 return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.JUGADOR + '</h6></div></div>'
             }
         }, {
             data: 'TA',
             searchable: false,
             orderable: false,
             sortable: false
         }, {
             data: 'TM',
             searchable: false,
             orderable: false,
             sortable: false
         }, {
             data: 'TB',
             searchable: false,
             orderable: false,
             sortable: false
         }, {
             data: 'TINCAZOS',
             searchable: false,
             orderable: false,
             sortable: false
         }, {
             data: 'CAMPEON',
             searchable: false,
             orderable: false,
             sortable: false
         }, {
             data: 'PTOS',
             searchable: false,
             orderable: false,
             sortable: false
         }, ],
     });
     $("#table-pociciones-dia").DataTable({
         colReorder: true,
         "ordering": false,
         "searching": false,
         responsive: true,
         "paging": false,
         "info": true,
         dom: 'Bfrtip',
         "pageLength": 25,
         "lengthMenu": [
             [5, 10, 25, 50, -1],
             [5, 10, 25, 50, "Todos"]
         ],
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             // "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfo": "Total de _TOTAL_ jugadores",
             "sInfoEmpty": "Total 0 jugadores",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Posiciones",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [{
             className: 'fa fa-refresh font-var btn-primary-inverse',
             titleAttr: 'Refrescar Datos',
             action: function(e, dt, node, config) {
                 dt.ajax.reload();
             }
         }, 'pageLength'],
         "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
             // $(nRow).children().each(function(index, td) {
             //     if (aData.PTOS > 0) {
             //         if (aData.POS == 1) {
             //             // $(nRow.cells[4]).css({'background-color': aData.constatclbg, 'color' : 'black', 'font-weight':'600'});
             //             $(nRow.cells[0]).css({
             //                 'background-color': '#FFEB3B',
             //                 'color': 'black',
             //                 'font-weight': '600'
             //             });
             //         } else if (aData.POS == 2) {
             //             $(nRow.cells[0]).css({
             //                 'background-color': '#BDBDBD',
             //                 'color': 'black',
             //                 'font-weight': '600'
             //             });
             //         } else if (aData.POS == 3) {
             //             $(nRow.cells[0]).css({
             //                 'background-color': '#FFA000',
             //                 'color': 'black',
             //                 'font-weight': '600'
             //             });
             //         }
             //     }
             // });
         },
         "createdRow": function(row, data, dataIndex) {
             $(row).attr('onClick', 'info_player_dia(' + data.plainficode + ',"' + data.plainftnick + '")');
             $(row).css({
                 cursor: 'pointer',
             });
         },
         ajax: {
             url: '/tablaPosicionesPorDia',
             data: function(d) {
                 var fecha = $('#date-filtrer-posiciones').val();
                 var tougrpicode = $('#session-select-tougrpicode').val();
                 d.fecha = fecha;
                 d.tougrpicode = tougrpicode;
             }
         },
         columns: [
             // {
             //     className: 'padding-pos',
             //     width: 20,
             //     data: 'POS'
             // }, 
             {
                 className: 'widthtable',
                 orderable: false,
                 sortable: false,
                 render: function(data, type, full, meta) {
                     return '<figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure>'
                 }
             }, {
                 orderable: false,
                 sortable: true,
                 render: function(data, type, full, meta) {
                     return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.plainftnick + '</h6></div>'
                 }
             }, {
                 data: 'PTOS',
                 searchable: false,
                 orderable: false,
                 sortable: false
             },
         ],
     });
     var table = $("#tableinvitaciones").DataTable({

         "searching": true,
         "pageLength": 10,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/tablaInvitacionesGrupo',
             data: function(d) {
                 var tougrpicode = $('#session-select-tougrpicode').val();
                 if (tougrpicode > 0) {
                     d.tougrpicode = tougrpicode;
                 } else {
                     d.tougrpicode = 0;
                 }
             }
         },
         columns: [{
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             sortable: true,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.plainftname + '</h6></div>'
             }
         }, {
             orderable: true,
             sortable: true,
             render: function(data, type, full, meta) {
                 // return '<img class=\"circle\"  src="/images/db/' + data + '" />';
                 if (full.constascode == 1) {
                     return '<span class="label label-warning">PENDIENTE</span>';
                 } else if (full.constascode == 2) {
                     return '<span class="label label-success">ACEPTADA</span>';
                 } else if (full.constascode == null) {
                     return "<a id='invitar-" + full.plainficode + "' href='javascript:void(0)' OnClick='invitar(" + full.plainficode + ");' title='INVITAR'><span class='label label-info'>INVITAR</span></a>";
                 } else {
                     return '<span class="label label-danger">RECHAZADA</span>';
                 }
             }
         }, ],
     });
     var tablesss = $("#table-info-player-grupo").DataTable({
         // colReorder: true,
         ordering: false,
         searching: true,
         responsive: true,
         "searching": false,
         //  responsive: {
         //     details: {
         //         display: $.fn.dataTable.Responsive.display.modal( {
         //             header: function ( row ) {
         //                 var data = row.data();
         //                 return 'Details for '+data[0]+' '+data[1];
         //             }
         //         } ),
         //         renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
         //             tableClass: 'table'
         //         } )
         //     }
         // },
         pageLength: 10,
         paging: true,
         info: false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Un total de _TOTAL_ tincazos",
             "sInfoEmpty": "un total de 0 tincazos",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/tablaInfoPlayer',
             data: function(d) {
                 d.plainficode = $('#modal-info-player-tinzaso-plainficode').val();
             }
         },
         columns: [{
                 orderable: false,
                 sortable: false,
                 render: function(data, type, full, meta) {
                     // return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure>';
                     return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv1 + '</h6></div>'
                 }
             },
             // {
             //     orderable: false,
             //     sortable: false,
             //     render: function(data, type, full, meta) {
             //         return  full.touteatabrv1 ;
             //     }
             // },  
             // {
             //     orderable: false,
             //     sortable: false, className: 'text-center',
             //     width:20,
             //     render: function(data, type, full, meta) {
             //         return '<strong style="font-size: 10x; font-weight:700"> ' + full.toufixsscr1 + '</strong>';
             //     }
             // },
             {
                 width: 20,
                 orderable: false,
                 sortable: false,
                 className: 'text-center',
                 render: function(data, type, full, meta) {
                     return '<strong style="font-size: 10px;float:left"> ' + full.toufixsscr1 + '</strong>' + '<strong style="font-size: 10px; ;  color:#38a9ff"> ' + full.plapresscr1 + '</strong>' + " - " + '<strong style="font-size: 10px; ;color:#38a9ff"> ' + full.plapresscr2 + '</strong>' + '<strong style="font-size: 10px; float:right"> ' + full.toufixsscr2 + '</strong>';
                 }
             },
             //  {
             //     width:20,
             //     orderable: false,
             //     sortable: false, className: 'text-center',
             //     render: function(data, type, full, meta) {
             //         return '<strong style="font-size: 10px; font-weight:700"> ' + full.toufixsscr2 + '</strong>';
             //     }
             // },
             {
                 orderable: false,
                 sortable: false,
                 render: function(data, type, full, meta) {
                     // return  full.touteatabrv2 ;
                     return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt2 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv2 + '</h6></div>'
                 }
             },
             // {
             //     orderable: false,
             //     sortable: false,
             //    render: function (data, type, full, meta){
             //        return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure>';
             //    }
             // },
             {
                 orderable: false,
                 width: 20,
                 sortable: false,
                 className: 'text-center',
                 data: 'plapresptos'
             }
         ],
         "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
             if (aData.plapresptos > 0) {
                 $(nRow.cells[3]).css({
                     'color': '#3c763d',
                     'font-size': '15px',
                     'font-weight': '700'
                 });
             } else {
                 $(nRow.cells[3]).css({
                     'color': 'red',
                     'font-size': '15px',
                     'font-weight': '700'
                 });
             }
         }
     });
     var tablesss = $("#table-info-player-grupo-dia").DataTable({
         // colReorder: true,
         ordering: false,
         searching: true,
         responsive: true,
         "searching": false,
         pageLength: 10,
         paging: true,
         info: false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Un total de _TOTAL_ tincazos",
             "sInfoEmpty": "un total de 0 tincazos",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/tablaInfoPlayerDia',
             data: function(d) {
                 d.plainficode = $('#modal-info-player-tinzaso-plainficode-dia').val();
                 d.fecha = $('#date-filtrer-posiciones').val();
             }
         },
         columns: [{
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 // return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure>';
                 return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv1 + '</h6></div>'
             }
         }, {
             width: 20,
             orderable: false,
             sortable: false,
             className: 'text-center',
             render: function(data, type, full, meta) {
                 return '<strong style="font-size: 10px;float:left"> ' + full.toufixsscr1 + '</strong>' + '<strong style="font-size: 10px; ;  color:#38a9ff"> ' + full.plapresscr1 + '</strong>' + " - " + '<strong style="font-size: 10px; ;color:#38a9ff"> ' + full.plapresscr2 + '</strong>' + '<strong style="font-size: 10px; float:right"> ' + full.toufixsscr2 + '</strong>';
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 // return  full.touteatabrv2 ;
                 return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt2 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv2 + '</h6></div>'
             }
         }, {
             orderable: false,
             width: 20,
             sortable: false,
             className: 'text-center',
             data: 'plapresptos'
         }],
         "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
             if (aData.plapresptos > 0) {
                 $(nRow.cells[3]).css({
                     'color': '#3c763d',
                     'font-size': '10px',
                     'font-weight': '700'
                 });
             } else {
                 $(nRow.cells[3]).css({
                     'color': 'red',
                     'font-size': '10px',
                     'font-weight': '700'
                 });
             }
         }
     });
     var table = $("#table-admin-torneo").DataTable({
         colReorder: true,
         order: [
             [1, 'desc']
         ],
         "searching": true,
         "pageLength": 5,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: '/tablaAdminTorneos',
         columns: [{
             width: 35,
             className: 'widthtable',
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.touinfvlogt + '" alt=""></figure>'
             }
         }, {
             width: "5%",
             data: 'touinfscode'
         }, {
             orderable: false,
             width: 200,
             sortable: true,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touinftname + '</h6></div>'
             }
         }, {
             orderable: false,
             width: 105,
             data: 'touinfdstat'
         }, {
             orderable: false,
             width: 105,
             data: 'touinfdendt'
         }, {
             orderable: false,
             width: 50,
             data: 'touinfsnumt'
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return "<tr><a class='btn-edit' OnClick='EditarTorneo(" + full.touinfscode + ");' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
             }
         }, ],
         buttons: [{
             text: 'AGREGAR',
             className: 'btn btn-primary-inverse btn-sm',
             action: function(e, dt, node, config) {
                 $('#tipo').val(0);
                 $('#modal-nuevo-torneo').modal('hide');
                 $('#modal-admin-add-torneo').modal('show');
             },
             titleAttr: 'AGREGAR cotizacion'
         }]
     });
     var table = $("#table-admin-equipo").DataTable({
         colReorder: true,
         order: [
             [1, 'desc']
         ],
         "searching": true,
         "pageLength": 5,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/tablaAdminEquipos',
             data: function(d) {
                 var contypscode = $('#select-modal-nuevo-equipo').val();
                 d.contypscode = contypscode;
                 $('#contypscode').val(contypscode).trigger('change');
             }

         },
         columns: [{
             width: 35,
             className: 'widthtable',
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             width: 200,
             sortable: true,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div>'
             }
         }, {
             orderable: false,
             width: 200,
             sortable: true,
             data: 'touteatabrv'
         }, {
             data: 'contyptdesc'
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return "<tr><a class='btn-edit' OnClick='EditarEquipo(" + full.touteascode + ");' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
             }
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return "<tr><a class='btn-eliminar' OnClick='EliminarEquipo(" + full.touteascode + ");' title='ELIMINAR'><i class='fa fa-times-circle'></i></a></tr>";
             }
         }],
         buttons: [{
             text: 'AGREGAR',
             className: 'btn btn-primary-inverse btn-sm',
             action: function(e, dt, node, config) {
                 $('#tipo-equipo').val(0);
                 $('#modal-nuevo-equipo').modal('hide');
                 $('#modal-admin-add-equipo').modal('show');
             },
             titleAttr: 'AGREGAR EQUIPO'
         }]
     });
     var table = $("#table-admin-torneo-equipo").DataTable({
         colReorder: true,
         order: [
             [1, 'desc']
         ],
         "searching": true,
         "pageLength": 5,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/tablaAdminTorneosEquipos',
             data: function(d) {
                 var touinfscode = $('#filtre-touinfscode').val();
                 if (touinfscode > 0) {
                     d.touinfscode = touinfscode;
                 } else {
                     d.touinfscode = 0;
                 }
             }
         },
         columns: [{
             width: 35,
             className: 'widthtable',
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             width: 200,
             sortable: true,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div>'
             }
         }, {
             data: 'contyptdesc'
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return "<tr><a class='btn-eliminar' OnClick='EliminarEquipoTorneo(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='ELIMINAR'><i class='fa fa-times-circle'></i></a></tr>";
             }
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.touttebenbl == 1 && full.touttebisch == 0) {
                     return "<tr><a class='btn-estado' OnClick='EstadoEquipoTorneo(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='RETIRAR'><i class='fa fa-minus-circle'></i></a></tr>";
                 }
                 return '';
             }
         }, {
             width: 30,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.touttebenbl == 0 && full.touttebisch == 1) {
                     return "<tr><img src='http://hackathon.ccafs.cgiar.org/wp-content/uploads/2014/10/icon-award_04.png' width='25px'></tr>";

                 } else if (full.touttebenbl == 1 && full.touttebisch == 0) {
                     return "<tr><a style='color:orange !important' class='btn-estado' OnClick='EquipoChampions(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='CAMPEON'><i class='fa fa-star'></i></a></tr>";

                 }
                 return '';
             }
         }],
         buttons: [{
             text: 'AGREGAR',
             className: 'btn btn-primary-inverse btn-sm',
             action: function(e, dt, node, config) {
                 $('#modal-nuevo-torneo-equipo').modal('hide');
                 $('#modal-admin-add-torneo-equipo').modal('show');
                 $('#select-torneo-equipo').empty();
                 /*$("#selectMultiple").select2('destroy');*/


             },
             titleAttr: 'AGREGAR EQUIPO'
         }]
     });
     var tablesss = $("#table-tincazos-grupo").DataTable({
         // colReorder: true,
         ordering: false,
         searching: true,
         responsive: true,
         "searching": false,
         //  responsive: {
         //     details: {
         //         display: $.fn.dataTable.Responsive.display.modal( {
         //             header: function ( row ) {
         //                 var data = row.data();
         //                 return 'Details for '+data[0]+' '+data[1];
         //             }
         //         } ),
         //         renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
         //             tableClass: 'table'
         //         } )
         //     }
         // },
         pageLength: 10,
         paging: true,
         info: true,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Un total de _TOTAL_ tincazos",
             "sInfoEmpty": "un total de 0 tincazos",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [],
         ajax: {
             url: '/obtenerPredicciones',
             data: function(d) {
                 var tougrpicode = $('#session-select-tougrpicode').val();
                 var touinfscode = $('#session-select-touinfscode').val();
                 var toufixicode = $('#mostrar-toufixicode-hidden').val();
                 if (toufixicode > 0) {
                     d.touinfscode = touinfscode;
                     d.tougrpicode = tougrpicode;
                     d.toufixicode = toufixicode;
                 } else {
                     d.touinfscode = null;
                     d.tougrpicode = null;
                     d.toufixicode = null;
                 }
             }
         },
         columns: [{
             orderable: false,
             sortable: false,
             width: 100,
             render: function(data, type, full, meta) {
                 return full.plainftnick;
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<strong style="font-size: 15px; font-weight:700"> ' + full.plapresscr1 + '</strong> ' + " - " + '<strong  style="font-size: 15px; font-weight:700"> ' + full.plapresscr2 + '</strong> '
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return moment(full.plapredcrea).lang('es').format('DD-MM');
             }
         }, {
             orderable: false,
             sortable: false,
             // data: 'plaprethour',
             render: function(data, type, full, meta) {
                 // return moment(full.plapredcrea).lang('es').format('DD-MM');
                 return moment(full.plaprethour, "hh:mm:ss").format("HH:mm");
             }
         }],
     });
     $("#table-fixture").DataTable({
         colReorder: true,
         "ordering": false,
         "searching": true,
         responsive: true,
         "pageLength": 5,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [{
             text: 'AGREGAR',
             className: 'btn btn-primary  btn-sm',
             action: function(e, dt, node, config) {
                 var touinfscode = $('#select-torneo-fixture').val();
                 var toufixdplay = $('#date-toufixdplay').val();
                 if (touinfscode == null || toufixdplay == "") {
                     swal({
                         title: "Es obligatorio seleccionar un torneo y fecha",
                         type: "error",
                         html: true,
                         showConfirmButton: true,
                         closeOnConfirm: true
                     });
                 } else {
                     combo1();
                     combo2();
                     $('#select-touinfscode-hidden').val(touinfscode);
                     $('#dates-toufixdplay').val(toufixdplay);
                     $('#select-toufixdplay-hidden').val(touinfscode);
                     $('#toufixicode-tipo').val(0);
                     $('#modal-gestionar-fixture').modal('hide');
                     $('#modal-admin-add-fixture').modal('show');
                 }
             },
             titleAttr: 'AGREGAR FIXTURE'
         }, {
             text: 'CORREOS',
             className: 'btn btn-success btn-sm',
             action: function(e, dt, node, config) {
                 var _token = $('input[name=_token]').val();
                 $.ajax({
                     url: '/email',
                     type: 'post',
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': _token
                     },
                     data: {
                         touinfscode: $('#select-torneo-fixture').val()
                     },
                     success: function(data) {}
                 });
             },
             titleAttr: 'AGREGAR FIXTURE'
         }],
         ajax: {
             url: '/tableGestionarFixture',
             data: function(d) {

                 var toufixdplay = $('#date-toufixdplay').val();
                 var touinfscode = $('#select-torneo-fixture').val();
                 d.toufixdplay = toufixdplay;
                 d.touinfscode = touinfscode;
             }
         },
         columns: [{
             data: 'toufixthour'
         }, {
             width: 35,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div>'
             }
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 var toufixsscr1 = full.toufixsscr1 == null ? ' ' : +full.toufixsscr1;
                 var toufixsscr2 = full.toufixsscr2 == null ? ' ' : +full.toufixsscr2;
                 return '<strong style="font-size: 15px; font-weight:700"> ' + toufixsscr1 + '</strong> ' + " - " + '<strong  style="font-size: 15px; font-weight:700"> ' + toufixsscr2 + '</strong> '
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname2 + '</h6></div>'
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt2 + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.constascode == 1) {
                     return '<span class="label label-warning">' + full.constatdesc + '</span>'
                 } else if (full.constascode == 2) {
                     return '<span class="label label-success">' + full.constatdesc + '</span>'
                 } else {
                     return '<span class="label label-info">' + full.constatdesc + '</span>'
                 }
             }
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<strong style="font-size: 14px; font-weight:700"> ' + full.toufixyxval + '</strong> '
             }
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.constascode == 1) {
                     return "<tr><a class='btn-fixture' OnClick='enJuego(" + full.toufixicode + ");'  title=''><i class='fa fa-flag-o'></i></a></tr>";
                 } else if (full.constascode == 2) {
                     return "<tr><a class='btn-fixture' OnCLIck='editarScoreTofix(" + full.toufixicode + ")' title='EN JUEGO'><i class='fa fa-futbol-o'></i></a></tr>";
                 }
                 return "";
             }
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.constascode == 2) {
                     return "<tr><a class='btn-fixture' OnClick='procesarPartido(" + full.toufixicode + ");'  title='FINALIZAR '><i class='fa fa-spinner'></i></a></tr>";
                 }
                 return "";
             }
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.constascode == 1 || full.constascode == 2) {
                     return "<tr><a class='btn-fixture' OnClick='suspender(" + full.toufixicode + ");' title='SUSPENDER'><i class='fa fa-minus-circle'></i></a></tr>";
                 }
                 return "";
             }
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 if (full.constascode == 1) {
                     return "<tr><a class='btn-edit' OnClick='editarFixture(" + full.toufixicode + ")' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
                 }
                 return "";
             }
         }, ],
     });
     $("#table-admin-gestionar-grupos").DataTable({
         colReorder: true,
         "ordering": false,
         "searching": true,
         responsive: true,
         "pageLength": 5,
         "paging": true,
         "info": false,
         dom: 'Bfrtip',
         language: {
             // processing: "<img src='/images/db/loading.gif'>",
             processing: "Cargando",
             "sLengthMenu": "Mostrar _MENU_ registros",
             "sZeroRecords": "No se encontraron resultados",
             "sEmptyTable": "Ningún dato disponible en esta tabla",
             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sInfoPostFix": "",
             "sSearch": "Buscar:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Cargando...",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast": "Último",
                 "sNext": "Siguiente",
                 "sPrevious": "Anterior"
             },
             buttons: {
                 pageLength: {
                     _: "%d Filas",
                     '-1': "Mostrar todas las filas"
                 }
             }
         },
         processing: true,
         serverSide: true,
         buttons: [{
             text: 'AGREGAR',
             className: 'btn btn-primary-inverse btn-sm',
             action: function(e, dt, node, config) {
                 var touinfscode = $('#select-torneo-admin-torneos').val();
                 if (touinfscode == null) {
                     swal({
                         title: "Es obligatorio seleccionar un torneo ",
                         type: "error",
                         html: true,
                         showConfirmButton: true,
                         closeOnConfirm: true
                     });
                 } else {
                     $('#admin-gestionar-grupo-tipo').val(0);
                     $('#title-configurar-grupo').text('AGREGAR GRUPO');
                     $('#admin-gestionar-grupo-touinfscode-hidden').val(touinfscode);
                     $('#modal-admin-gestionar-grupo').modal('hide');
                     $('#modal-admin-gestionar-grupo-add').modal('show');
                 }
             },
             titleAttr: 'AGREGAR FIXTURE'
         }],
         "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
             $(nRow).children().each(function(index, td) {
                 // $(nRow.cells[4]).css({'background-color': aData.constatclbg, 'color' : 'black', 'font-weight':'600'});
                 $(nRow.cells[7]).css({
                     'background-color': '#cdeaf8',
                     'color': 'black',
                     'font-weight': '600'
                 });
             });
         },
         ajax: {
             url: '/tableGestionarGruposAdmin',
             data: function(d) {
                 var touinfscode = $('#select-torneo-admin-torneos').val();
                 d.touinfscode = touinfscode;
             }
         },
         columns: [{
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return '<figure class="team-meta__logo"><img src="/images/' + full.tougrpvimgg + '" alt=""></figure>'
             }
         }, {
             orderable: false,
             sortable: false,
             data: 'tougrptname'
         }, {
             orderable: false,
             sortable: false,
             data: 'plainftname'
         }, {
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return moment(full.tougrpdcrea).lang('es').format('L');
             }
         }, {
             orderable: false,
             sortable: false,
             data: 'tougrpsmaxp'
         }, {
             orderable: false,
             sortable: false,
             data: 'tougrpsmedp'
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             data: 'tougrpsminp'
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             data: 'total'
         }, {
             width: 50,
             orderable: false,
             sortable: false,
             render: function(data, type, full, meta) {
                 return "<tr><a class='btn-edit' OnClick='editarAdminGrupo(" + full.tougrpicode + ")' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
             }
         }, ],
     });
     $('.dataTables_filter > label > input').addClass('modify');
     $('#tableinvitaciones_processing').addClass('position-processing');
     // $('.dt-buttons > a').addClass('btn-refresh');
     $('.dt-buttons > a').removeClass('btn-refresh');
     $('.dt-buttons > a').removeClass('dt-button');
     $('.dt-buttons > a').removeClass('buttons-collection buttons-page-length');
     $('#tablepociciones_wrapper > .dt-buttons > a').removeClass('buttons-collection buttons-page-length');
     $('#tablepociciones_wrapper > .dt-buttons > a').addClass('btn btn-primary btn-xs');
     $('#tablepociciones_wrapper > .dt-buttons > a').addClass('btn btn-xs');
     $('#table-pociciones-dia_wrapper > .dt-buttons > a').removeClass('buttons-collection buttons-page-length');
     $('#table-pociciones-dia_wrapper > .dt-buttons > a').addClass('btn btn-primary btn-xs');
     $('#table-pociciones-dia_wrapper > .dt-buttons > a').addClass('btn btn-xs');
     $('.dt-buttons').css({
         display: 'inline-flex'
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
     document.getElementById('form-button-register').disabled = 1;
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
         formData.append("password", secusrtpass);
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
                     window.location.href = "/";
                     // document.getElementById('form-button-register').disabled = 0;
                 }
             },
             error: function(xhr, status, error) {

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
         success: function(data) {
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
         url: '/toufixShow/' + toufixicode,
         type: 'get',
         datatype: 'json',
         data: {
             toufixicode: toufixicode
         },
         success: function(data) {

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
         success: function(data) {
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
     }, function(isConfirm) {
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
                 success: function(data) {
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
         success: function(data) {
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
         success: function(data) {
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
         success: function(data) {
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
         success: function(data) {
             debugger
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
                 }, function(isConfirm) {
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
                             success: function(data) {
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
                     success: function(data) {
                         $('#table-admin-torneo-equipo').DataTable().ajax.reload();
                     }
                 });
             }
         }
     });
     // swal("Changed!", "Confirm button text was changed!!", "success");
 }
 $("#formgrupoconfig").submit(function(e) {
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
         success: function(data) {

             window.location.reload();
         },
     });
 });
 $("#iniciosession").submit(function(e) {
     document.getElementById('form-login-button-submit').disabled = 1;
     e.preventDefault();
     $.ajax({
         url: '/login',
         type: 'post',
         datatype: 'json',
         data: {
             '_token': $('input[name=_token]').val(),
             'secusrtmail': $('#secusrtmail').val(),
             'password': $('#password').val()
         },
         success: function(data) {

             if (data.success == 0) {
                 $('#false').show();
                 $('#true').hide();
                 $('#false').text(data.mensaje);
                 setTimeout(function() {
                     $('#false').hide();
                     document.getElementById('form-login-button-submit').disabled = 0;
                 }, 2500);
             } else {
                 $('#false').hide();
                 $('#true').show();
                 $('#true').text(data.mensaje);
                 setTimeout(function() {
                     window.location.href = "/";
                     document.getElementById('form-login-button-submit').disabled = 0;
                 }, 2500);
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
     document.getElementById('form-agregar-tincazo-button').disabled = 1;
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

             if (data.message == 1 && data.error == true && data.success == false && data.types == "constascode") {
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
 $("#form-admin-toufix").submit(function(e) {
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
     $.ajax({
         url: '/toufixShow/' + toufixicode,
         type: 'get',
         datatype: 'json',
         data: {
             toufixicode: toufixicode
         },
         success: function(data) {
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
         success: function(data) {
             if (data.mensaje == 1) {
                 // $('#modal-nuevo-agregar-tinzaso').modal('hide');
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
     $('#invitar-' + plainficode).empty();
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
         success: function(data) {
             window.location.href = "/";
         }
     });
 }

 function validate() {}
 // $('#image-upload').on('change', function() {
 //     var file_size = $('#image-upload')[0].files[0].size;
 //     if (file_size > 1024) {
 //         $("#file_error").html("El tamaño del archivo es mayor que 1 MB");
 //         return false;
 //     }
 //     return true;
 // });
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

 function comboEquipos(touinfscode, contypscode) {
     $("#select-torneo-equipo").select2({
         placeholder: "Filtrar equipo",
         ajax: {
             url: "/comboEquipos/" + touinfscode + "/" + contypscode,
             dataType: 'json',
             delay: 250,
             processResults: function(data) {
                 return {
                     results: $.map(data, function(item) {
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
     var tougrpicode = $('#session-select-tougrpicode').val();
     var tougplicode = $('#session-select-tougplicode').val();
     var touinfdstat = $('#fecha-actual-server').val();
     var touinfscode = $('#session-select-touinfscode').val();
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
             touinfdstat: touinfdstat,
             touinfscode: touinfscode
         },
         success: function(data) {
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
                 $('#estadisticas').empty();
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
         }
     });
     estadisticas();
 }

 function estadisticas() {
     $('#estadisticas').empty();
     $('#jugadores').empty();
     var tougrpicode = $('#session-select-tougrpicode').val();
     $.ajax({
         url: '/estadisticas',
         type: 'get',
         dataType: 'json',
         data: {
             tougrpicode: tougrpicode,
         },
         success: function(data) {

             $('#jugadores').empty();
             var text = "";
             for (var i = 0; i < data.length; i++) {
                 var value = data[i].cantidad
                 if (data[i].touttebenbl == 0 && data[i].touttebisch == 0) {
                     var style = "style='cursor: pointer; background-color: rgba(0, 0, 0, 0.1803921568627451); text-decoration:line-through;font-weight:bold; color:black;'";
                 } else if (data[i].touttebenbl == 0 && data[i].touttebisch == 1) {
                     var style = "style='cursor: pointer; background-image: url(/images/champions.png);background-repeat: no-repeat;background-size: cover;'";
                 } else if (data[i].touttebenbl == 1 && data[i].touttebisch == 0) {
                     var style = "style='cursor: pointer'";

                 }
                 if (value > 1) {
                     text = "JUGAD0RES";
                 } else {
                     text = "JUGADOR";
                 }
                 html = "<li " + style + " id='touttescode-" + data[i].touttescode + "'  class='team-stats__item team-stats__item--clean'  data-touttebenbl='" + data[i].touttebenbl + "' data-touteavimgt='" + data[i].touteavimgt + "' data-toutetname='" + data[i].touteatname + "' onclick='listaJugadoresCampeon(" + data[i].touttescode + ")' ><div class='team-stats__icon team-stats__icon--circle'><img style='height: 50px' src='images/" + data[i].touteavimgt + "'  alt=' class='team-stats__icon-primary'></div><div class='team-stats__label' style='color: black;font-size: 14px;font-weight: 600;'> " + data[i].touteatname + "</div><div class='team-stats__value' style='font-size: 12px; color: red'>" + data[i].cantidad + " " + text + "</div></li>";
                 $('#estadisticas').append(html)
             }
         }
     });
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
     var tougrpicode = $('#session-select-tougrpicode').val();
     $.ajax({
         url: '/listaJugadoresCampeon',
         type: 'get',
         dataType: 'json',
         data: {
             tougrpicode: tougrpicode,
             touttescode: touttescode
         },
         success: function(data) {
             $('#modal-jugadores-campeon').modal('show');
             $('#jugadores').empty();
             var text = "";
             for (var i = 0; i < data.length; i++) {
                 html = "<li class='team-stats__item team-stats__item--clean' ><div class='team-stats__icon team-stats__icon--circle'><img style='height: 50px' src='images/" + data[i].plainfvimgp + "'  alt=' class='team-stats__icon-primary'></div><div class='team-stats__label' style='color: black;font-size: 10px;    margin: 1px;font-weight: 600;'> " + data[i].plainftnick + "</div></li>";
                 $('#jugadores').append(html)
             }
         }
     });
 }

 function isEmpty(value) {
     return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
 }

 function tusTincazosPendientes(shearh) {
     $('#game-result-pendientes').empty();
     var tougplicode = $('#session-select-tougplicode').val();
     var touinfscode = $('#session-select-touinfscode').val();
     $.ajax({
         url: '/tusTincazosPendientes',
         type: 'get',
         dataType: 'json',
         data: {
             tougplicode: tougplicode,
             touinfscode: touinfscode,
             shearh: shearh
         },
         success: function(data) {
             $('#game-result-pendientes').empty();
             var toufixsscr1Pendientes = '';
             var toufixsscr2Pendientes = '';
             var score_dash = '-';
             for (var i = 0; i < data.listaPartidosPendiente.length; i++) {

                 var plapreicodePendientes = data.listaPartidosPendiente[i].plapreicode == null ? null : data.listaPartidosPendiente[i].plapreicode;
                 var plapresscr1Pendientes = data.listaPartidosPendiente[i].plapresscr1 == null ? "" : data.listaPartidosPendiente[i].plapresscr1;
                 var plapresscr2Pendientes = data.listaPartidosPendiente[i].plapresscr2 == null ? "" : data.listaPartidosPendiente[i].plapresscr2;
                 var plapresscr2 = isEmpty(plapresscr2Pendientes) == true ? null : plapresscr2Pendientes;
                 var plapresscr1 = isEmpty(plapresscr1Pendientes) == true ? null : plapresscr1Pendientes;
                 if (data.listaPartidosPendiente[i].toufixsscr1 > data.listaPartidosPendiente[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultwinner__1__" + data.listaPartidosPendiente[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner'>" + data.listaPartidosPendiente[i].toufixsscr1 + "</span>";
                 } else if (data.listaPartidosPendiente[i].toufixsscr1 < data.listaPartidosPendiente[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultloser__1__" + data.listaPartidosPendiente[i].toufixicode + "' class='game-result__score-result game-result__score-result--loser--winner'>" + data.listaPartidosPendiente[i].toufixsscr1 + "</span>";
                 } else {
                     toufixsscr1Pendientes = "<span id='scoreresultdraw__1__" + data.listaPartidosPendiente[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-1'>" + data.listaPartidosPendiente[i].toufixsscr1 + "</span>";
                 }
                 if (data.listaPartidosPendiente[i].toufixsscr2 < data.listaPartidosPendiente[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span id='scoreresultloser__2__" + data.listaPartidosPendiente[i].toufixicode + "'  class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosPendiente[i].toufixsscr2 + "</span>";
                 } else if (data.listaPartidosPendiente[i].toufixsscr2 > data.listaPartidosPendiente[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span  id='scoreresultwinner__2__" + data.listaPartidosPendiente[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosPendiente[i].toufixsscr2 + "</span>";
                 } else {
                     toufixsscr2Pendientes = "<span  id='scoreresultdraw__2__" + data.listaPartidosPendiente[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-2'>" + data.listaPartidosPendiente[i].toufixsscr2 + "</span>";
                 }
                 // htmlPendientes = "<section class='game-result__section pt-15'><header class='game-result__header game-result__header--alt game-result__header__modify'><span class='game-result__league game-result__league__modify'> " + data.listaPartidosPendiente[i].toufixdplay + " </span><h3 class='game-result__title'><span style='font-size:25px; color: #ff7e1f'><strong> " + plapresscr1Pendientes + " </strong></span><figure class='comment__author-avatar avatar__modify' onclick='mi_tincazo(" + data.listaPartidosPendiente[i].toufixicode + "," + plapreicodePendientes + "," + plapresscr1 + "," + plapresscr2 + ")'><img  src='assets/images/soccer/tincaso-pred.png'></img></figure><span style='font-size:25px; color: #ff7e1f'><strong> " + plapresscr2Pendientes + " </strong></span></h3><time class='game-result__date game-result__date__modify'> " + data.listaPartidosPendiente[i].toufixthour + "</time></header><div class='game-result__content' style='margin: 0px'><div class='game-result__team game-result__team--first'><figure class='game-result__team-logo' style='width: 20%; height: 68px;'><img src='images/" + data.listaPartidosPendiente[i].touteavimgt + "'></img></figure><div class='game-result__team-info' style='padding-top: 20px;'><h5 class='game-result__team-name'>" + data.listaPartidosPendiente[i].touteatname + " </h5> </div></div><div class='game-result__score-wrap' style='padding: 1px 0 0 0;'><div class='game-result__score game-result__score--lg game-result__score__modify' >" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + " </div><div class='label label-warning'>" + data.listaPartidosPendiente[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo' style='width: 20%;height: 68px;'><img  src='images/" + data.listaPartidosPendiente[i].touteavimgt2 + "'></img></figure><div class='game-result__team-info' style='padding-top: 20px;'><h5 class='game-result__team-name'> " + data.listaPartidosPendiente[i].touteatname2 + "</h5></div></div></div></section>";

                 var tincazo = data.listaPartidosPendiente[i].plapreicode == null ? 'SIN TINCAZO <i class="fa fa-question" style="font-size:17px; color:black"></i>' : 'TINCAZO  &nbsp; ' + "<strong style='color:black ; font-size:17px'>" + plapresscr1Pendientes + " </strong>" + " - " + "<strong  style='color:black ; font-size:17px'>" + plapresscr2Pendientes + " </strong>";
                 if (data.listaPartidosPendiente[i].plapreicode == null) {
                     var tincazoFinal = "<h3 style='cursor:pointer; color:red; font-size:13px' onclick='mi_tincazo(" + data.listaPartidosPendiente[i].toufixicode + "," + plapreicodePendientes + "," + plapresscr1 + "," + plapresscr2 + ")' class='game-result__title'> " + tincazo + "</h3>"

                 } else {
                     var tincazoFinal = "<h3 style='cursor:pointer; color:#38a9ff; font-size:13px' onclick='mi_tincazo(" + data.listaPartidosPendiente[i].toufixicode + "," + plapreicodePendientes + "," + plapresscr1 + "," + plapresscr2 + ")' class='game-result__title'> " + tincazo + "</h3>"

                 }
                 htmlPendientes = "<section class='game-result__section pt-0'><header class='game-result__header game-result__header--alt'><span class='game-result__league'> " + moment(data.listaPartidosPendiente[i].toufixdplay).lang('es').format('dddd DD [de] MMMM') + " </span> " + tincazoFinal + "<time class='game-result__date' >" + moment(data.listaPartidosPendiente[i].toufixdplay + " " + data.listaPartidosPendiente[i].toufixthour).lang('es').format('HH:mm A') + "</time></header> <div class='game-result__content'><div class='game-result__team game-result__team--first'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosPendiente[i].touteavimgt + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosPendiente[i].touteatname + "</h5></div></div><div class='game-result__score-wrap'><div class='game-result__score game-result__score--lg'>" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + "</div><div class='game-result__score-label'>" + data.listaPartidosPendiente[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosPendiente[i].touteavimgt2 + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosPendiente[i].touteatname2 + "</h5></div></div></div></section><div class='spacer'></div> ";
                 $('#game-result-pendientes').append(htmlPendientes);
                 data.listaPartidosPendiente[i].toufixsscr1 == null ? $('#scoreresultwinner__1__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
                 data.listaPartidosPendiente[i].toufixsscr1 == null ? $('#scoreresultloser__1__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
                 data.listaPartidosPendiente[i].toufixsscr1 == null ? $('#scoreresultdraw__1__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
                 data.listaPartidosPendiente[i].toufixsscr2 == null ? $('#scoreresultwinner__2__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
                 data.listaPartidosPendiente[i].toufixsscr2 == null ? $('#scoreresultloser__2__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
                 data.listaPartidosPendiente[i].toufixsscr2 == null ? $('#scoreresultdraw__2__' + data.listaPartidosPendiente[i].toufixicode).empty() : "";
             }
             // for (var o = 0; o < data.listaPartidosJuego.length; o++) {
             //     $('#game-result-juego').append(html)
             // }
             // for (var u = 0; u < data.listaPartidosFinalizados.length; u++) {
             //     $('#game-result-finalizados').append(html)
             // }
         }
     });
 }

 function tusTincazosJuego(shearh) {
     $('#game-result-juego').empty();
     var tougplicode = $('#session-select-tougplicode').val();
     var touinfscode = $('#session-select-touinfscode').val();
     $.ajax({
         url: '/tusTincazosJuego',
         type: 'get',
         dataType: 'json',
         data: {
             tougplicode: tougplicode,
             touinfscode: touinfscode,
             shearh: shearh
         },
         success: function(data) {
             $('#game-result-juego').empty();
             var toufixsscr1Pendientes = '';
             var toufixsscr2Pendientes = '';
             var score_dash = '-';
             for (var i = 0; i < data.listaPartidosJuego.length; i++) {
                 var plapreicodePendientes = data.listaPartidosJuego[i].plapreicode == null ? null : data.listaPartidosJuego[i].plapreicode;
                 var plapresscr1Pendientes = data.listaPartidosJuego[i].plapresscr1 == null ? '' : data.listaPartidosJuego[i].plapresscr1;
                 var plapresscr2Pendientes = data.listaPartidosJuego[i].plapresscr2 == null ? '' : data.listaPartidosJuego[i].plapresscr2;
                 var tincazo = 'Ver TINCAZOS  &nbsp;<i class="fa fa-search" style="font-size:17px; color:black"></i>';
                 var plapresscr2 = plapresscr2Pendientes == '' ? null : plapresscr2Pendientes;
                 var plapresscr1 = plapresscr1Pendientes == '' ? null : plapresscr1Pendientes;
                 if (data.listaPartidosJuego[i].toufixsscr1 > data.listaPartidosJuego[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultwinnerJ__1__" + data.listaPartidosJuego[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner'>" + data.listaPartidosJuego[i].toufixsscr1 + "</span>";
                 } else if (data.listaPartidosJuego[i].toufixsscr1 < data.listaPartidosJuego[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultloserJ__1__" + data.listaPartidosJuego[i].toufixicode + "' class='game-result__score-result game-result__score-result--loser--winner'>" + data.listaPartidosJuego[i].toufixsscr1 + "</span>";
                 } else {
                     toufixsscr1Pendientes = "<span id='scoreresultdrawJ__1__" + data.listaPartidosJuego[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-1'>" + data.listaPartidosJuego[i].toufixsscr1 + "</span>";
                 }
                 if (data.listaPartidosJuego[i].toufixsscr2 < data.listaPartidosJuego[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span id='scoreresultloserJ__2__" + data.listaPartidosJuego[i].toufixicode + "'  class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosJuego[i].toufixsscr2 + "</span>";
                 } else if (data.listaPartidosJuego[i].toufixsscr2 > data.listaPartidosJuego[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span  id='scoreresultwinnerJ__2__" + data.listaPartidosJuego[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosJuego[i].toufixsscr2 + "</span>";
                 } else {
                     toufixsscr2Pendientes = "<span  id='scoreresultdrawJ__2__" + data.listaPartidosJuego[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-2'>" + data.listaPartidosJuego[i].toufixsscr2 + "</span>";
                 }
                 // htmlPendientes1 = "<section class='game-result__section pt-15'><header class='game-result__header game-result__header--alt game-result__header__modify'><span class='game-result__league game-result__league__modify'> " + data.listaPartidosJuego[i].toufixdplay + " </span><h3 class='game-result__title'><span style='font-size:25px; color: #24d9b0'><strong> " + plapresscr1Pendientes + " </strong></span><figure class='comment__author-avatar avatar__modify' onclick='tincazos(" + data.listaPartidosJuego[i].toufixicode + ")'><img  src='assets/images/soccer/tincaso-pred.png'></img></figure><span style='font-size:25px; color: #24d9b0'><strong> " + plapresscr2Pendientes + " </strong></span></h3><time class='game-result__date game-result__date__modify'> " + data.listaPartidosJuego[i].toufixthour + "</time></header><div class='game-result__content' style='margin: 0px'><div class='game-result__team game-result__team--first'><figure class='game-result__team-logo' style='width: 20%; height: 68px;'><img src='images/" + data.listaPartidosJuego[i].touteavimgt + "'></img></figure><div class='game-result__team-info' style='padding-top: 20px;'><h5 class='game-result__team-name'>" + data.listaPartidosJuego[i].touteatname + " </h5> </div></div><div class='game-result__score-wrap' style='padding: 1px 0 0 0;'><div class='game-result__score game-result__score--lg game-result__score__modify' >" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + " </div><div class='label label-success'>" + data.listaPartidosJuego[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo' style='width: 20%;height: 68px;'><img  src='images/" + data.listaPartidosJuego[i].touteavimgt2 + "'></img></figure><div class='game-result__team-info' style='padding-top: 20px;'><h5 class='game-result__team-name'> " + data.listaPartidosJuego[i].touteatname2 + "</h5></div></div></div></section>";
                 htmlPendientes1 = "<section class='game-result__section pt-0'><header class='game-result__header game-result__header--alt'><span class='game-result__league'> " + moment(data.listaPartidosJuego[i].toufixdplay).lang('es').format('dddd DD [de] MMMM') + " </span><h3 style='cursor:pointer; color:#38a9ff; font-size:13px;text-transform: NONE' onclick='tincazos(" + data.listaPartidosJuego[i].toufixicode + ")' class='game-result__title'> " + tincazo + "</h3><time class='game-result__date' datetime='2017-03-17'>" + moment(data.listaPartidosJuego[i].toufixdplay + " " + data.listaPartidosJuego[i].toufixthour).lang('es').format('HH:mm A') + "</time></header> <div class='game-result__content'><div class='game-result__team game-result__team--first'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosJuego[i].touteavimgt + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosJuego[i].touteatname + "</h5></div></div><div class='game-result__score-wrap'><div class='game-result__score game-result__score--lg'>" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + "</div><div class='game-result__score-label'>" + data.listaPartidosJuego[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosJuego[i].touteavimgt2 + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosJuego[i].touteatname2 + "</h5></div></div></div></section><div class='spacer'></div> ";
                 $('#game-result-juego').append(htmlPendientes1);
                 data.listaPartidosJuego[i].toufixsscr1 == null ? $('#scoreresultwinnerJ__1__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
                 data.listaPartidosJuego[i].toufixsscr1 == null ? $('#scoreresultloserJ__1__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
                 data.listaPartidosJuego[i].toufixsscr1 == null ? $('#scoreresultdrawJ__1__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
                 data.listaPartidosJuego[i].toufixsscr2 == null ? $('#scoreresultwinnerJ__2__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
                 data.listaPartidosJuego[i].toufixsscr2 == null ? $('#scoreresultloserJ__2__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
                 data.listaPartidosJuego[i].toufixsscr2 == null ? $('#scoreresultdrawJ__2__' + data.listaPartidosJuego[i].toufixicode).empty() : "";
             }
         }
     });
 }

 function tusTincazosFinalizados(shearh) {
     $('#game-result-finalizado').empty();
     var tougplicode = $('#session-select-tougplicode').val();
     var touinfscode = $('#session-select-touinfscode').val();
     $.ajax({
         url: '/tusTincazosFinalizados',
         type: 'get',
         dataType: 'json',
         data: {
             tougplicode: tougplicode,
             touinfscode: touinfscode,
             shearh: shearh
         },
         success: function(data) {
             $('#game-result-finalizado').empty();
             var toufixsscr1Pendientes = '';
             var toufixsscr2Pendientes = '';
             var score_dash = '-';
             for (var i = 0; i < data.listaPartidosFinalizados.length; i++) {
                 var plapreicodePendientes = data.listaPartidosFinalizados[i].plapreicode == null ? null : data.listaPartidosFinalizados[i].plapreicode;
                 var plapresscr1Pendientes = data.listaPartidosFinalizados[i].plapresscr1 == null ? '' : data.listaPartidosFinalizados[i].plapresscr1;
                 var plapresscr2Pendientes = data.listaPartidosFinalizados[i].plapresscr2 == null ? '' : data.listaPartidosFinalizados[i].plapresscr2;
                 var tincazo = 'Ver TINCAZOS &nbsp;<i class="fa fa-search" style="font-size:17px; color:black"></i>';
                 var plapresscr2 = plapresscr2Pendientes == '' ? null : plapresscr2Pendientes;
                 var plapresscr1 = plapresscr1Pendientes == '' ? null : plapresscr1Pendientes;
                 if (data.listaPartidosFinalizados[i].toufixsscr1 > data.listaPartidosFinalizados[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultwinnerJ__1__" + data.listaPartidosFinalizados[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner'>" + data.listaPartidosFinalizados[i].toufixsscr1 + "</span>";
                 } else if (data.listaPartidosFinalizados[i].toufixsscr1 < data.listaPartidosFinalizados[i].toufixsscr2) {
                     toufixsscr1Pendientes = "<span id='scoreresultloserJ__1__" + data.listaPartidosFinalizados[i].toufixicode + "' class='game-result__score-result game-result__score-result--loser--winner'>" + data.listaPartidosFinalizados[i].toufixsscr1 + "</span>";
                 } else {
                     toufixsscr1Pendientes = "<span id='scoreresultdrawJ__1__" + data.listaPartidosFinalizados[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-1'>" + data.listaPartidosFinalizados[i].toufixsscr1 + "</span>";
                 }
                 if (data.listaPartidosFinalizados[i].toufixsscr2 < data.listaPartidosFinalizados[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span id='scoreresultloserJ__2__" + data.listaPartidosFinalizados[i].toufixicode + "'  class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosFinalizados[i].toufixsscr2 + "</span>";
                 } else if (data.listaPartidosFinalizados[i].toufixsscr2 > data.listaPartidosFinalizados[i].toufixsscr1) {
                     toufixsscr2Pendientes = "<span  id='scoreresultwinnerJ__2__" + data.listaPartidosFinalizados[i].toufixicode + "' class='game-result__score-result game-result__score-result--winner--loser'>" + data.listaPartidosFinalizados[i].toufixsscr2 + "</span>";
                 } else {
                     toufixsscr2Pendientes = "<span  id='scoreresultdrawJ__2__" + data.listaPartidosFinalizados[i].toufixicode + "' class='game-result__score-result game-result__score-result--draw-2'>" + data.listaPartidosFinalizados[i].toufixsscr2 + "</span>";
                 }
                 htmlPendientes1 = "<section class='game-result__section pt-0'><header class='game-result__header game-result__header--alt'><span class='game-result__league'> " + moment(data.listaPartidosFinalizados[i].toufixdplay).lang('es').format('dddd DD [de] MMMM') + " </span><h3 style='cursor:pointer; color:#38a9ff; font-size:13px; text-transform: NONE' onclick='tincazos(" + data.listaPartidosFinalizados[i].toufixicode + ")' class='game-result__title'> " + tincazo + "</h3><time class='game-result__date' datetime='2017-03-17'>" + moment(data.listaPartidosFinalizados[i].toufixdplay + " " + data.listaPartidosFinalizados[i].toufixthour).lang('es').format('HH:mm A') + "</time></header> <div class='game-result__content'><div class='game-result__team game-result__team--first'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosFinalizados[i].touteavimgt + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosFinalizados[i].touteatname + "</h5></div></div><div class='game-result__score-wrap'><div class='game-result__score game-result__score--lg'>" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + "</div><div class='game-result__score-label'>" + data.listaPartidosFinalizados[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosFinalizados[i].touteavimgt2 + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosFinalizados[i].touteatname2 + "</h5></div></div></div></section><div class='spacer'></div> ";
                 $('#game-result-finalizado').append(htmlPendientes1);
                 data.listaPartidosFinalizados[i].toufixsscr1 == null ? $('#scoreresultwinnerJ__1__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
                 data.listaPartidosFinalizados[i].toufixsscr1 == null ? $('#scoreresultloserJ__1__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
                 data.listaPartidosFinalizados[i].toufixsscr1 == null ? $('#scoreresultdrawJ__1__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
                 data.listaPartidosFinalizados[i].toufixsscr2 == null ? $('#scoreresultwinnerJ__2__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
                 data.listaPartidosFinalizados[i].toufixsscr2 == null ? $('#scoreresultloserJ__2__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
                 data.listaPartidosFinalizados[i].toufixsscr2 == null ? $('#scoreresultdrawJ__2__' + data.listaPartidosFinalizados[i].toufixicode).empty() : "";
             }
         }
     });
 }
 $(".reveal").on('click', function() {
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
             processResults: function(data) {
                 return {
                     results: $.map(data, function(item) {
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
             processResults: function(data) {
                 return {
                     results: $.map(data, function(item) {
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
             processResults: function(data) {
                 return {
                     results: $.map(data, function(item) {
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
         success: function(data) {
             window.location.href = '/?q=true';
         }
     });
 }
 $(".buscar").keyup(function(e) {
     // $(".buscar").css("background-color", "pink");
     var search = $(".buscar").val();
     if ($.inArray(e.keyCode, [13]) !== -1 ||
         // Permitir: Ctrl+A
         (e.keyCode == 65 && e.ctrlKey === true) ||
         // Permitir: Ctrl+C
         (e.keyCode == 67 && e.ctrlKey === true) ||
         // Permitir: Ctrl+X
         (e.keyCode == 88 && e.ctrlKey === true) ||
         // Permitir: home, end, left, right
         (e.keyCode >= 35 && e.keyCode <= 39)) {
         // deja que ocurra, no hagas nada
         tusTincazosFinalizados(search);
         tusTincazosJuego(search);
         tusTincazosPendientes(search);
     }
     if (search == "") {
         tusTincazosFinalizados(search);
         tusTincazosJuego(search);
         tusTincazosPendientes(search);
     }
 });
 $("#shearh-tincazos").on('click', function() {
     var search = $(".buscar").val();
     tusTincazosFinalizados(search);
     tusTincazosJuego(search);
     tusTincazosPendientes(search);
 });
 $(".refresh-button").on('click', function() {
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