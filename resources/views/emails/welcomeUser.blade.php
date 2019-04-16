@component('mail::message')
# Bienvenido a TINCAZO.COM

Estimad@ {{ $data->plainftnick }}: <br>

Te damos la Bienvenida a TINCAZO.COM, la web de Pronosticos Deportivos a tus servicios.<br>

Puedes ver las instrucciones de la web en <br>

@component('mail::button', 
['url' => 'http://tincazo.com/#instrucciones'])
Has click Aqui
@endcomponent

Comienza a disfrutar de nuestro sitio y suerte con tus TINCAZOS.<br>



Atte<br>
INFO - {{ config('app.name') }}
@endcomponent
