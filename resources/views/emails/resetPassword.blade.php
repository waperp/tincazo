<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            TINCAZO
        </title>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="Alchemists - Sports News HTML Template" name="description"/>
        <meta content="Dan Fisher" name="author"/>
        <meta content="Sports News HTML Template" name="keywords"/>
        <link href="favicon.ico" rel="shortcut icon"/>
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
        <!-- Preloader CSS -->
        <link href="/assets/css/preloader.css" rel="stylesheet">
            <link href="/css/googleFont.css" rel="stylesheet"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"/>
            <!-- Vendor CSS -->
            <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                    <link href="/assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
                        <link href="/assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
                            <link href="/assets/vendor/slick/slick.css" rel="stylesheet">
                                <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>
                                <link href="/assets/vendors/css/extensions/sweetalert.css" rel="stylesheet" type="text/css"/>
                                <!-- Custom CSS-->
                                <!-- Template CSS-->
                                <link href="/assets/css/style.css" rel="stylesheet"/>
                                <!-- Custom CSS-->
                                <link href="/assets/vendors/css/forms/selects/select2.css" rel="stylesheet" type="text/css"/>
                                <link href="/assets/css/custom.css" rel="stylesheet"/>
                            </link>
                        </link>
                    </link>
                </link>
            </link>
        </link>
    </head>
    <body class="template-soccer">
        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="site-wrapper clearfix">
            <div class="site-overlay">
            </div>
            <div class="header-mobile clearfix" id="header-mobile">
                <div class="header-mobile__logo">
                    <a href="/">
                        <img alt="Alchemists" class="header-mobile__logo-img" src="/assets/images/soccer/tincaso.png" style="widows: 150px; height: auto"/>
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
            <div class="site-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
                            <!-- Widget: Categories -->
                            <aside class="widget card widget--sidebar widget_categories">
                                <div class="widget__title card__header">
                                    <h4>
                                        CAMBIAR CONTRASEÑA
                                    </h4>
                                </div>
                                <div class="card__content">
                                    <form action="/updateResetPassword"  id="resetPassword_submit" method="post" accept-charset="utf-8">
                                    	{{ csrf_field() }}
                                    	  <div class="form-group">
                                    	  			<input type="hidden" name="utm_ref"  value="{{ $secusrtmail }}" >
                                    	  			<input type="hidden" name="utm_source"  value="{{ $secusricode }}" >
                                    	  			<input type="hidden" name="utm_value"  value="{{ $secpininump }}" >

                                                        <input class="form-control" id="reset-password-secusrtmail" readonly="" 
                                                        value="{{ $secusrtmail }}" placeholder="">
                                                        </input>
                                                    </div>
                                                      <div class="form-group">
                                                    
                                                      <input type="password" required="" class="form-control pwd" name="password" id="edit-perfil-secusrtpass1" >
                                                            

                                                     </div>
                                                     <div class="form-group">
                                                      <input type="password"  required=""  class="form-control pwd"  name="confirmPassword" id="edit-perfil-secusrtpass2" >
                                                              	

                                                     </div>
                                                     @if ($errors->has('error')) {{--
														<div class="tag tag-pill tag-danger">{{ $errors->first('secusrtlogu') }}</div> --}}
														<div class="alert bg-danger alert-icon-left alert-dismissible fade in mb-2" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<strong>Oh! </strong> {{ $errors->first('error') }}
														</div>
														@endif
                                                      <div class="form-group form-group--submit">
                                                        <button class="btn btn-primary-inverse btn-block"  type="submit">
                                                            si ! actualizar
                                                        </button>
        <a type="button" class="btn btn-danger btn-block" >Cancelar</a>	

                                                    </div>
                                                     </form>
                                    </form>
                                </div>
                            </aside>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- Login/Register Tabs Modal -->
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
<script src="/assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript">
</script>
<script src="/assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript">
</script>

<script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript">
</script>
<script src="/assets/vendors/js/forms/select/select2.js" type="text/javascript">
</script>
<script src="/assets/vendor/jpreloader2/js/jpreloader.js" type="text/javascript">
</script>
<script type="text/javascript" src="../../css/bootstrapValidator.js"></script>

<script>
	$(document).ready(function() {
	$('#resetPassword_submit').bootstrapValidator({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'La contraseña y su confirmación no son lo mismo'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'La contraseña y su confirmación no son lo mismo'
                    }
                }
            }
        }
    }).on('success.field.fv', function(e, data) {
            debugger
           if (data.fv.getInvalidFields().length > 0) {    // There is invalid field
                data.fv.disableSubmitButtons(true);
            }
         });
    });
</script>
{{--
<script type="text/javascript">
    eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
</script>
--}}
