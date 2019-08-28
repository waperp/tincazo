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
                                    @include('partials.layout.terminoscondiciones')
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