<!DOCTYPE html>
<html lang="es" >
    <head>
        <title>
            TINCAZO
        </title>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="TINCAZO Todos los derechos reservados" name="description"/>
        <meta content="TINCAZO" name="author"/>
        <meta content="TINCAZO Todos los derechos reservados" name="keywords"/>
        <meta content="{{ csrf_token() }}" name="_token"/>

        <link href="favicon.ico" rel="shortcut icon"/>
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
      <!-- Preloader CSS -->
  <link href="assets/css/preloader.css" rel="stylesheet">
        <link href="/css/googleFont.css" rel="stylesheet"/>

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
  <!-- Vendor CSS -->

      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
      <link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
      <link href="assets/vendor/slick/slick.css" rel="stylesheet">


        <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css?vercss1={{ time() }}"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/select.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/buttons.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/colReorder.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/dataTables.colVis.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/sweetalert.css"/>

        <!-- Custom CSS-->

<!-- Google Tag Manager -->
{{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WLKH8LT');</script> --}}
<!-- End Google Tag Manager -->
  <!-- Template CSS-->
<link href="assets/css/style.css?vercss={{ time() }}" rel="stylesheet"/>

  <!-- Custom CSS-->
        <link href="assets/vendors/css/forms/selects/select2.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/custom.css" rel="stylesheet"/>

    
    </head>
    <body  {{-- oncontextmenu="return false" --}} class="template-soccer">
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" id="fecha-actual-server" value="{{ Carbon\Carbon::now()->toDateString() }}"/>
            <div class="site-wrapper clearfix">
                <div class="site-overlay">
                </div>
                <div class="header-mobile clearfix" id="header-mobile">
                    <div class="header-mobile__logo">
                        <a href="/">
                            <img alt="Alchemists" class="header-mobile__logo-img" style="widows: 150px; height: auto" src="assets/images/soccer/tincaso.png"/>
                        </a>
                    </div>
                    <div class="header-mobile__inner">
                        <a class="burger-menu-icon" id="header-mobile__toggle">
                            <span class="burger-menu-icon__line">
                            </span>
                        </a>
                        <span class="header-mobile__search-icon" id="header-mobile__search-icon">
                        </span>
                    </div>
                </div>
                @yield('header')
                @section('sidebar')
                @show
                @yield('silder')
                @if (Session::has('plainficode'))
                    @if(Session::has('select-q') && Session::get('select-q') == true)
                        <div class="site-content" >
                          <div class="container" >
                              
                                  <div class="row">
                                      @yield('content')
                                  </div>
                              
                              
                          </div>
                      </div>
                    @endif
                @endif
                @if(!Session::has('select-q'))
                               <div class="site-content" >
      <div class="container">

        <div class="row">
          <!-- Content -->
          <div class="content col-md-8 col-md-offset-2">

            <!-- Article -->
            <article class="card card--lg post post--single post--extra-top">
              <div class="card__content" id="instrucciones">

                <div class="post__content">
                  <h3 style="text-align: center" > <u> COMO FUNCIONA </u> <span>TINCAZO.COM</span> </h3>

                  <p >Con 5 sencillos pasos puedes jugar y colocar tu TINCAZO</p>

                  <h5>1ER PASO – Crearse un Usuario</h5>
                  <p>Debes hacer clic en la opción en la parte superior que dice ‘CREAR CUENTA’ y colocar tus datos como correo, nombre, fecha de nacimiento, etc. <br>{{-- 
                  Validaremos tu correo enviándote un PIN el cual debes colocar y luego presionar VALIDAR. --}}
                  Elige la membresía disponible, en este caso MEMBRESIA PLATA, la cual te permite jugar siempre y cuando seas invitado a un grupo.
                  </p>

    

                  <h5>2DO PASO – Invitaciones</h5>
                  <p> Recibirás en tu cuenta una INVITACION de algún grupo la cual podrás ver en la opción INVITACIONES. Presiona ACEPTAR para ingresar a dicho grupo y jugar, o puedes RECHAZAR si no deseas ingresar a dicho grupo.</p>
    

                  <h5>3ER PASO – Elige tu Grupo</h5>
                <p> Una vez seas parte de 1 o más grupos, debes seleccionar el grupo para empezar a colocar TU CAMPEON y TUS TINCAZOS.</p>

                  <h5>4TO PASO – Elige Tu Campeón</h5>
                <p> Si el torneo no ha comenzado aún, puedes elegir el equipo o selección que creas saldrá campeón del torneo que estás jugando. Hazlo antes de que el torneo empiece por que luego no podrás hacerlo.</p>

                  <h5>5TO PASO - Coloca tu TINCAZO</h5>
                <p> Por ultimo debes colocar tus TINCAZOS a medida que avancen los partidos. Es MUY IMPORTANTE que sepas que una vez el partido está EN JUEGO, no podrás colocarlo. Toma tus previsiones. </p>
                <span> Existen 3 tipos de <strong>TINCAZOS</strong></span>
                <ul> 
              <li> <strong>TA</strong> (Tincazo ALTO), Acertar Resultado y marcador
              <li> <strong>TM</strong> (Tincazo MEDIO), Acertar Solo Resultado
              <li> <strong>TB</strong> (Tincazo BAJO), al menos uno de los marcadores de los 2 equipos
              </ul>
              <p>El valor de los puntos para los tincazos alto, medio y bajo los determina el CREADOR del Grupo.</p>
              <p>No te olvides revisar que en las <strong>TABLA GENERAL y TABLA X DIA</strong>, están los puntos que vas acumulando en todo el campeonato y por día respectivament.</p>
              <h5 style="color: red">ACLARACIONES</h5>
              <p>La siguiente información te ayudara a entender algunos aspectos de TINCAZO.COM</p>
              <ul style="list-style-type:circle;">
                <li>En la TABLA GENERAL las columnas TA, TM, TB son valores referenciales para indicar cuantos tipos de tincazos se obtuvo.</li>
                <li>Solo se podrá colocar 1 VEZ el ‘Valor x Partido’ desde la ronda de OCTAVOS y se actualizara este valor para el PARTIDO FINAL de cada torneo.</li>
                <li>El partido finaliza en los 90 minutos reglamentarios y si hubiese tiempo extra también será contabilizado como parte del partido.</li>
                <li>Los penales NO SE CONTABILIZAN como parte del resultado final, porque solo determinan quien clasifica a la siguiente ronda.</li>
              </ul>
              <p>A DISFRUTAR DEL JUEGO !!!</p>

               

                
              </div>
            </article>
            <!-- Article / End -->



          </div>
          <!-- Content / End -->

        </div>

      </div>
    </div>
                @endif
                <footer class="footer" id="footer" >
                    <div class="footer-widgets">
                      
                        <!-- Sponsors / End -->
                    </div>
                    <!-- Footer Widgets / End -->
                    <!-- Footer Secondary -->
                    <div class="footer-secondary">
                        <div class="container">
                            <div class="footer-secondary__inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="footer-copyright">
                                            <a href="javascript:void(0)">
                                                Tincazo 
                                            </a>
                                            2018   |   Todos los derechos reservados
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Secondary / End -->
                </footer>
                <!-- Footer / End -->
                
            </div>
        
    </body>
</html>
<!-- Login/Register Tabs Modal -->
 @include('partials.partialModal')
<!-- Javascript Files
  ================================================== -->
<!-- Core JS -->
<script src="/assets/vendor/jquery/jquery.min.js">
</script>

<script src="/assets/js/core-min.js">
</script>
<script src="/js/moment.js" type="text/javascript">
</script>
<!-- Vendor JS -->
<script src="/assets/vendor/twitter/jquery.twitter.js">
</script>
<!-- Template JS -->
<script src="/assets/js/init.js">
</script>
<script src="/assets/js/custom.js">
</script>
<script src="/js/jquery.uploadPreview.min.js">
</script>
<script src="/js/transition.js" type="text/javascript">
</script>
<script src="/js/collapse.js" type="text/javascript">
</script>
<script src="/js/moment-with-locales.min.js" type="text/javascript">

</script>
    <script src="/assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="/assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>

<script src="/assets/vendors/js/tables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.select.min.js" type="text/javascript"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.colVis.js" type="text/javascript"></script>

    <script src="/assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js" type="text/javascript"></script>
    <script src="/assets/vendors/js/tables/datatable/dataTables.colReorder.min.js" type="text/javascript"></script>

    <script src="/assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script type="text/javascript" src="css/bootstrapValidator.js"></script>
{{-- <script src="js/i18n.js"></script> --}}
<script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript">
</script>
<script src="/assets/vendors/js/forms/select/select2.js" type="text/javascript">
</script>
<script src="/js/index.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/assets/vendor/jpreloader2/js/jpreloader.js" type="text/javascript">
</script>
  <script src="/js/sum.js" type="text/javascript"></script>
{{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
  
</script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-2887128461418585",
enable_page_level_ads: true
});
</script> --}}
{{--     <script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
</script> --}}


<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121576880-1"></script> --}}
{{-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121576880-1');
</script> --}}

<!-- Google Tag Manager (noscript) -->
{{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLKH8LT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
<!-- End Google Tag Manager (noscript) -