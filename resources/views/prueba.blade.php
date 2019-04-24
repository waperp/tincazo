  <div id="main-nav-torneos" class="main-nav__megamenu clearfix" style="width:unset; left: unset; padding: 20px 20px ">
                  
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <ul class="posts posts--simple-list">
                                <!-- //torneo -->
                                  @foreach($listaTorneosMenu as $objTorneosUsersMenu)
                                   
                                  
                                <li class="posts__item posts__item--category-1">
                                  <figure class="posts__thumb">
                                    <a href="javascript:void(0)" data-id="">
                                      <img style="width: 50px ; height: 50px; border-radius: 20%" src="/images/{{ $objTorneosUsersMenu->touinfvlogt  }}" >
                                    </a>
                                  </figure>
                                  <div class="posts__inner">
                                    <div class="posts__cat">
                                      <span style="white-space: pre-wrap; width: 100%"  class="label posts__cat-label"><a href="javascript:void(0)" style="color: white;font-size: 11px;" >{{ $objTorneosUsersMenu->tougrptname }}</a></span>
                                    </div>
                                    <h6 class="posts__title"><a href="javascript:void(0)" style="color: white;font-size:9px;">{{ $objTorneosUsersMenu->touinftname }}</a> </h6>
                                  </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>