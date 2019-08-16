function other_champions() {
    $('#other_champions').empty();
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
            $.each(data, function(i, item) {
                var album__item = '';
                var style = '';
                var image ='';
                var text ='';
                var album__item__holder = '';
                debugger
                if (item.touttebenbl == 0 && item.touttebisch == 0) {
                             style = "style='filter: grayscale(100%); text-decoration:line-through;font-weight:bold; color:black;'";
                             text = '<span style="font-size:11px;color:#f34141" class="album__item-btn-fab "><strong>ELIMINADO</strong></span>';
                             album__item__holder = 'box-shadow: 0px 10px 20px -10px #ff0000, 5px 5px 15px 5px rgba(255,0,0,0)';
                        } else if (item.touttebenbl == 0 && item.touttebisch == 1) {
                             style = "style=' background-image: url(/images/champions.png);background-repeat: no-repeat;background-size: cover;'";
                             imagen = 'images/champions.png';
                             text = '<span style="font-size:11px;color:yellow" class="album__item-btn-fab "><strong>CAMPEON</strong></span>';
                             album__item__holder = 'box-shadow: 5px 5px 40px 15px #00ff2a, 5px 40px 47px 5px rgba(255,0,0,0)';

                        } else if (item.touttebenbl == 1 && item.touttebisch == 0) {
                             style = "style='cursor: '";
                             album__item__holder = '';
                             text = '<span style="font-size:11px; color:#47ef47" class="album__item-btn-fab "><strong></strong></span>';
                             imagen = 'images/champions.png';
        
                        }
                album__item += '<div id="touttescode-'+ item.touttescode +'"  data-touttebenbl="' + data[i].touttebenbl + '" data-touteavimgt=" '+ data[i].touteavimgt +' " data-toutetname=" '+ data[i].touteatname +' " onclick="listaJugadoresCampeon('+ data[i].touttescode +')" style="cursor: help" class="album__item col-6 col-sm-3	col-md-4 col-lg-4 col-xl-4">';
                    album__item += '<div style="'+album__item__holder+'" class="album__item-holder">';
                        album__item += '<a  class="album__item-link mp_gallery">';
                            album__item += '<figure style="border-radius:10px;" class="album__thumb">';
                                album__item += '<img ' + style + ' src="images/' +item.touteavimgt +'" alt="">';
                            album__item += '</figure >';
                            album__item += '<div class="album__item-desc">';
                                album__item += '<h4 class="album__item-title">'+item.touteatname+'</h4>';
                                album__item += text;
                            album__item += '</div>';
                        album__item += '</a>';
                        album__item += '<ul class="album__item-meta meta">';
                            album__item += '<li class="meta__item meta__item--likes"><a ><i class="meta-like meta-like--active icon-user-following"></i><strong>'+item.cantidad+'</strong></a></li>';
                        album__item += '</ul>';
                    album__item += '</div>';
                album__item += '</div>';
                $('#other_champions').append(album__item);


            });
           
        }
    });
}
$(document).ready(function() {
    other_champions()
});