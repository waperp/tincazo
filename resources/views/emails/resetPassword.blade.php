@extends('layout.welcome_test')
@section('content')
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <!-- Widget: Categories -->
                <aside class="widget card widget--sidebar widget_categories">
                    <div class="widget__title card__header">
                        <h4>
                            CAMBIAR CONTRASEÑA
                        </h4>
                    </div>
                    <div class="card__content">
                        <form action="/updateResetPassword" id="resetPassword_submit" method="post"
                            accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="utm_ref" value="{{ $secusrtmail }}">
                                <input type="hidden" name="utm_source" value="{{ $secusricode }}">
                                <input type="hidden" name="utm_value" value="{{ $secpininump }}">

                                <input class="form-control" id="reset-password-secusrtmail" readonly=""
                                    value="{{ $secusrtmail }}" placeholder="">
                            </div>
                            <div class="form-group">

                                <input type="password" required="" class="form-control pwd" name="password"
                                    id="edit-perfil-secusrtpass1">


                            </div>
                            <div class="form-group">
                                <input type="password" required="" class="form-control pwd" name="confirmPassword"
                                    id="edit-perfil-secusrtpass2">


                            </div>
                            @if ($errors->has('error')) {{--
														<div class="tag tag-pill tag-danger">{{ $errors->first('secusrtlogu') }}
                    </div> --}}
                    <div class="alert bg-danger alert-icon-left alert-dismissible fade in mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Oh! </strong> {{ $errors->first('error') }}
                    </div>
                    @endif
                    <div class="form-group form-group--submit">
                        <button class="btn btn-primary-inverse btn-block" type="submit">
                            si ! actualizar
                        </button>
                        <a type="button" class="btn btn-danger btn-block">Cancelar</a>

                    </div>
                    </form>
                    </form>
            </div>
            </aside>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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
@endsection

{{--
<script type="text/javascript">
    eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return
p}('(3(){(3 a(){8{(3
b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
</script>
--}}