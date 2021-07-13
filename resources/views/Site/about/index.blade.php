@extends('layouts.app')


@section('content')
 <div class="wshipping-content-block wshipping-breadcroumb inner-bg-2">
        <div class="container">
            <div class="row">
                
                <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
            </div>
        </div>
    </div>
    <!-- About content start -->
    <div class="wshipping-content-block">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-12 col-lg-12">
                    <div class="right-block">
                        <h2 class="text-uppercase">{{__('website/config.about_us')}}</h2>
                        <img src="{{asset('website/assets/images/shipping.png')}}" alt="" class="img-responsive feat-img"/>
                        <p>{{__('website/config.p1')}}. </p>
                        <p>{{__('website/config.p2')}}.</p>
                        <p>{{__('website/config.p3')}}.</p>
                        <p>{{__('website/config.p4')}}.</p>
                        <div class="why-choose-us-inner wow fadeInUp">
                            <h3 class="heading3-border text-uppercase">{{__('website/config.why')}}</h3>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="why-choose-us-icon"> <i class="far fa-handshake"></i>
                                        <h5>{{__('website/config.trust')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="why-choose-us-icon"> <i class="fa fa-unlock-alt"></i>
                                        <h5>{{__('website/config.security')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="why-choose-us-icon"> <i class="far fa-thumbs-up"></i>
                                        <h5>{{__('website/config.guarantee')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="why-choose-us-icon"> <i class="fas fa-map-marker-alt"></i>
                                        <h5>{{__('website/config.location')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- About content end -->


@stop

@push('script')


@endpush
