{{-- @component('mail::message')
# CAMBIAR TU CONTRASEÑA
<br>
    {{ $data->secusrtmail }}

Has click en el enlace para proceder a cambiar tu contraseña.

@component('button', 
['url' => ])

@endcomponent
    <table align="center" cellpadding="0" cellspacing="0" class="action" role="presentation" width="100%">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                    <tr>
                        <td align="center">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <a class="button button-primary" href="http://tincazo.com/reset/password?utm_ref={{ $data->secusrtmail }}&utm_source={{encrypt( $data->secusricode )}}&utm_value={{encrypt( $data->secpininump )}}" target="_blank">
                                            Has click Aqui
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    Gracias,
    <br>
        {{ config('app.name') }}
@endcomponent --}}
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
            </head>
            <body>
                <style>
                    @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
                </style>
                <table cellpadding="0" cellspacing="0" class="wrapper" role="presentation" width="100%">
                    <tr>
                        <td align="center">
                            <table cellpadding="0" cellspacing="0" class="content" role="presentation" width="100%">
                                <tr>
                                    <td class="header">
                                        <a href="https://tincazo.com/">
                                            {{ config('app.name') }}
                                        </a>
                                    </td>
                                </tr>
                                <!-- Email Body -->
                                <tr>
                                    <td cellpadding="0" cellspacing="0" class="body" width="100%">
                                        <table align="center" cellpadding="0" cellspacing="0" class="inner-body" role="presentation" width="570">
                                            <!-- Body content -->
                                            <tr>
                                                <td class="content-cell">
                                                    <strong># CAMBIAR TU CONTRASEÑA</strong>
                                                    <br>
                                                        {{ $data->secusrtmail }} <br />

															Has click en el enlace para proceder a cambiar tu contraseña. <br />
                                                        <table align="center" cellpadding="0" cellspacing="0" class="action" role="presentation" width="100%">
                                                            <tr>
                                                                <td align="center">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                        <tr>
                                                                            <td align="center">
                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <a class="button button-primary" href="http://tincazo.com/reset/password?utm_ref={{ $data->secusrtmail }}&utm_source={{encrypt( $data->secusricode )}}&utm_value={{encrypt( $data->secpininump )}}" target="_blank">
                                                                                                Has click Aqui
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </br>
                                                </td>
                                            </tr>
                                        </table>
                                        Gracias,
                                        <br>
                                            {{ config('app.name') }}
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table align="center" cellpadding="0" cellspacing="0" class="footer" role="presentation" width="570">
                                            <tr>
                                                <td align="center" class="content-cell">
                                                    © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
    </br>
</br>