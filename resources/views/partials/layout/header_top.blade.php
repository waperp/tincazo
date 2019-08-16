<div class="header__top-bar-inner">
        <!-- Account Navigation -->
        <ul class="nav-account">
            @if(Session::has('plainficode'))
            @if(\Auth::user()->contypscode == 1)
            <li class="nav-account__item">
                <span class="main-nav__toggle"></span>
                <a>Administrar <span class="highlight"></span></a>
                <ul class="main-nav__sub">
                    <li><a data-toggle="modal" data-target="#modal-admin-gestionar-grupo">Gestionar
                            Grupos</a></li>
                    <li><a data-toggle="modal" data-target="#modal-nuevo-torneo">Gestionar Torneos</a>
                    </li>
                    <li><a data-toggle="modal" data-target="#modal-nuevo-equipo">Gestionar Plantel</a>
                    </li>
                    <li><a data-toggle="modal" data-target="#modal-nuevo-torneo-equipo">Torneo &
                            Plantel</a></li>
                    <li><a data-toggle="modal" data-target="#modal-gestionar-fixture">Gestionar
                            Fixture</a></li>
                </ul>
            </li>
            @else
            @endif
            <li class="nav-account__item"><span class="main-nav__toggle"></span><a>Mi Cuenta <span
                        class="highlight"></span></a>
                <ul class="main-nav__sub">
                    @if (Session::get('conmemscode') != 1)
                    <li><a data-toggle="modal" data-target="#modal-login-nuevo-grupo">Crear Grupo </a>
                    </li>
                    @endif
                    <li><a data-toggle="modal" data-target="#modal-edit-perfil">Editar Perfil</a></li>
                    <li><a href="/logout">Cerrar Sesion</a></li>
                </ul>
            </li>
            @if (COUNT($listaInvitaciones) > 0)
            <li class="nav-account__item">
                <a DATA-toggle="modal" DATA-target="#modal-invitaciones"><span
                        style="color:orange">INVITACIONES</span> <span> (
                        {{ COUNT($listaInvitaciones) }} )</span></a>
            </li>
            @else
            <li class="nav-account__item">
                <a><span style="color:orange">INVITACIONES</span> <span style="color:#c2ff1f">(
                        {{ COUNT($listaInvitaciones) }} )</span> </a>
            </li>
            @endif
            <li class="nav-account__item">
                <a data-toggle="modal" data-target="#modal-edit-perfil"><img
                        src="images/{{ Session::get('conmemvimgm') }}" style="height:25px; width: 25px"
                        alt=""> &nbsp; {{ Session::get('plainftnick') }} </a>
            </li>
            @else
            <li class="nav-account__item">
                <a data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a>
                {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a></li> --}}
            </li>
            <li class="nav-account__item">

                {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a></li> --}}
                <a data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a>
            </li>
            @endif
        </ul>
        <!-- Account Navigation / End -->
    </div>