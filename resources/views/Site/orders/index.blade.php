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
                    @if((count($orders)) == 0)
                    <div class="card">
                        <div class="card-body bg-danger" style="padding:20px;text-align: center;">
                       <h5 style="color: #fff">{{__('website/order.notFound')}}</h3>
                   </div>
               </div>
                 <br><br><br><br><br><br><br>
                    @else
                    <div class="order-list">
                        <h3>{{__('website/order.order')}}</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('website/order.id')}}</th>
                                    <th>{{__('website/order.order_number')}}</th>
                                    <th>{{__('website/order.pay_status')}}</th>
                                    <th>{{__('website/order.shipping_status')}}</th>
                                    <th>{{__('website/order.company')}}</th>
                                    <th>{{__('website/order.package')}}</th>

                                    <th>{{__('website/order.shipping_method')}}</th>
                                    <th>{{__('website/order.price')}}</th>
                                    <th>{{__('website/order.price_commission')}}</th>
                                    <th>{{__('website/order.total')}}</th>

                                    <th>{{__('website/order.track')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($orders as $key=>$val)
                                    <td>{{$key+1}}</td>
                                    <td>{{$val->order_number}}</td>
                                        <td>
                                            @if(LaravelLocalization::setLocale()=='ar')
                                                @if($val->pay_status=='pay')
                                                    {{__('company/config.order.pay_ar')}}
                                                @else
                                                    {{__('company/config.order.not_pay_ar')}}
                                                @endif


                                            @else
                                                @if($val->pay_status=='pay')
                                                    {{__('company/config.order.pay_en')}}
                                                @else
                                                    {{__('company/config.order.not_pay_en')}}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if(LaravelLocalization::setLocale()=='ar')
                                                @if($val->shipping_status=='shipping')
                                                    {{__('company/config.order.shipping_ar')}}
                                                @else
                                                    {{__('company/config.order.not_shipping_ar')}}
                                                @endif


                                            @else
                                                @if($val->shipping_status=='shipping')
                                                    {{__('company/config.order.pay_en')}}
                                                @else
                                                    {{__('company/config.order.not_pay_en')}}
                                                @endif
                                            @endif
                                        </td>

                                        <td>{{$val->user->name}}</td>
                                    <td> @if(LaravelLocalization::setLocale()=='ar')
                                        {{$val->package->name_ar }}</td>
                                        @else
                                            {{$val->package->name_en }}
                                        @endif
                                    <td>@if(LaravelLocalization::setLocale()=='ar')
                                        {{$val->shipping->title_ar }}
                                        @else
                                            {{$val->shipping->title_en }}
                                        @endif
                                    </td>
                                    <td>${{$val->price}}</td>
                                    <td>${{setting_value('shipping_commission','all')}}</td>
                                    <td>${{$val->price_commission}}</td>

                                    <td><a href="{{route('tracks.index',$val->id)}}" ><i class="fa fa-street-view" aria-hidden="true"></i></a>
 </a>


                                    </td>
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
