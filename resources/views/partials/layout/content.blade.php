<div class="content col-lg-8">
    <div class="posts posts--cards post-grid row">
        <div class="post-grid__item col-sm-4">
            @include('partials.layout.your_champion')
        </div>
        <div class="post-grid__item col-sm-8">
            @include('partials.layout.other_champions')
        </div>
    </div>
    <div class="posts posts--cards post-grid row" id="tustincazos-div">
        @include('partials.layout.tincazos')
    </div>
</div>
<div id="sidebar" class="sidebar col-lg-4">
    @include('partials.layout.table_general')
    @include('partials.layout.table_day')
</div>