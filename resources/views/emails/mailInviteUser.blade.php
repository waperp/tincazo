@component('mail::message')
# TINCAZO.COM

<br>
Haz sido invitado por parte de <span  style="color:blue">{{ $user_inviter->plainftname }}</span> ({{ $user_inviter->secusrtmail }}) , a jugar en el grupo <span  style="color:blue">{{ $group->tougrptname }}</span>.
<br>
    @component('mail::button', 
    ['url' => config('app.url').'/user/invitation/'.$group->secconnuuid.'/'.$user_invited])
    UNIRSE AL GRUPO
    @endcomponent


GRACIAS<br>
 {{ config('app.name') }}
@endcomponent
