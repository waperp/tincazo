<!DOCTYPE html>
<html lang="es" >
    <head>
        <title>TINCAZO</title>
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
                                            2018   |   Todos los derechos reservados     | &nbsp;
                                            <a target="_blank" href="/PoliticaPrivacidad">
                                              Politicas de Privacidad
                                          </a>
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


<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
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