@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                         <h5 class="card-title mt-2">{{ __('config.settings') }}</h5>
                    <p class="card-subtitle">{{ __('config.manage_content') }}</p>
                    </div>
                    <hr>
                     <form method="POST" enctype="multipart/form-data" action="{{ url('admin/settings') }}">
                        @csrf
                           <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.shippingCommission')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[shipping_commission]"
                                           value="{{setting_value('shipping_commission','all')}}" class="form-control"
                                           placeholder="{{ __('config.shipping_commission') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 text-right control-label col-form-label">{{__('config.E-MailAddress')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="value[email]"
                                           value="{{setting_value('email','all')}}" class="form-control"
                                           placeholder="{{ __('config.E-MailAddress') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                      <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.mobile')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[mobile]"
                                           value="{{setting_value('mobile','all')}}" class="form-control"
                                           placeholder="{{ __('config.mobile') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 text-right control-label col-form-label">{{__('config.facebook')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="value[facebook]"
                                           value="{{setting_value('facebook','all')}}" class="form-control"
                                           placeholder="{{ __('config.facebook') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             @if(LaravelLocalization::setLocale()=='ar')
                                     <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.address')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[ar_address]"
                                           value="{{setting_value('address','ar')}}" class="form-control"
                                           placeholder="{{ __('config.address') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 text-right control-label col-form-label">{{__('config.address_ar_en')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="value[en_address]"
                                           value="{{setting_value('address','en')}}" class="form-control"
                                           placeholder="{{ __('config.address_ar_en') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else

                                    <div class="row">
                                         <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 text-right control-label col-form-label">{{__('config.address_en')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="value[en_address]"
                                           value="{{setting_value('address','en')}}" class="form-control"
                                           placeholder="{{ __('config.address_en') }}">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.address_ar_en')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[ar_address]"
                                           value="{{setting_value('address','ar')}}" class="form-control"
                                           placeholder="{{ __('config.address_ar_en') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                    </div>
                                       
                                    @endif 
                                   
                                     <div class="row">
                                        @if(LaravelLocalization::setLocale()=='ar')
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.fax_ar')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[fax]"
                                           value="{{setting_value('fax','all')}}" class="form-control"
                                           placeholder="{{ __('config.fax') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        @else



                                <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.fax_en')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[fax]"
                                           value="{{setting_value('fax','all')}}" class="form-control"
                                           placeholder="{{ __('config.fax') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        @endif
                                         @if(LaravelLocalization::setLocale()=='ar')
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.title_ar')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[ar_title]"
                                           value="{{setting_value('title','ar')}}" class="form-control"
                                           placeholder="{{ __('config.title') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        @else
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.title_ar')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[ar_title]"
                                           value="{{setting_value('title','ar')}}" class="form-control"
                                           placeholder="{{ __('config.title') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @if(LaravelLocalization::setLocale()=='ar')
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.title_en')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[en_title]"
                                           value="{{setting_value('title','en')}}" class="form-control"
                                           placeholder="{{ __('config.title_en') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                  
                                    </div>    
@else
<div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('config.title_en')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="value[en_title]"
                                           value="{{setting_value('title','en')}}" class="form-control"
                                           placeholder="{{ __('config.title_en') }}">
                                                </div>
     

                                            </div>
                                        </div>
                                  @endif
                                    </div> 
                                   
                             </div>           
                        <hr>

                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.save')}}</button>

                            </div>
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
