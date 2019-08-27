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
	{{-- <link rel="stylesheet" type="text/css" href="/css/select.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/buttons.dataTables.min.css" />
	
	<link rel="stylesheet" type="text/css" href="css/colReorder.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="css/dataTables.colVis.css" />
	<link rel="stylesheet" type="text/css" href="/css/fixedHeader.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/fixedColumns.dataTables.min.css" /> --}}
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css" />
	<link rel="stylesheet" href="/css/jquery.Wload.css">
	<link rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/buttons.bootstrap4.min.css" />
	<link href="/css/preloader.css" rel="stylesheet">
	<link href="/css/googleFont.css" rel="stylesheet" />
	<input type="hidden" value="{{ Session::get('plainficode') }}" id="plainficode-hidden">
	<input type="hidden" value="{{ Session::get('select-tougrptname') }}" id="session-select-tougrptname">
	<input type="hidden" value="{{ Session::get('select-tougrpicode') }}" id="session-select-tougrpicode">
	<input type="hidden" value="{{ Session::get('select-touinfscode') }}" id="session-select-touinfscode">
	<input type="hidden" value="{{ Session::get('select-tougplicode') }}" id="session-select-tougplicode">
	<input type="hidden" value="{{ Session::get('select-plainficode') }}" id="session-select-plainficode">
	<input type="hidden" value="{{ Session::get('select-tougrpschpt') }}" id="session-select-tougrpschpt">
	<input type="hidden" value="{{ Session::get('select-q') }}" id="session-select-q">
	<input type="hidden" id="tougrpicode-hidden-filtrer">
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
		<header class="header header--layout-1">
			<!-- Header Top Bar -->
			@section('header')
			@show
			<!-- Header Primary / End -->
		</header>
		<!-- Header / End -->
		<!-- Pushy Panel - Dark -->
		{{-- <aside class="pushy-panel pushy-panel--dark">
			<div class="pushy-panel__inner">
				<header class="pushy-panel__header">
					<div class="pushy-panel__logo">
						<a href="_soccer_index.html"><img src="assets/images/soccer/logo.png"
								srcset="assets/images/soccer/logo@2x.png 2x" alt="Alchemists"></a>
					</div>
				</header>
				<div class="pushy-panel__content">

					<!-- Widget: Posts -->
					<aside class="widget widget-popular-posts widget--side-panel">
						<div class="widget__content">

							<ul class="posts posts--simple-list">

								<li class="posts__item posts__item--category-1">
									<figure class="posts__thumb">
										<a href="#"><img src="assets/images/samples/post-img19-xs.jpg" alt=""></a>
									</figure>
									<div class="posts__inner">
										<div class="posts__cat">
											<span class="label posts__cat-label">The Team</span>
										</div>
										<h6 class="posts__title"><a href="#">The Team will make a small vacation to the
												Caribbean</a></h6>
										<time datetime="2016-08-23" class="posts__date">June 12th, 2018</time>
									</div>
									<div class="posts__excerpt">
										Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua.
									</div>
								</li>
								<li class="posts__item posts__item--category-2">
									<figure class="posts__thumb">
										<a href="#"><img src="assets/images/samples/post-img18-xs.jpg" alt=""></a>
									</figure>
									<div class="posts__inner">
										<div class="posts__cat">
											<span class="label posts__cat-label">Injuries</span>
										</div>
										<h6 class="posts__title"><a href="#">Jenny Jackson won&#x27;t be able to play
												the next game</a></h6>
										<time datetime="2016-08-23" class="posts__date">May 15th, 2018</time>
									</div>
									<div class="posts__excerpt">
										Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua.
									</div>
								</li>
								<li class="posts__item posts__item--category-1">
									<figure class="posts__thumb">
										<a href="#"><img src="assets/images/samples/post-img8-xs.jpg" alt=""></a>
									</figure>
									<div class="posts__inner">
										<div class="posts__cat">
											<span class="label posts__cat-label">The Team</span>
										</div>
										<h6 class="posts__title"><a href="#">The team is starting a new power breakfast
												regimen</a></h6>
										<time datetime="2016-08-23" class="posts__date">March 16th, 2018</time>
									</div>
									<div class="posts__excerpt">
										Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua.
									</div>
								</li>
								<li class="posts__item posts__item--category-3">
									<figure class="posts__thumb">
										<a href="#"><img src="assets/images/samples/post-img20-xs.jpg" alt=""></a>
									</figure>
									<div class="posts__inner">
										<div class="posts__cat">
											<span class="label posts__cat-label">The League</span>
										</div>
										<h6 class="posts__title"><a href="#">The Alchemists need two win the next two
												games</a></h6>
										<time datetime="2016-08-23" class="posts__date">February 8th, 2018</time>
									</div>
									<div class="posts__excerpt">
										Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua.
									</div>
								</li>

							</ul>

						</div>
					</aside>
					<!-- Widget: Posts / End -->

					<!-- Widget: Tag Cloud -->
					<aside class="widget widget--side-panel widget-tagcloud">
						<div class="widget__title">
							<h4>Popular Tags</h4>
						</div>
						<div class="widget__content">
							<div class="tagcloud">
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
								<a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
							</div>
						</div>
					</aside>
					<!-- Widget: Tag Cloud / End -->

					<!-- Widget: Banner -->
					<aside class="widget widget--side-panel widget-banner">
						<div class="widget__content">
							<figure class="widget-banner__img">
								<a href="#"><img src="assets/images/samples/banner.jpg" alt="Banner"></a>
							</figure>
						</div>
					</aside>
					<!-- Widget: Banner / End -->

				</div>
				<a href="#" class="pushy-panel__back-btn"></a>
			</div>
		</aside> --}}
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
		<footer id="footer" class="footer">
			@include('partials.footer')
		</footer>
		<!-- Footer / End -->
		<!-- Login/Register Tabs Modal -->
		@include('partials.modals.modal-login')
