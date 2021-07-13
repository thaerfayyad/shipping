
      <header> 
    <!-- Header top area start -->
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="top-contact"> <a href="#"><i class="fa fa-envelope"></i> {{setting_value('email','all')}}</a> <a href="#"><i class="fa fa-phone"></i> {{setting_value('mobile','all')}}</a> <a href="#"><i class="far fa-clock"></i> {{setting_value('time_in','all')}}AM {{__('config.to')}}  {{setting_value('time_out','all')}}PM</a> </div>
          </div>
          <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end">
            <div class="top-menu">
              @guest
              <ul>
                <li><a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i>{{__('website/config.login')}} </a></li>
                <li><a href="{{route('register')}}"><i class="fa fa-unlock-alt"></i>{{__('website/config.register')}}</a></li>
              </ul>

              @else
               <ul>
                <li><a  class=""  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="" >
                            <i class="fas fa-sign-out-alt"></i> {{__('dashboard.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                <li><a href="{{url(LaravelLocalization::setLocale().'/member/profile/'.\Auth::user()->UserID.'/edit')}}" class="">{{__('dashboard.View Profile')}}</a></li>
              </ul>
              @endguest
            </div>
            <div class="language">
              <ul>
                  
              @if(LaravelLocalization::setLocale()=='ar')
                <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}" title=""  role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset('website/assets/images/flag-1.png')}}" alt=""/> EN</a>
                  </li>
                 
               @else

            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" title=""  role="button" aria-haspopup="true" aria-expanded="false">
                             <img src="https://img.icons8.com/color/48/000000/saudi-arabia.png"/>العربية</a>
                              </li>
               @endif
              

    
                  
                  
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header top area End --> 
    
    <!-- Header area start -->
    <div class="header-area">
      <div class="container"> 
        <!-- Site logo Start -->
        <div class="logo"> <a href="{{url(LaravelLocalization::setLocale().'/home')}}" title="International Deep Logistics"><img src="{{asset('website/assets/logo.png')}}" width="130px" height="40px"  alt="International Deep Logistics"/></a> </div>
        <!-- Site logo end -->
        <div class="mobile-menu-wrapper"></div>
        <!-- Search Start -->
        
        <!-- Search End --> 
        
        <!-- Main menu start -->
        <nav class="mainmenu">
          <ul id="navigation">
            @foreach ($websiteNavbar as $key => $value)
                       @if($value->parent_id == '0')
                       @if(count($value->children) == '0')
            <li class=""><a class="nav-link {{ ( URL(\Request::getPathInfo()) == URL(\Lang::getLocale(),$value->url) ) ? 'active' : '' }}" href="{{ URL(\Lang::getLocale(),$value->url) }}">  {{ \App::getLocale() == 'en' ? $value->title_en : $value->title_ar }}  </a></li>
            @else
              <li class=""><a class="nav-link {{ ( URL(\Request::getPathInfo()) == URL(\Lang::getLocale(),$value->url) ) ? 'active' : '' }}" 
                href="{{ URL(\Lang::getLocale(),$value->url) }}">  
                {{ \App::getLocale() == 'en' ? $value->title_en : $value->title_ar }}  </a>
           
             
               <ul>
                @foreach($value->children as $ky => $val)
                <li>
                  <a class="nav-link {{ ( URL(\Request::getPathInfo()) == URL(\Lang::getLocale(),$val->url) ) ? 'active' : '' }}" href="{{ route($val->url) }}">  {{ \App::getLocale() == 'en' ? $val->title_en : $val->title_ar }}  </a>
                </li>
                  @endforeach
                
              </ul>
             
            </li>
            @endif
                       @endif
                       @endforeach
          </ul>
        </nav>
        <!-- Main menu end --> 
      </div>
    </div>
    <!-- Header area End --> 
  </header>
  
