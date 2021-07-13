@extends('layouts.company.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('company/config.order.edit')}}</h4>
                    </div>
                    <hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url(LaravelLocalization::setLocale().'/company/orders/'.$order->id)}}">

                        {{method_field('PATCH')}}
                        @csrf
                        <div class="card-body">
                           
                            <div class="form-group row">
                                <label for="name_ar" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.order.pay_status')}}</label>
                                <div class="col-sm-6">
                                     <select class="form-control " name="pay_status" id=""    >
                                                @php $cou=old('pay_status',$order->pay_status); @endphp
                                        @if(LaravelLocalization::setLocale()=='ar')
                                                 @if ($cou == 'pay')
                                                <option value="pay" selected>{{__('company/config.order.pay_ar')}}</option>
                                                 @else
                                               <option value="not_pay">{{__('company/config.order.not_pay_ar')}}</option>
                                                @endif
                                    
                                               @if ($cou == 'not_pay')
                                                <option value="pay">{{__('company/config.order.pay_ar')}}</option>
                                                 @else
                                               <option value="not_pay">{{__('company/config.order.not_pay_ar')}}</option>
                                                @endif
                                                   
                                      @else
                                           @if ($cou == 'pay')
                                                <option value="pay" selected>{{__('company/config.order.pay_en')}}</option>
                                                 @else
                                               <option value="not_pay">{{__('company/config.order.not_pay_en')}}</option>
                                                @endif
                                    
                                               @if ($cou == 'not_pay')
                                                <option value="pay">{{__('company/config.order.pay_en')}}</option>
                                                 @else
                                               <option value="not_pay">{{__('company/config.order.not_pay_en')}}</option>
                                                @endif
                                                  
                                         @endif    
                                              

                                            </select>
                                </div>
                            </div>
                       
                     <div class="form-group row">
                                <label for="name_ar" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.order.shipping_status')}}</label>
                                <div class="col-sm-6">
                                     <select class="form-control " name="shipping_status" id=""    >
                                                @php $cou=old('shipping_status',$order->shipping_status); @endphp
                                        @if(LaravelLocalization::setLocale()=='ar')
                                                 @if ($cou == 'shipping')
                                                <option value="shipping" selected>{{__('company/config.order.shipping_ar')}}</option>
                                                 @else
                                               <option value="not_shipping">{{__('company/config.order.not_shipping_ar')}}</option>
                                                @endif
                                    
                                               @if ($cou == 'not_shipping')
                                                <option value="shipping">{{__('company/config.order.shipping_ar')}}</option>
                                                 @else
                                               <option value="not_shipping">{{__('company/config.order.not_shipping_ar')}}</option>
                                                @endif
                                                   
                                      @else
                                           @if ($cou == 'shipping')
                                                <option value="shipping" selected>{{__('company/config.order.shipping_en')}}</option>
                                                 @else
                                               <option value="not_shipping">{{__('company/config.order.not_shipping_en')}}</option>
                                                @endif
                                    
                                               @if ($cou == 'not_shipping')
                                                <option value="shipping">{{__('company/config.order.shipping_en')}}</option>
                                                 @else
                                               <option value="not_shipping">{{__('company/config.order.not_shipping_en')}}</option>
                                                @endif
                                                  
                                         @endif    
                                              

                                            </select>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.update')}}</button>
                                <a href="{{url(LaravelLocalization::setLocale().'/company/orders')}}" class="btn btn-dark waves-effect waves-light">{{__('config.cancel')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
@push('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@push('script')
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
