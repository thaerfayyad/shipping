<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src=" {{asset('storage/avatars/')}}/{{\Auth::user()->UserInfo->avatar}}" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{\Auth::user()->name}}</h5>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu">My profile</span>
                        @else
                            <span class="hide-menu">صفحتي الشخصية</span>
                        @endif
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item">
                            <a href="{{url(LaravelLocalization::setLocale().'/company/profile/'.\Auth::user()->UserID.'/edit')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                @if(LaravelLocalization::setLocale()=='en')
                                    <span class="hide-menu">Show </span>
                                @else
                                    <span class="hide-menu">عرض </span>
                                @endif

                            </a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                        @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu">Orders</span>
                        @else
                            <span class="hide-menu"> الطلبات </span>
                        @endif
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{url(LaravelLocalization::setLocale().'/company/orders')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                @if(LaravelLocalization::setLocale()=='en')
                                    <span class="hide-menu">Show </span>
                                @else
                                    <span class="hide-menu">عرض </span>
                                @endif

                            </a>
                        </li>
                    </ul>
                </li>
                  <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-cubes"></i>
                                 @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu">Packages</span>
                        @else
                            <span class="hide-menu"> الحمولات </span>
                        @endif
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('packages.index')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Show </span>
                                                        @else
                                                        <span class="hide-menu">عرض </span>
                                                        @endif

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('packages.create')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Add</span>
                                                        @else
                                                        <span class="hide-menu">اضافة حمولة</span>
                                                        @endif

                                    </a>
                                </li>

                            </ul>
                        </li>


                         <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                               <i class="fas fa-flag"></i>
                                 @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu">Zones</span>
                        @else
                            <span class="hide-menu"> المناطق</span>
                        @endif
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('zones.index')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Show </span>
                                                        @else
                                                        <span class="hide-menu">عرض </span>
                                                        @endif

                                    </a>
                                </li>
                             <li class="sidebar-item">
                                    <a href="{{route('zones.create')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Add</span>
                                                        @else
                                                        <span class="hide-menu">اضافة منطقة</span>
                                                        @endif

                                    </a>
                                </li>


                            </ul>
                        </li>

                    <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                              <i class="fas fa-dollar-sign"></i>
                                 @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu">Prices</span>
                        @else
                            <span class="hide-menu">الأسعار</span>
                        @endif
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <!--  <li class="sidebar-item">
                                    <a href="{{route('zones-prices.index')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Show </span>
                                                        @else
                                                        <span class="hide-menu">عرض </span>
                                                        @endif

                                    </a>
                                </li> -->
                             <li class="sidebar-item">
                                    <a href="{{route('zones-prices.create')}}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                         @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu">Add</span>
                                                        @else
                                                        <span class="hide-menu">اضافة سعر</span>
                                                        @endif

                                    </a>
                                </li>


                            </ul>
                        </li>




            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
