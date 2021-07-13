@extends('layouts.app')

@section('content')
<!-- Slider Start -->
  <div class="homepage-slides-wrapper">
    <div class="owl-carousel homepage-slides text-center">
      <!-- Slider item1 start-->
      <div class="single-slide-item slider-overlay slide-bg-1">
        <div class="item-table">
          <div class="item-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3>{{__('website/config.block1')}}</h3>
                  <h2>{{__('website/config.block3')}}</h2>
                  <p>{{__('website/config.block4')}}.</p>
                  <a href="{{url(LaravelLocalization::setLocale().'/contacts')}}" class="wshipping-button slide-btn">{{__('config.contactUs')}}</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider item1 end-->

      <!-- Slider item2 start-->
      <div class="single-slide-item slider-overlay slide-bg-2">
        <div class="item-table">
          <div class="item-tablecell">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3>{{__('website/config.block1')}}</h3>
                  <h2>{{__('website/config.block2')}}</h2>
                  <p>{{__('website/config.block5')}}.</p>
                   <a href="{{url(LaravelLocalization::setLocale().'/contacts')}}" class="wshipping-button slide-btn">{{__('config.contactUs')}}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider item2 end-->
    </div>
  </div>
  <!-- Slider End -->

  <!-- Service start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="section-title wow fadeInUp">
            <h2>{{__('website/config.services')}}</h2>
            
          </div>
        </div>
      </div>
      <div class="row " style="-ms-flex: 1; ">
          @foreach($services as $service)
          <div class="col-12 col-lg-4">
            <div class="single-service-item wow fadeInUp">
              <div class="service-item-bg service-bg-1" style="background-image: url('{{asset('storage/img/'.$service->img)}}');"> <!-- <img src="{{asset('storage/img/'.$service->img)}}" alt="{{$service->title}}"  class="rounded" width="350" height="250"> -->
              </div>
              <div class="service-content">
                @php
                $service_title = $service->label;
                if (LaravelLocalization::setLocale() == 'ar') {
                  $service_title = $service->title;
                }
                $desc = 'des_'.LaravelLocalization::setLocale();
                @endphp
                <h4>{{$service_title}}</h4>
                @php
                $desc = 'des_'.LaravelLocalization::setLocale();
                @endphp
                <p>{{$service->$desc}}.</p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>
  <!-- Service End -->

  <!-- we peovide start -->
  <div class="wshipping-content-block provided-block text-center">
    <div class="item-table">
      <div class="item-tablecell">
        <div class="container">
          <div class="row">
            <div class="col-12 wow fadeInUp">
              <h3 class="text-uppercase">{{__('website/config.offer')}}</h3>
             
              <h2>{{__('website/config.text')}}</h2>
             <a href="{{url(LaravelLocalization::setLocale().'/contacts')}}" class="wshipping-button slide-btn">{{__('config.contactUs')}}</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- we provide end -->

  <!-- Why Choose start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 wow fadeInLeft"> <img src="{{asset('website/assets/images/shipping.png')}}" alt=""/> </div>
        <div class="col-12 col-lg-4">
          <div class="why-choose-us-content wow fadeInUp">
            <h3 class="heading3-border text-uppercase">{{__('website/config.about_us')}}</h3>
            <p>{{__('website/config.p1')}}</p>
            </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="why-choose-us wow fadeInRight">
            <div class="why-choose-us-icon"> <i class="far fa-handshake"></i> {{__('website/config.trust')}} </div>
            <div class="why-choose-us-icon"> <i class="fa fa-unlock-alt"></i> {{__('website/config.security')}}</div>
            <div class="why-choose-us-icon"> <i class="far fa-thumbs-up"></i> {{__('website/config.guarantee')}} </div>
            <div class="why-choose-us-icon"> <i class="fas fa-map-marker-alt"></i>  {{__('website/config.location')}} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- why choose End -->
  <!-- Service process start -->
  <div class="wshipping-content-block service-process">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="section-title">
            <h2>{{__('website/config.serv')}}</h2>
           
          </div>
        </div>
      </div>
      <div class="process-row">
        <div class="process-step">
          <div class="process-icon"> <span>1</span> <img src="{{asset('website/assets/images/process-icon1.png')}}" alt=""/> </div>
          <p>{{__('website/config.step1')}}</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>2</span> <img src="{{asset('website/assets/images/process-icon2.png')}}" alt=""/> </div>
          <p>{{__('website/config.step2')}}</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>3</span> <img src="{{asset('website/assets/images/process-icon3.png')}}" alt=""/> </div>
          <p>{{__('website/config.step3')}}</p>
        </div>
        <div class="process-step">
          <div class="process-icon"> <span>4</span> <img src="{{asset('website/assets/images/process-icon4.png')}}" alt=""/> </div>
          <p>{{__('website/config.step4')}}</p>
        </div>
      </div>
    </div>
  </div>
  <!-- service process start -->

  

  

  <!-- Counter start -->
  <div class="wshipping-content-block counter-section">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-folder-open"></i></span>
            <p><span class="counter" data-count="{{$orders}}">0</span> {{__('website/config.orders')}}</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fas fa-users"></i></span>
            <p><span class="counter" data-count="{{$members}}">0</span> {{__('website/config.members')}}</p>
          </div>
     

        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-truck"></i></span>
            <p><span class="counter" data-count="{{$companies}}">0</span>  {{__('website/config.companies')}}</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="counter-block"> <span class="counter-icon"><i class="fa fa-male"></i></span>
            <p><span class="counter" data-count="{{$countries}}">0</span>  {{__('website/config.countries')}}
</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Counter End -->

<br>

  <!-- Our client start -->
  <div class="wshipping-content-block client-block pt0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="heading3-border text-uppercase">{{__('website/config.fav_companies')}}</h3>
        </div>
        <div class="owl-carousel our-client">
          @foreach($fav_companies as $fav)
          <div class="client-item"><img src="{{asset('storage/avatars')}}/{{ $fav->userInfo->avatar }}" alt=""/></div>
         @endforeach
 
        </div>
      </div>
    </div>
  </div>
  <!-- Our client end -->
@endsection