

 
  <!-- Footer start -->
  <footer class="site-footer"> 
    <!-- Footer Top start -->
    <div class="footer-top-area">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <div class="footer-wiz">
          
               @if(LaravelLocalization::setLocale()=='ar')
              <p>{{setting_value('summary','ar')}}</p>
              @else
              <p>{{setting_value('summary','en')}}</p>
              @endif
              <ul class="footer-contact">
                <li><i class="fa fa-phone"></i>{{setting_value('mobile','all')}}</li>
                <li><i class="fa fa-envelope"></i> {{setting_value('email','all')}}</li>
                <li><i class="fa fa-fax"></i>{{setting_value('fax','all')}}</li>
              </ul>
            </div>
            <div class="top-social bottom-social"> <a href="{{setting_value('facebook','all')}}"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-youtube"></i></a> <a href="#"><i class="fa fa-rss"></i></a> </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="footer-wiz footer-menu">
              <h3 class="footer-wiz-title">{{__('config.links')}}</h3>
              <ul>
                <li><a href="{{route('home')}}">{{__('config.home')}}</a></li>
                <li><a href="">{{__('config.services')}}</a></li>
               
                <li><a href="{{route('about')}}">{{__('config.about_us')}}</a></li>
                <li><a href="{{url(LaravelLocalization::setLocale().'/contacts')}}">{{__('config.contact')}}</a></li>
                <li><a href="{{url(LaravelLocalization::setLocale().'/member/orders/create')}}">
               {{__('config.create_order')}}</a></li>
                
              </ul>
            </div>
          </div>
       
          <div class="col-12 col-md-6 col-lg-3">
            <div class="footer-wiz">
              <h3 class="footer-wiz-title">{{__('config.hours')}}</h3>
              <ul class="open-hours">
                <li>
                @if(LaravelLocalization::setLocale()=='ar')
                <span>{{__('config.from')}} 
           
                  {{setting_value('dayFrom','ar')}}
                 {{__('config.to')}} {{setting_value('dayTo','ar')}}
                  </span>
                   <span class="text-right">{{setting_value('time_in','all')}}AM {{__('config.to')}}  {{setting_value('time_out','all')}}PM</span>
@else
     <span>{{__('config.from')}} 
           
                  {{setting_value('dayFrom','en')}}
                 {{__('config.to')}} {{setting_value('dayTo','en')}}
                  </span>
                   <span class="text-right">{{setting_value('time_in','all')}}AM {{__('config.to')}}  {{setting_value('time_out','all')}}PM</span>
@endif
                 </li>
                
              </ul>
             
            </div>
          </div>
             <div class="col-12 col-md-6 col-lg-3">
           <img src="{{asset('website/assets/logo_footer.png')}}" width="500px" height="300px"  alt="International Deep Logistics"/>
           </div>
        </div>
      </div>
    </div>
    <!-- footer top end --> 
    
    <!-- copyright start -->
    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
           @if(LaravelLocalization::setLocale()=='ar')
          <div class="col-12 col-lg-6 wow fadeInLeft">{{setting_value('footer','ar')}}</div>
          @else
        <div class="col-12 col-lg-6 wow fadeInLeft">{{setting_value('footer','en')}}</div>
          @endif
          <div class="col-12 col-lg-6 text-right wow fadeInRight">{{__('config.design')}}:
 @if(LaravelLocalization::setLocale()=='ar')
           <a href="{{setting_value('developer_url','ar')}}" title="" target="_blank">{{setting_value('developer','ar')}}</a>
           @else
 <a href="{{setting_value('developer_url','en')}}" title="" target="_blank">{{setting_value('developer','en')}}</a>
           @endif
           </div>
        </div>
      </div>
    </div>
    <!-- copyright end --> 
  </footer>
  <!-- Footer end --> 