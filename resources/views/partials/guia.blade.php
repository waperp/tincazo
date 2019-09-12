@extends('layout.welcome_test')
@section('header')
{{-- @include('partials.layout.header') --}}
@endsection
{{-- @section('slider')
@include('partials.layout.slider')
@endsection --}}
@section('content')
        <div class="site-content">
            <div class="container">
                <div class="row">
                        <div class="content col-md-8 offset-md-2">
                                <!-- Article -->
                                <article class="card card--lg post post--single">
                                    <div class="card__content">
                                        <div class="post__content">
                                            <h3 style="text-align: center"> <u> COMO FUNCIONA </u> <span>TINCAZO.COM</span> </h3>
                                            <p>Con 5 sencillos pasos puedes jugar y colocar tu TINCAZO</p>
                                            <h5>1ER PASO – CREASE CUENTA</h5>
                                            <p>Utiliza la opción ‘Crear Cuenta’ en la parte superior de la web, llena tus datos y Listo.
                                            </p>
                                            <h5>2DO PASO – TUS GRUPOS</h5>
                                            <p>
                                                Para colocar tus TINCAZOS debes ser parte de un grupo:
                                                <ul>
                                                    <li>CREAR GRUPO, Puedes crear un grupo del Torneo que esté vigente e invitar a tus amigos. Puedes hacerlo dentro de la opción ‘Mi Cuenta’.</li>
                                                    <li>INVITACION, Puedes recibir una invitación para jugar en diferentes grupos. Puedes Aceptar o Rechazar en ‘Invitaciones’ en la parte superior de la web</li>
                                                </ul>
                                            </p>
                                            <h5>3ER PASO – INGRESA A TU GRUPO</h5>
                                            <p> Elige el Torneo, luego el Grupo para comenzar a poner tu campeón y tus Tincazos.</p>
                                            <h5>3ER PASO – Elige tu Grupo</h5>
                                            <p> Una vez seas parte de 1 o más grupos, debes seleccionar el grupo para empezar a colocar TU CAMPEON y TUS TINCAZOS.</p>
                                            <h5>4TO PASO – ELIGE TU CAMPEÓN</h5>
                                            <p> Elije tu campeón antes de comenzar el 1er partido del torneo y podrás obtener puntos extras si aciertas (Si el grupo está configurado con Puntos x Campeón).</p>
        
                                            <h5>5TO PASO - COLOCA TU TINCAZO</h5>
                                            <p> Coloca tus TINCAZOS de cada uno de los partidos. MUY IMPORTANTE, coloca tu pronóstico antes del comienzo del partido, posterior a eso, no podrás hacerlo.</p>
                                            <h5 style="color: green">REGLAS</h5>
        
                                            <span>- Existen 3 tipos de <strong>TINCAZOS</strong></span>
                                            <ul>
                                                <li> <strong>TA</strong> (Tincazo ALTO), Acertar Resultado y marcador
                                                    <li> <strong>TM</strong> (Tincazo MEDIO), Acertar Solo Resultado
                                                        <li> <strong>TB</strong> (Tincazo BAJO), al menos uno de los marcadores de los 2 equipos
                                            </ul>
                                            <p>- Los <strong>Puntos X Campeón</strong> otorga puntos extras si tu selección resulta campeona. Estos serán definidos por el Encargado del Grupo</p>
                                            <p>- El <strong> Valor X Partido</strong> multiplica los puntos de los Tincazos Mayor, Medio y Bajo, los determina el Encargado del Grupo.</p>
                                            <p>- No te olvides revisar que en las <strong> TABLA GENERAL y TABLA X DIA</strong> , están los puntos que vas acumulando en todo el campeonato y por día respectivamente.</p>
        
                                            <h5 style="color: red">ACLARACIONES</h5>
                                            <p>La siguiente información te ayudara a entender algunos aspectos de TINCAZO.COM</p>
                                            <ul style="list-style-type:circle;">
                                                <li>En la TABLA GENERAL las columnas TA, TM, TB son valores referenciales para indicar cuantos tipos de tincazos se obtuvo.</li>
                                                <li>Solo se podrá colocar 1 VEZ el ‘Valor x Partido’ desde la ronda de OCTAVOS y se actualizara este valor para el PARTIDO FINAL de cada torneo.</li>
                                                <li>El partido finaliza en los 90 minutos reglamentarios y si hubiese tiempo extra también será contabilizado como parte del partido.</li>
                                                <li>Los penales NO SE CONTABILIZAN como parte del resultado final, porque solo determinan quien clasifica a la siguiente ronda.</li>
                                            </ul>
                                            <p>A DISFRUTAR DEL JUEGO !!!</p>
        
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
@endsection