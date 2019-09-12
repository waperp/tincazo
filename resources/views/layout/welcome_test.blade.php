<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Tincazo - Juego de Pronósticos Deportivos</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description"
		content="Tincazo es un sitio donde podrás crear tu campeonato de pronósticos, registrar tus tincazos y hacer más entretenido un torneo o partido del deporte que te apasiona. Comparte con amigos, tu frater o familia. Jugar Tincazo es gratis, la diversion no tiene precio.">
	<meta name="author" content="DOZURE SRL">
	<meta name="keywords"
		content="Juego de Pronósticos, Pronósticos deportivos en Bolivia, Campeonato de Pronósticos, Pronósticos de Futbol, Liga Boliviana, Copa Mundial, Copa América, Copa Libertadores, Copa Confederaciones, Copa Sudamericana, Champions League, Liga de Campeones, Campeonato de aciertos en Bolivia, Tincazo, Te Tinca, Tincazo.com, Tu tinca, Tincaso">
	<meta content="{{ csrf_token() }}" name="_token" />

	<meta name="robots" content="INDEX,FOLLOW,NOARCHIVE">
	<meta http-equiv="cache-control" content="no-cache" />

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
	<link href="/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/fonts/font-awesome/css/all.min.css" rel="stylesheet">
	<link href="/assets/fonts/font-awesome/css/v4-shims.min.css" rel="stylesheet">
	<link href="/assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="/assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="/assets/vendor/slick/slick.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="/css/select2-bootstrap4.min.css" rel="stylesheet">
	<link href="/assets/css/style-soccer.css" rel="stylesheet">
	<link href="/css/select2.min.css" rel="stylesheet">
	<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/sweetalert.css" rel="stylesheet" type="text/css" />
	<link href="/css/jquery.Wload.css" rel="stylesheet">
	<link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/googleFont.css" rel="stylesheet" />
	<!-- Custom CSS-->
	@section('css')

	@show
	<link href="/assets/css/custom.css?css={{ time() }}" rel="stylesheet">

</head>

<body data-template="template-soccer">
	<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}" />
	<div class="site-wrapper clearfix">
		<div class="site-overlay"></div>
		<!-- Header
		================================================== -->
		<!-- Header Mobile -->
		<div class="header-mobile clearfix" id="header-mobile">
			<div class="header-mobile__logo">
				<a href="_soccer_index.html"><img src="/assets/images/soccer/logo.png"
						srcset="/assets/images/soccer/logo@2x.png 2x" alt="Alchemists"
						class="header-mobile__logo-img"></a>
			</div>
			<div class="header-mobile__inner">
				<a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
				<span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
			</div>
		</div>
		<!-- Header Desktop -->
		<header class="header header--layout-1">
			<!-- Header Top Bar -->
			@section('header')
			@show
			<!-- Header Primary / End -->
		</header>
		<!-- Header / End -->
		<!-- Pushy Panel - Dark -->

		<!-- Pushy Panel - Dark / End -->

		<!-- Hero Slider
		================================================== -->
		<div class="hero-slider-wrapper">
			@section('slider')
			@show

		</div>
		<!-- Content
		================================================== -->
		@yield('content')
		<!-- Content / End -->
		<!-- Footer
		================================================== -->
		@section('footer')
		@show

		<!-- Footer / End -->
		<!-- Login/Register Tabs Modal -->
		@section('modals')
		@show

		<!-- Login/Register Tabs Modal / End -->
	</div>
	{{-- @include('partials.partialModal') --}}
	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/assets/vendor/jquery/jquery-migrate.min.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/js/core.js"></script>
	<!-- Vendor JS -->
	{{-- <script src="assets/vendor/twitter/jquery.twitter.js"></script> --}}
	<!-- Template JS -->
	<script src="/assets/js/init.js"></script>
	<script src="/assets/js/custom.js"></script>
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
	<script src="/js/sweetalert.min.js" type="text/javascript"></script>
	<script src="/js/jquery.dataTables.min.js"></script>
	<script src="/js/dataTables.bootstrap4.min.js"></script>
	<script src="/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
	<script src="/js/buttons.colVis.js" type="text/javascript"></script>
	<script src="/css/bootstrapValidator.js" type="text/javascript"></script>
	<script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript">
	</script>
	<script src="/js/select2.min.js" type="text/javascript">
	</script>
	@section('scripts')

	@show
	<script src="/js/jquery.Wload.js?v={{ time() }}"></script>
	<script src="/js/loading-bar.js?v={{ time() }}"></script>

	<script src="/js/progressbar.min.js"></script>
</body>

</html>