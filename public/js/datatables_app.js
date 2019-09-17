var table = $("#tablepociciones").DataTable({
    colReorder: true,
    "ordering": false,
    "searching": false,
    "paging": true,
    "info": true,
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    "pageLength": 25,
    initComplete: function () {
        var tougrpschpt = tougrp.tougrpschpt;

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
        className: 'btn-success',
        titleAttr: 'Refrescar Datos',
        text: '<i class="fa fa-refresh"></i>',
        action: function (e, dt, node, config) {
            dt.ajax.reload();
        }
    }, 'pageLength'],
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        $(nRow).children().each(function (index, td) {
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
    "createdRow": function (row, data, dataIndex) {
        $(row).attr('onClick', 'info_player(' + data.plainficode + ',"' + data.JUGADOR + '")');
        $(row).css({
            cursor: 'pointer',
        });
    },
    ajax: {
        url: '/tablaPosicionesGrupo',
        
    },
    columns: [{
        className: 'padding-pos',
        width: 10,
        data: 'POS'
    }, {
        orderable: false,
        sortable: false,
        width: 10,
        className: 'acciones',
        render: function (data, type, full, meta) {
            // return '<img class=\"circle\"  src="/images/db/' + data + '" />';
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.JUGADOR + '</h6></div></div>'
        }
    }, {
        data: 'TA',
        width: 10,
        searchable: false,
        orderable: false,
        sortable: false
    }, {
        data: 'TM',
        searchable: false,
        width: 10,
        orderable: false,
        sortable: false
    }, {
        data: 'TB',
        searchable: false,
        width: 10,
        orderable: false,
        sortable: false
    }, {
        data: 'TINCAZOS',
        searchable: false,
        width: 10,
        orderable: false,
        sortable: false
    }, {
        data: 'CAMPEON',
        searchable: false,
        orderable: false,
        width: 10,
        sortable: false
    }, {
        data: 'PTOS',
        searchable: false,
        orderable: false,
        width: 10,
        sortable: false
    },],
});
$("#table-pociciones-dia").DataTable({
    colReorder: true,
    "ordering": false,
    "searching": false,
    responsive: true,
    "paging": false,
    "info": true,
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
        className: 'btn-success',
        text: '<i class="fa fa-refresh"></i>',
        titleAttr: 'Refrescar Datos',
        action: function (e, dt, node, config) {
            dt.ajax.reload();
        }
    }, 'pageLength'],
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
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
    "createdRow": function (row, data, dataIndex) {
        $(row).attr('onClick', 'info_player_dia(' + data.plainficode + ',"' + data.plainftnick + '")');
        $(row).css({
            cursor: 'pointer',
        });
    },
    ajax: {
        url: '/tablaPosicionesPorDia',
        data: function (d) {
            var fecha = $('#date-filtrer-posiciones').val();
            d.fecha = fecha;
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
            render: function (data, type, full, meta) {
                return '<figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure>'
            }
        }, {
            orderable: false,
            sortable: true,
            render: function (data, type, full, meta) {
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
var tableinvitaciones = $("#tableinvitaciones").DataTable({

    "searching": true,
    "pageLength": 10,
    "paging": true,
    "info": false,
    dom: 'Bfrtip',
    "columnDefs": [
        {
            "targets": [ 1],
            "visible": false,
            "searchable": true
        },
        
    ],
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
    serverSide: false,
    buttons: [],
    ajax: {
        url: '/tablaInvitacionesGrupo',
      
    },
    columns: [{
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.plainfvimgp + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.plainftname + '</h6></div></div>'
        }
    },  {
        data: 'secusrtmail'
    },{
        orderable: true,
        sortable: true,
        render: function (data, type, full, meta) {
            // return '<img class=\"circle\"  src="/images/db/' + data + '" />';
            if (full.constascode == 1) {
                return '<span class="label label-warning">PENDIENTE</span>';
            } else if (full.constascode == 2) {
                return '<span class="label label-success">ACEPTADA</span>';
            } else if (full.constascode == null) {
                return '<a id="invitar-'+ full.secusrtmail +'"  href="javascript:void(0)" OnClick="invitar(\''+ full.secusrtmail + '\',true);" title="INVITAR"><span class="label label-info">INVITAR</span></a>';
            } else {
                return '<span class="label label-danger">RECHAZADA</span>';
            }
        }
    },],
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
        data: function (d) {
            d.plainficode = $('#modal-info-player-tinzaso-plainficode').val();
        }
    },
    columns: [{
        orderable: false,
        sortable: false,
        width:50,
        render: function (data, type, full, meta) {
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
        width: 30,
        orderable: false,
        sortable: false,
        className: 'text-center align-middle',
        render: function (data, type, full, meta) {
            return '<strong style="float:left"> ' + full.toufixsscr1 + '</strong>' + '<strong style="color:#38a9ff"> ' + full.plapresscr1 + '</strong>' + " - " + '<strong style=" ;color:#38a9ff"> ' + full.plapresscr2 + '</strong>' + '<strong style=" float:right"> ' + full.toufixsscr2 + '</strong>';
        }
    },
    //  {
    //     width:20,
    //     orderable: false,
    //     sortable: false, className: 'text-center',
    //     render: function(data, type, full, meta) {
    //         return '<strong style=" font-weight:700"> ' + full.toufixsscr2 + '</strong>';
    //     }
    // },
    {
        width:50,
        orderable: false,
        sortable: false,
        className: 'text-right',
        render: function (data, type, full, meta) {
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
        className: 'text-center align-middle',
        data: 'plapresptos'
    }
    ],
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
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
        data: function (d) {
            d.plainficode = $('#modal-info-player-tinzaso-plainficode-dia').val();
            d.fecha = $('#date-filtrer-posiciones').val();
        }
    },
    columns: [{
        orderable: false,
        sortable: false,
        width:50,
        render: function (data, type, full, meta) {
            // return '<figure class="team-meta__logo"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure>';
            return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt1 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv1 + '</h6></div>'
        }
    }, {
        width: 30,
        orderable: false,
        sortable: false,
        className: 'text-center align-middle',
        render: function (data, type, full, meta) {
            return '<strong style="float:left"> ' + full.toufixsscr1 + '</strong>' + '<strong style="color:#38a9ff"> ' + full.plapresscr1 + '</strong>' + " - " + '<strong style="color:#38a9ff"> ' + full.plapresscr2 + '</strong>' + '<strong style=" float:right"> ' + full.toufixsscr2 + '</strong>';
        }
    }, {
        orderable: false,
        width:50,
        sortable: false,
        className:'text-right',
        render: function (data, type, full, meta) {
            // return  full.touteatabrv2 ;
            return '<figure class="team-meta__logo_right"><img src="/images/' + full.touteavimgt2 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name_right">' + full.touteatabrv2 + '</h6></div>'
        }
    }, {
        orderable: false,
        sortable: false,
        className: 'text-center align-middle',
        data: 'plapresptos'
    }],
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData.plapresptos > 0) {
            $(nRow.cells[3]).css({
                'color': '#3c763d',
                'font-size': '12px',
                'font-weight': '700'
            });
        } else {
            $(nRow.cells[3]).css({
                'color': 'red',
                'font-size': '12px',
                'font-weight': '700'
            });
        }
    }
});
var table = $("#table-admin-torneo").DataTable({

    "searching": false,
    "pageLength": 5,
    "paging": true,
    "info": false,
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
    serverSide: false,
    buttons: [],
    ajax: '/tablaAdminTorneos',
    columns: [{
        width: 35,
        className: 'widthtable',
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            // return '<figure class="team-meta__logo"><img src="/images/' + full.touinfvlogt + '" alt=""></figure>'
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.touinfvlogt + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.touinftname + '</h6></div></div>'
        }
    },
    // }, {
    //     width: "5%",
    //     data: 'touinfscode'
    // }, {
    //     orderable: false,
    //     width: 200,
    //     sortable: true,
    //     render: function (data, type, full, meta) {
    //         return '<div class="team-meta__info"><h6 class="team-meta__name">' + full.touinftname + '</h6></div>'
    //     }
    // }, 
    {
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
        render: function (data, type, full, meta) {
            return "<tr><a class='btn-edit' OnClick='EditarTorneo(" + full.touinfscode + ");' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
        }
    }],
    buttons: [{
        text: 'AGREGAR',
        className: 'btn btn-primary-inverse btn-sm',
        action: function (e, dt, node, config) {
            $('#tipo').val(0);
            $('#modal-nuevo-torneo').modal('hide');
            $('#modal-admin-add-torneo').modal('show');
        },
        titleAttr: 'AGREGAR cotizacion'
    }]
});
var table = $("#table-admin-equipo").DataTable({
    colReorder: true,

    "searching": true,
    "pageLength": 5,
    "paging": true,
    "info": false,
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
        data: function (d) {
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
        render: function (data, type, full, meta) {
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div></div>'

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
        render: function (data, type, full, meta) {
            return "<tr><a class='btn-edit' OnClick='EditarEquipo(" + full.touteascode + ");' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
        }
    }, {
        width: 30,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return "<tr><a class='btn-eliminar' OnClick='EliminarEquipo(" + full.touteascode + ");' title='ELIMINAR'><i class='fa fa-times-circle'></i></a></tr>";
        }
    }],
    buttons: [{
        text: 'AGREGAR',
        className: 'btn btn-primary-inverse btn-sm',
        action: function (e, dt, node, config) {
            $('#tipo-equipo').val(0);
            $('#modal-nuevo-equipo').modal('hide');
            $('#modal-admin-add-equipo').modal('show');
        },
        titleAttr: 'AGREGAR EQUIPO'
    }]
});
var table = $("#table-admin-torneo-equipo").DataTable({
    // colReorder: true,
    
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    // dom: '<"row btn-group"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"rt><"row"ip>',
    "searching": true,
    "pageLength": 5,
    "paging": true,
    "info": false,
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

    ajax: {
        url: '/tablaAdminTorneosEquipos',
        data: function (d) {
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
        render: function (data, type, full, meta) {
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div></div>'

        }
    }, {
        data: 'contyptdesc'
    }, {
        width: 30,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return "<tr><a class='btn-eliminar' OnClick='EliminarEquipoTorneo(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='ELIMINAR'><i class='fa fa-times-circle'></i></a></tr>";
        }
    }, {
        width: 30,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            if (full.touttebenbl == 1 && full.touttebisch == 0) {
                return "<tr><a class='btn-estado' OnClick='EstadoEquipoTorneo(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='RETIRAR'><i class='fa fa-minus-circle'></i></a></tr>";
            }
            return '';
        }
    }, {
        width: 30,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            if (full.touttebenbl == 0 && full.touttebisch == 1) {
                return "<tr><img src='http://hackathon.ccafs.cgiar.org/wp-content/uploads/2014/10/icon-award_04.png' width='25px'></tr>";

            } else if (full.touttebenbl == 1 && full.touttebisch == 0) {
                return "<tr><a style='color:orange !important' class='btn-estado' OnClick='EquipoChampions(" + full.touteascode + "," + full.touinfscode + "," + full.touttescode + ");' title='CAMPEON'><i class='fa fa-star'></i></a></tr>";

            }
            return '';
        }
    }],
    buttons: [
        {
            className: 'btn-success',
            text: '<i class="fa fa-refresh"></i>',
            titleAttr: 'Refrescar Datos',
            action: function (e, dt, node, config) {
                dt.ajax.reload();
            }
        },
        {
            className: 'btn-sm',
            text: 'AGREGAR',
            action: function (e, dt, node, config) {
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
        data: function (d) {
            var toufixicode = $('#mostrar-toufixicode-hidden').val();
            if (toufixicode > 0) {
                d.toufixicode = toufixicode;
            } else {
                d.toufixicode = null;
            }
        }
    },
    columns: [{
        orderable: false,
        sortable: false,
        width: 100,
        render: function (data, type, full, meta) {
            return full.plainftnick;
        }
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return '<strong style="font-size: 15px; font-weight:700"> ' + full.plapresscr1 + '</strong> ' + " - " + '<strong  style="font-size: 15px; font-weight:700"> ' + full.plapresscr2 + '</strong> '
        }
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return moment(full.plapredcrea).locale('es').format('DD-MM');
        }
    }, {
        orderable: false,
        sortable: false,
        // data: 'plaprethour',
        render: function (data, type, full, meta) {
            // return moment(full.plapredcrea).locale('es').format('DD-MM');
            return moment(full.plaprethour, "hh:mm:ss").format("HH:mm");
        }
    }],
});
$("#table-fixture").DataTable({
    colReorder: true,
    "ordering": false,
    "searching": false,
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
        action: function (e, dt, node, config) {
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
        action: function (e, dt, node, config) {
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
                success: function (data) { }
            });
        },
        titleAttr: 'AGREGAR FIXTURE'
    }],
    ajax: {
        url: '/tableGestionarFixture',
        data: function (d) {

            var toufixdplay = $('#date-toufixdplay').val();
            var touinfscode = $('#select-torneo-fixture').val();
            d.toufixdplay = toufixdplay;
            d.touinfscode = touinfscode;
        }
    },
    columns: [{
        data: 'toufixthour'
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.touteavimgt + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname + '</h6></div></div>'

        }
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            var toufixsscr1 = full.toufixsscr1 == null ? ' ' : +full.toufixsscr1;
            var toufixsscr2 = full.toufixsscr2 == null ? ' ' : +full.toufixsscr2;
            return '<div class="text-center"><strong style="font-size: 15px; font-weight:700"> ' + toufixsscr1 + '</strong> ' + " - " + '<strong  style="font-size: 15px; font-weight:700"> ' + toufixsscr2 + '</strong></div>'
        }
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.touteavimgt2 + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.touteatname2 + '</h6></div></div>'
        }
    }, {
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
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
        render: function (data, type, full, meta) {
            return '<strong style="font-size: 14px; font-weight:700"> ' + full.toufixyxval + '</strong> '
        }
    }, {
        width: 50,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
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
        render: function (data, type, full, meta) {
            if (full.constascode == 2) {
                return "<tr><a class='btn-fixture' OnClick='procesarPartido(" + full.toufixicode + ");'  title='FINALIZAR '><i class='fa fa-spinner'></i></a></tr>";
            }
            return "";
        }
    }, {
        width: 50,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            if (full.constascode == 1 || full.constascode == 2) {
                return "<tr><a class='btn-fixture' OnClick='suspender(" + full.toufixicode + ");' title='SUSPENDER'><i class='fa fa-minus-circle'></i></a></tr>";
            }
            return "";
        }
    }, {
        width: 50,
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
            if (full.constascode == 1) {
                return "<tr><a class='btn-edit' OnClick='editarFixture(" + full.toufixicode + ")' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
            }
            return "";
        }
    },],
});
$("#table-admin-gestionar-grupos").DataTable({
    colReorder: true,
    "ordering": false,
    "searching": true,
    responsive: true,
    "pageLength": 5,
    "paging": true,
    "info": false,
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
        action: function (e, dt, node, config) {
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
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        $(nRow).children().each(function (index, td) {
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
        data: function (d) {
            var touinfscode = $('#select-torneo-admin-torneos').val();
            d.touinfscode = touinfscode;
        }
    },
    columns: [{
        orderable: false,
        sortable: false,
        render: function (data, type, full, meta) {
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
        render: function (data, type, full, meta) {
            return moment(full.tougrpdcrea).locale('es').format('L');
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
        render: function (data, type, full, meta) {
            return "<tr><a class='btn-edit' OnClick='editarAdminGrupo(" + full.tougrpicode + ")' title='EDITAR'><i class='fa fa-pencil-square'></i></a></tr>";
        }
    },],
});

$('.dataTables_wrapper > div > div > .dt-buttons > button').addClass('btn-sm');
$('.dataTables_wrapper > div > div > .dt-buttons > div.btn-group > button').addClass('btn-sm');
