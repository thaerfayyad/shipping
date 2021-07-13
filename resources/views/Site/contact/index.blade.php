@extends('layouts.app')
<script type="text/javascript" src=""></script>
@push('style')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <style>
        #map{
            height: 400px;
            width: 100%;

        }
    </style>
@endpush

@section('content')


    <!-- Breadcroumbs start -->
    <div class="wshipping-content-block wshipping-breadcroumb inner-bg-2">
        <div class="container">
            <div class="row">
                
                <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
            </div>
        </div>
    </div>
    <!-- Breadcroumbs end -->
    <!-- Contact Start -->
    <div class="wshipping-content-block">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-12 col-lg-4">
                    <div class="address">
                        <h3>{{__('config.office')}}</h3>
                        <div class="address-block">
                            <ul>
                                <li class="address-icon"><strong>
                         @if(LaravelLocalization::setLocale()=='ar') 
                                {{__('config.address_ar')}}:</strong><br>
                                   {{setting_value('address','ar')}}
                    @else
                    {{__('config.address_en')}}:</strong><br>
                     {{setting_value('address','en')}}
                     @endif
                            </li>
                                <li class="phone-icon"><strong>{{__('config.mobile')}}:</strong><br>
                                    {{setting_value('mobile','all')}}</li>
                                <li class="fax-icon"><strong>
                            @if(LaravelLocalization::setLocale()=='ar') 
                                {{__('config.fax_ar')}}:</strong><br>
                                   {{setting_value('fax','all')}}
                    @else
                    {{__('config.fax_en')}}:</strong><br>
                     {{setting_value('fax','all')}}
                     @endif
                                </li>
                                <li class="email-icon"><strong>
                        @if(LaravelLocalization::setLocale()=='ar') 
                                {{__('config.email_ar')}}:</strong><br>
                                   <a href="mailto:{{setting_value('email','all')}}" title="">{{setting_value('email','all')}}</a></li>
                    @else
                    {{__('config.email_en')}}:</strong><br>
                     <a href="mailto:{{setting_value('email','all')}}" title="">{{setting_value('email','all')}}</a></li>
                     @endif

                                    
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="col-12 col-lg-8">
                
                    <div class="contact-form">
                        <h3 class="heading3-border text-uppercase">{{__('config.contactUs')}}</h3>
                        <form action="{{route('contacts.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" name="name" placeholder="{{__('website/shipping.FullName')}}" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" name="company" placeholder="{{__('website/shipping.company')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" name="email" placeholder="{{__('website/shipping.EmailAddress')}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" name="phone" placeholder="{{__('website/shipping.phone_hint')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control"  name="message" placeholder="{{__('website/shipping.message')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-submit">{{__('config.send')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact end -->
    <!-- Map start -->
   <div class="row">
       <div id="map" >
        </div>
     </div>
    <!-- Map end -->



@stop




@push('script')

<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script>

    <script>
        var shippmentMAP = L.map('map').setView([31.5017765,34.1866839], 10);
        var marker = L.marker([31.5017765,34.1866839]).addTo(shippmentMAP).bindPopup("<b>مرحبا بك!</b>").openPopup();
        var tileURL = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png' ;
        var  attribution =  'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>' ;
        var tiles  = L.tileLayer(tileURL , { attribution }).addTo(shippmentMAP);
        var popup = L.popup();
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(shippmentMAP);
        }

        shippmentMAP.on('click', onMapClick);
    </script>
@endpush
