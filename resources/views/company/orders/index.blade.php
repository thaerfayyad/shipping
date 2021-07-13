@extends('layouts.company.app')

@section('content')
    <div class="container-fluid">
                                        @if (Session::has('delete'))
                                       <div class="alert alert-danger alert-rounded text-center"> {{ Session::get('delete') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                     @endif
                                      @if (Session::has('success'))
                                       <div class="alert alert-success alert-rounded text-center"> {{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                     @endif


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ __('company/config.order.title') }}</h2>
                       
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">

                                <thead style="color: #0b0b0b;font-size: 15px">
                                <tr>

                                    <th>{{__('company/config.packages.id')}}</th>
                                    <th>{{__('company/config.order.number_order')}}</th>
                                    <th>{{__('company/config.order.company_name')}}</th>
                                    <th>{{__('company/config.order.pay_status')}}</th>
                                    <th>{{__('company/config.order.shipping_status')}}</th>
                                    <th>{{__('company/config.order.tel_member')}}</th>
                                    <th>{{__('company/config.order.email_member')}}</th>
                                    <th>{{__('company/config.order.operations')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($orders as $key => $val)
                                    <tr>

                                        <td>{{$key+1}}</td>

                                        <td>{{$val->order_number}}</td>
                                        <td>{{$val->user->name}}</td>
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

                                        <td>{{$val->user->userInfo->mobile}}</td>
                                        <td>{{$val->user->userinfo->user->email}}</td>
                                        <td>
                                           <a href="{{url(LaravelLocalization::setLocale().'/company/orders/'.$val->id.'/edit')}}" class="btn btn-info waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                            <a href="{{url(LaravelLocalization::setLocale().'/company/tracks/create/'.$val->id)}}" class="btn btn-info waves-effect waves-light"><i class="fa fa-street-view" aria-hidden="true"></i></a>
                                        </td>



                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>

                    </div>
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
