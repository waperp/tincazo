/*=========================================================================================
    File Name: datatables-script.js
    Description: All tables
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Version: 1.1
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
==========================================================================================*/

$(document).ready(function() {

/******************************************
*       js of Basic initialisation        *
******************************************/

$('.data-basic-initialisation').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
} );
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('my-1');

/***********************************
*       js of Custom button        *
***********************************/

$('.data-custom-button').DataTable( {
    "language": {
            "url": "/app-assets/data/datatables/Spanish.json"
    },
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Nuevo',
            className: 'btn btn-primary',
            action: function ( e, dt, node, config ) {
                window.location = '/';
            }
        }
    ]
} );
  $("#empresas").DataTable({
        
        processing : true,
        serverSide : true,
        ajax : "concom",
        columns : [
            { data : 'concomicode'},
            { data : 'concomtname'},
            { data : 'concomdregc'},
            { data : 'concomvimgc'},
            { data : 'concomiclr1'},
            { data : 'concomiclr2'},
            { data : 'conparicode'},
            { data : 'contrticode'},
            { data : 'concomtaddr'},
            { data : 'concomtphon'},
            {defaultContent: "<tr><a href='/' class='editar btn btn-default' title='Editar'><i class='fa fa-pencil-square-o'></i></a></tr>",
                searchable:false,
                sortable:false},
            {defaultContent: "<tr><a href='/' class='editar btn btn-default' title='Editar'><i class='fa fa-times-circle'></i></a></tr>",
                searchable:false,
                sortable:false}

        ],

       });
paginador();

/*********************************
*       js of Class names        *
*********************************/

$('.data-class-names').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Red',
            className: 'red btn btn-secondary my-1',
        },
        {
            text: 'Orange',
            className: 'orange btn btn-secondary my-1',
        },
        {
            text: 'Green',
            className: 'green btn btn-secondary my-1',
        }
    ]
} );

/*****************************************
*       js of Keyboard activation        *
*****************************************/

$('.data-keyboard-activation').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Button <u>1</u>',
            className: 'my-1',
            key: '1',
            action: function ( e, dt, node, config ) {
                alert( 'Button 1 activated' );
            }
        },
        {
            text: 'Button <u><i>alt</i> 2</u>',
            className: 'my-1',
            key: {
                altKey: true,
                key: '2'
            },
            action: function ( e, dt, node, config ) {
                alert( 'Button 2 activated' );
            }
        }
    ]
} );

/***************************************
*       Multi-level collections        *
***************************************/

$('.data-multi-level').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'collection',
            text: 'Table control',
            className: 'my-1',
            buttons: [
                'colvis',
                {
                    text: 'Toggle start date',
                    className: 'my-1',
                    action: function ( e, dt, node, config ) {
                        dt.column( -2 ).visible( ! dt.column( -2 ).visible() );
                    }
                },
                {
                    text: 'Toggle salary',
                    className: 'my-1',
                    action: function ( e, dt, node, config ) {
                        dt.column( -1 ).visible( ! dt.column( -1 ).visible() );
                    }
                }
            ]
        }
    ]
} );

/********************************************
*       js of Multiple button groups        *
********************************************/

var tableMultiple = $('.data-multiple-buttongroups').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Button 1',
            className: 'my-1',
            action: function ( e, dt, node, config ) {
                alert( 'Button 1 clicked on' );
            }
        }
    ]
} );

new $.fn.dataTable.Buttons( tableMultiple, {
    buttons: [
        {
            text: 'Button 2',
            className: 'my-1',
            action: function ( e, dt, node, conf ) {
                alert( 'Button 2 clicked on' );
            }
        },
        {
            text: 'Button 3',
            className: 'my-1',
            action: function ( e, dt, node, conf ) {
                alert( 'Button 3 clicked on' );
            }
        }
    ]
} );

tableMultiple.buttons( 1, null ).container().appendTo(
    tableMultiple.table().container()
);

/*********************************
*       js of Page length        *
*********************************/

$('.data-page-length').DataTable( {
    dom: 'Bfrtip',
    className: 'my-1',
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ],
    buttons: [
        'pageLength'
    ]
} );



} );

function paginador() {
    
    // Setup - add a text input to each footer cell
    $('#empresas tfoot th').each(function () {
        var title = $(this).text();
        if (title == "") {

        } else {
            $(this).html('<input type="text" placeholder="Buscar..." class="form-control" style=" width: 100%; border-width: 0px;padding: 0.25rem  "/>');
        }
    });
    var table = $('#empresas').DataTable({
        pagingType: "full_numbers",
        retrieve: true,
        order: [0, 'asc'],
        responsive: true
    });
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}