<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="dark-logo">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
{{--                    <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />--}}
{{--                    <!-- Light Logo icon -->--}}
{{--                    <img src="{{asset('admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />--}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->

                <span class="logo-text ">
                            <!-- dark Logo text -->
                            <img src="{{asset('website/assets/logo.png')}}" alt="homepage" class="dark-logo" width="70px" height="70px" />
                    <!-- Light Logo text -->
                            <img src="{{asset('website/assets/logo.png')}}" class="light-logo" alt="homepage"width="70px" height="70px" />
                        </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="sl-icon-menu font-20"></i>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->


            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                       {{__('dashboard.language')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown2">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                               {{ $properties['native'] }}</a>
                        @endforeach
                    </div>
                </li>

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img src=" {{asset('storage/avatars/')}}/{{\Auth::user()->UserInfo->avatar}}" alt="user" class="rounded-circle" width="31">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="/storage/avatars/{{ \Auth::user()->UserInfo->avatar }}" alt="user" class="img-circle" width="60">
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{\Auth::user()->name}}</h4>
                                <p class=" m-b-0">{{\Auth::user()->email}}</p>
                            </div>
                        </div>  
        
       
            
                        <a class="dropdown-item" href="{{url(LaravelLocalization::setLocale().'/admin/profile/'.\Auth::user()->UserID.'/edit')}}">
                         <i class="ti-user m-r-5 m-l-5"></i>{{__('dashboard.My Profile')}}</a>
                       
                        <div class="dropdown-divider"></div>
                       <!--  <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-settings m-r-5 m-l-5"></i>{{__('dashboard.Account Setting')}}</a>
                        <div class="dropdown-divider"></div> -->
            

                        <a  class="dropdown-item"  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="" >
                            <i class="ti-power-off"></i> {{__('dashboard.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-divider"></div>
                        <div class="p-l-30 p-10">
                            <a href="{{url(LaravelLocalization::setLocale().'/admin/profile/'.\Auth::user()->UserID.'/edit')}}" class="btn btn-sm btn-success btn-rounded">{{__('dashboard.View Profile')}}</a>
                        </div>
                       
                          
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
