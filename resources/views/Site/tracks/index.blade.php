@extends('layouts.app')
<script type="text/javascript" src=""></script>

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
    <!-- Current Shipment start -->
    <div class="wshipping-content-block">
        <div class="container">
            <div class="row">
                 
                <div class="col-12 col-lg-12">
                    @if((count($tracks)) == 0)
                    <div class="card">
                        <div class="card-body bg-danger" style="padding:20px;text-align: center;">
                       <h5 style="color: #fff">{{__('website/track.notFound')}}</h3>
                   </div>
               </div>
                 <br><br><br><br><br><br><br>
                    @else
                    <div class="order-list">
                        <h3>{{__('website/track.track')}}</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('website/order.id')}}</th>
                                    <th>{{__('website/track.current')}}</th>
                                    <th>{{__('website/track.name')}}</th>
                                    <th>{{__('website/track.longitude')}}</th>
                                    <th>{{__('website/track.latitude')}}</th>
                                    <th>{{__('website/track.create')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach( $tracks  as $order=>$val)
                                        <td>{{$order+1}}</td>
                                        <td>{{$val->current_location}}</td>
                                        <td>{{$val->order->user->name}}</td>
                                        <td>{{$val->longitude}}</td>
                                        <td>{{$val->latitude}}</td>
                                        <td>{{$val->created_at}}</td>

                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endif
            </div>
        </div>
    </div>
    <!-- Blog content end -->




@stop


@push('script')

@endpush
