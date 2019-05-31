





@component('mail::message')
# CAMBIAR TU CONTRASEÑA <br>
{{ $data->secusrtmail }}
@endcomponent

Has click en el enlace para proceder a cambiar tu contraseña.

@component('mail::button', 
['url' => 'http://tincazo.com/reset/password?utm_ref='.$data->secusrtmail."&utm_source=".encrypt($data->secusricode)."&utm_value=".encrypt($data->secpininump)])
Has click Aqui
@endcomponent


Gracias,<br>
{{ config('app.name') }}
