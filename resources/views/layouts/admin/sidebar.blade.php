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

                @foreach($sidebar as $key => $value)

                    @if($value->parent_id == '0')

                        @if(count($value->children) == '0')

                    <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{ (\Request::route()->getName() == $value->url) ? 'active' : '' }} {{ (strstr($value->url, \Request::segment('2')) ) ? 'active' : '' }}" href="{{ route($value->url) }}" aria-expanded="false">
                        <i class="{{ $value->label }} tx-24"></i>
                        @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu"> {{$value->title_en}} </span>
                        @else
                            <span class="hide-menu"> {{$value->title_ar}} </span>
                        @endif

                    </a>
                </li>
                        @else
                            @if(!is_null($value->permission))
                                @can($value->permission)

                            <li class="sidebar-item">


                    <a class="sidebar-link has-arrow waves-effect waves-dark {{ (strstr($value->url, \Request::segment('2')) ) ? 'active' : '' }}" href="#">
                        <i class="{{ $value->label }} tx-22"></i>
                        @if(LaravelLocalization::setLocale()=='en')
                            <span class="hide-menu"> {{$value->title_en}} </span>
                        @else
                            <span class="hide-menu"> {{$value->title_ar}} </span>
                        @endif

                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($value->children as $ky => $val)

                            <li class="sidebar-item">
                                <a href="{{ route($val->url) }}" class="sidebar-link  {{ (\Request::route()->getName() == $val->url) ? 'active' : '' }} ">

                                    <i class="{{ $val->label }} tx-22"></i>
                                    @if(LaravelLocalization::setLocale()=='en')
                                        <span class="hide-menu"> {{$val->title_en}} </span>
                                    @else
                                        <span class="hide-menu"> {{$val->title_ar}} </span>
                                    @endif


                                </a></li>

                        @endforeach
                    </ul>
                </li>

                                @endcan
                            @else
                                <li class="sidebar-item">

                                    <a class="sidebar-link has-arrow waves-effect waves-dark {{ (strstr($value->url, \Request::segment('2')) ) ? 'active' : '' }}" href="#" aria-expanded="false">
                                        <i class="{{ $value->label }} tx-22"></i>
                                        @if(LaravelLocalization::setLocale()=='en')
                                            <span class="hide-menu"> {{$value->title_en}} </span>
                                        @else
                                            <span class="hide-menu"> {{$value->title_ar}} </span>
                                        @endif

                                    </a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        @foreach($value->children as $ky => $val)

                                            <li class="sidebar-item">
                                                <a href="{{ route($val->url) }}" class="sidebar-link  {{ (\Request::route()->getName() == $val->url) ? 'active' : '' }} ">
                                                    <i class="{{ $val->label }} tx-22"></i>
                                                    @if(LaravelLocalization::setLocale()=='en')
                                                    <span class="hide-menu"> {{$val->title_en}} </span>
                                                        @else
                                                        <span class="hide-menu"> {{$val->title_ar}} </span>
                                                        @endif

                                                </a></li>

                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                        @endif
                    @endif

                @endforeach
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
