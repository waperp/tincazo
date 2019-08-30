@if(!Session::has('select-q'))
<div class="hero-slider">
    @foreach ($listaTouinfSlider as $objSlideTouinf)
    <div class="hero-slider__item" style="background-image: url(/images/{{  $objSlideTouinf->touinfvlogt}})">
        <div class="container hero-slider__item-container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Post Meta - Top -->
                    <div class="post__meta-block post__meta-block--top">
                        <!-- Post Category -->
                        <div class="post__category">
                            {{-- <span class="label posts__cat-label">{{ $objSlideTouinf->touinftname }}</span> --}}
                        </div>
                        <!-- Post Category / End -->
                        <!-- Post Title -->
                        <h1 class="page-heading__title"><a href="javascript:void(0)"> <span
                                    class="highlight">{{ $objSlideTouinf->touinftname }}</span> </a></h1>
                        <!-- Post Title / End -->
                        <!-- Post Meta Info -->
                        <ul class="post__meta meta">
                            <li class="meta__item meta__item--date"><time datetime="{{ $objSlideTouinf->touinfdstat }}">
                                    {{ Carbon\Carbon::parse($objSlideTouinf->touinfdstat)->formatLocalized('%d DE %B %Y') }}</time>
                            </li>
                            {{-- <li class="meta__item meta__item--views">2369</li> --}}
                            {{-- <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                    <li class="meta__item meta__item--comments"><a href="#">18</a></li> --}}
                        </ul>
                        <!-- Post Meta Info / End -->

                        <!-- Post Author -->
                        {{--   <div class="post-author">
                    <figure class="post-author__avatar">
                      <img src="assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                    </figure>
                    <div class="post-author__info">
                      <h4 class="post-author__name">James Spiegel</h4>
                      <span class="post-author__slogan">Alchemists Ninja</span>
                    </div>
                  </div> --}}
                        <!-- Post Author / End -->

                    </div>
                    <!-- Post Meta - Top / End -->
                </div>
            </div>
        </div>

    </div>
    @endforeach
</div>
<div class="hero-slider-thumbs-wrapper">
    <div class="container">
        <div class="hero-slider-thumbs posts posts--simple-list">
            @foreach ($listaTouinfSlider as $objSlideTouinf1)
            <div class="hero-slider-thumbs__item">
                <div class="posts__item posts__item--category-{{ $objSlideTouinf1->touinfscode }}">
                    <div class="posts__inner">
                        
                        <h6 class="posts__title">{{ $objSlideTouinf1->touinftname }}</h6>
                        <time datetime="{{ $objSlideTouinf1->touinfdstat }}"
                            class="posts__date">{{ Carbon\Carbon::parse($objSlideTouinf1->touinfdstat)->formatLocalized('%d DE %B %Y') }}</time>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif