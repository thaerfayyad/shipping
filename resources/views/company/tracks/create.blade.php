@extends('layouts.company.app')
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
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('company/config.track.add')}}</h4>
                         <a href="{{url(LaravelLocalization::setLocale().'/company/tracks/'.$order->id)}}" class="btn btn-info waves-effect waves-light" style="margin-right: 900px">{{__('company/config.track.show')}}</a>

                    </div>
                    <hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url(LaravelLocalization::setLocale().'/company/tracks')}}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <div class="card-body">
                           <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group row">
                                                <label for="fname2" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.track.country_from')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="country_from" value="{{$order->countries_from->first()->name}}" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group row">
                                               <label for="fname2" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.track.country_to')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="country_to"value="{{$order->countries_to->first()->name}}" disabled="" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group row">
                                                <label for="fname2" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.track.current_location')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"  name="current_location" required="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group row">
                                               <label for="fname2" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.track.latitude')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="country_to" name="latitude" required="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group row">
                                               <label for="fname2" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.track.longitude')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="country_to" name="longitude" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <div class="row">
                                <div id="map" >
                                 </div>
                             </div>
                    

                        </div>

                        <hr>

                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.save')}}</button>


                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection

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
    <script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-advanced.init.js')}}"></script>


@endpush