@include('partials.modals.modal-register')
@auth
@if (\Auth::user()->contypscode == 1)
@include('partials.modals.admin.modal-admin-fixture')
@include('partials.modals.admin.modal-admin-equipo-plantel')
@include('partials.modals.admin.modal-admin-add-torneo-equipo')
@include('partials.modals.admin.modal-admin-add-fixture')
@include('partials.modals.admin.modal-admin-add-equipo')
@include('partials.modals.admin.modal-admin-add-torneo')
@include('partials.modals.admin.modal-admin-add-grupo')
@include('partials.modals.admin.modal-admin-plantel')
@include('partials.modals.admin.modal-admin-torneo')
@include('partials.modals.admin.modal-admin-grupo')
@endif
@endauth
@auth
@include('partials.modals.user.modal-user-perfil')
@include('partials.modals.user.modal-user-config-grupo')
@include('partials.modals.user.modal-user-invitar')
@endauth
@include('partials.modals.admin.group.modal-admin-group-grupo')
@include('partials.partialModal')

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
	{{-- <script src="assets/vendor/twitter/jquery.twitter.js"></script> --}}
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
	<script src="/js/sweetalert.min.js" type="text/javascript"></script>
	{{-- <script src="/js/sweet-alerts.js" type="text/javascript"></script> --}}
	<script src="/js/jquery.dataTables.min.js"></script>
	<script src="/js/dataTables.bootstrap4.min.js"></script>
	<script src="/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
	<script src="/js/buttons.colVis.js" type="text/javascript"></script>
	{{--
	<script src="/js/dataTables.responsive.min.js" type="text/javascript"></script>
	<script src="/js/select.bootstrap4.min.js" type="text/javascript"></script>
	
	<script src="/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
	<script src="/js/dataTables.colReorder.min.js" type="text/javascript"></script>
	<script src="/js/dataTables.fixedHeader.min.js" type="text/javascript"></script> --}}
	<script type="text/javascript" src="css/bootstrapValidator.js"></script>
	{{-- <script src="js/i18n.js"></script>  --}}
	<script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript">
	</script>
	<script src="/js/select2.min.js" type="text/javascript">
	</script>

<script type="text/javascript">
    const tougrp = @json(Session::get('tougrp'));
    const touinf = @json(Session::get('touinf'));
    console.log(tougrp);
    console.log(touinf);
</script>
	<script src="/js/index.js?v={{ time() }}" type="text/javascript">
	</script>
	<script src="/assets/vendor/jpreloader2/js/jpreloader.js" type="text/javascript">
	</script>
	<script src="/js/sum.js" type="text/javascript"></script>
	<script src="/js/matches.js" type="text/javascript">
	</script>
	<script src="/js/other_champions.js" type="text/javascript">
	</script>
	<script src="/js/matches_pending.js" type="text/javascript">
	</script>
	<script src="/js/matches_play.js" type="text/javascript">
	</script>
	<script src="/js/matches_finished.js" type="text/javascript">
	</script>
	<script src="/js/datatables_app.js?v={{ time() }}" type="text/javascript">
	</script>
	<script src="/js/jquery.Wload.js"></script>
	<script src="/js/loading-bar.js"></script>
	
	<script src="/js/progressbar.min.js"></script>
</body>

</html>