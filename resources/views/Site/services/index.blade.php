@extends('layouts.app')

@section('content')
<div class="wshipping-content-block wshipping-breadcroumb inner-bg-2">
        <div class="container">
            <div class="row">
                
                <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
            </div>
        </div>
    </div>
  

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
      <div class="row">
          @foreach($services as $service)
          <div class="col-12 col-lg-4">
            <div class="single-service-item wow fadeInUp">
              <div class="service-item-bg service-bg-1" style="background-image: url('{{asset('storage/img/'.$service->img)}}');"> <!-- <img src="{{asset('storage/img/'.$service->img)}}" alt="{{$service->title}}"  class="rounded" width="100%" height="250"> -->
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


@endsection
