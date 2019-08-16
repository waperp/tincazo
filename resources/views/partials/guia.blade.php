
<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>TINCAZO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sports Club, League and News HTML Template">
	<meta name="author" content="Dan Fisher">
	<meta name="keywords" content="sports club news HTML template">
	<meta content="{{ csrf_token() }}" name="_token" />
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="/favicon.ico">
	{{-- <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png"> --}}
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">
	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/all.min.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/v4-shims.min.css" rel="stylesheet">
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="/css/select2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/select2-bootstrap4.min.css">


	<link href="assets/css/style-soccer.css" rel="stylesheet">

	<!-- Custom CSS-->
	<link href="assets/css/custom.css?css={{ time() }}" rel="stylesheet">
	
	
</head>

<body data-template="template-soccer">
	<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}" />
	<input type="hidden" id="fecha-actual-server" value="{{ Carbon\Carbon::now()->toDateString() }}" />
	<div class="site-wrapper clearfix">
		<div class="site-overlay"></div>
		<!-- Header
		================================================== -->
		<!-- Header Mobile -->
		<div class="header-mobile clearfix" id="header-mobile">
			<div class="header-mobile__logo">
				<a href="_soccer_index.html"><img src="assets/images/soccer/logo.png"
						srcset="assets/images/soccer/logo@2x.png 2x" alt="Alchemists"
						class="header-mobile__logo-img"></a>
			</div>
			<div class="header-mobile__inner">
				<a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
				<span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
			</div>
		</div>
		<!-- Header Desktop -->
		
		<!-- Header / End -->
		<!-- Pushy Panel - Dark -->
		
		<!-- Pushy Panel - Dark / End -->

		<!-- Hero Slider
		================================================== -->
		
		<!-- Content
        ================================================== -->
        <div class="site-content">
            <div class="container">
                <div class="row">
                        <div class="content col-md-8 offset-md-2">
                                <!-- Article -->
                                <article class="card card--lg post post--single">
                                    <div class="card__content">
                                        <div class="post__content">
                                            <h3 style="text-align: center"> <u> COMO FUNCIONA </u> <span>TINCAZO.COM</span> </h3>
                                            <p>Con 5 sencillos pasos puedes jugar y colocar tu TINCAZO</p>
                                            <h5>1ER PASO – CREASE CUENTA</h5>
                                            <p>Utiliza la opción ‘Crear Cuenta’ en la parte superior de la web, llena tus datos y Listo.
                                            </p>
                                            <h5>2DO PASO – TUS GRUPOS</h5>
                                            <p>
                                                Para colocar tus TINCAZOS debes ser parte de un grupo:
                                                <ul>
                                                    <li>CREAR GRUPO, Puedes crear un grupo del Torneo que esté vigente e invitar a tus amigos. Puedes hacerlo dentro de la opción ‘Mi Cuenta’.</li>
                                                    <li>INVITACION, Puedes recibir una invitación para jugar en diferentes grupos. Puedes Aceptar o Rechazar en ‘Invitaciones’ en la parte superior de la web</li>
                                                </ul>
                                            </p>
                                            <h5>3ER PASO – INGRESA A TU GRUPO</h5>
                                            <p> Elige el Torneo, luego el Grupo para comenzar a poner tu campeón y tus Tincazos.</p>
                                            <h5>3ER PASO – Elige tu Grupo</h5>
                                            <p> Una vez seas parte de 1 o más grupos, debes seleccionar el grupo para empezar a colocar TU CAMPEON y TUS TINCAZOS.</p>
                                            <h5>4TO PASO – ELIGE TU CAMPEÓN</h5>
                                            <p> Elije tu campeón antes de comenzar el 1er partido del torneo y podrás obtener puntos extras si aciertas (Si el grupo está configurado con Puntos x Campeón).</p>
        
                                            <h5>5TO PASO - COLOCA TU TINCAZO</h5>
                                            <p> Coloca tus TINCAZOS de cada uno de los partidos. MUY IMPORTANTE, coloca tu pronóstico antes del comienzo del partido, posterior a eso, no podrás hacerlo.</p>
                                            <h5 style="color: green">REGLAS</h5>
        
                                            <span>- Existen 3 tipos de <strong>TINCAZOS</strong></span>
                                            <ul>
                                                <li> <strong>TA</strong> (Tincazo ALTO), Acertar Resultado y marcador
                                                    <li> <strong>TM</strong> (Tincazo MEDIO), Acertar Solo Resultado
                                                        <li> <strong>TB</strong> (Tincazo BAJO), al menos uno de los marcadores de los 2 equipos
                                            </ul>
                                            <p>- Los <strong>Puntos X Campeón</strong> otorga puntos extras si tu selección resulta campeona. Estos serán definidos por el Encargado del Grupo</p>
                                            <p>- El <strong> Valor X Partido</strong> multiplica los puntos de los Tincazos Mayor, Medio y Bajo, los determina el Encargado del Grupo.</p>
                                            <p>- No te olvides revisar que en las <strong> TABLA GENERAL y TABLA X DIA</strong> , están los puntos que vas acumulando en todo el campeonato y por día respectivamente.</p>
        
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
        </div>
		<!-- Content / End -->
		<!-- Footer
		================================================== -->
		
		<!-- Footer / End -->
		<!-- Login/Register Tabs Modal -->

		<!-- Login/Register Tabs Modal / End -->
	</div>
	{{-- @include('partials.partialModal') --}}
	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/jquery/jquery-migrate.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/core.js"></script>
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="/js/jquery.uploadPreview.js">
	</script>
	<script src="/js/transition.js" type="text/javascript">
	</script>
	<script src="/js/collapse.js" type="text/javascript">
	</script>
	<script src="/js/moment.js" type="text/javascript">
	</script>
	<script src="/js/moment-with-locales.js" type="text/javascript">
	</script>
	
<script type="text/javascript">
    
</script>
	
	<script src="/assets/vendor/jpreloader2/js/jpreloader.js" type="text/javascript">
	</script>
	<script src="/js/sum.js" type="text/javascript"></script>
	<script src="/js/matches.js?v={{ time() }}" type="text/javascript">
	</script>
	
	<script src="/js/jquery.Wload.js"></script>
	<script src="/js/loading-bar.js"></script>
	
	<script src="/js/progressbar.min.js"></script>
</body>

</html>