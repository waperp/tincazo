<div class="posts__item posts__item--card posts__item--category-1 card">
    @if ($miCampeon != null && Session::has('plainficode'))
    <figure class="posts__thumb">
        <div class="posts__cat">
            <span class="label posts__cat-label">TU CAMPEÓN</span>
        </div>
        <a onclick="validarCampeonFechas()"><img id="image-mi-campeon" style="height: 175px" src="images/{{ $miCampeon[0]->touteavimgt }}" alt=""></a>
    </figure>
    <div class="posts__inner card__content">
        <a onclick="validarCampeonFechas()" class="posts__cta"></a>
        <span class="posts__date">{{ $miCampeon[0]->contyptdesc }}</span>
        <h6 id="mi-campeon-name" class="posts__title">{{ $miCampeon[0]->touteatname }}</h6>

    </div>
    @elseif($miCampeon == null && Session::has('plainficode'))
    <figure class="posts__thumb">
        <div class="posts__cat">
            <span id="mi-campeon-name" class="label posts__cat-label">TU CAMPEÓN</span>
        </div>
        <a onclick="validarCampeonFechas()"><img id="image-mi-campeon" style="height: 175px" src="assets/images/soccer/trophy-04.svg" alt=""></a>
    </figure>
    <div class="posts__inner card__content">
        <a onclick="validarCampeonFechas()" class="posts__cta"></a>
        <span class="posts__date"></span>
        <h6 id="mi-campeon-name" class="posts__title">SIN CAMPEÓN</h6>
    </div>
    @else
    @endif
</div>