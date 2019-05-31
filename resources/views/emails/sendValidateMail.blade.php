





@component('mail::message')
# CAMBIAR TU CONTRASEÑA <br>
{{ $data->secusrtmail }}

Has click en el enlace para proceder a cambiar tu contraseña.

{{-- @component('button', 
['url' => ])

@endcomponent --}}

<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <a href="http://tincazo.com/reset/password?utm_ref={{ $data->secusrtmail }}&utm_source={{encrypt( $data->secusricode )}}&utm_value={{encrypt( $data->secpininump )}}" class="button button-primary" target="_blank">Has click Aqui</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


Gracias,<br>
{{ config('app.name') }}
@endcomponent