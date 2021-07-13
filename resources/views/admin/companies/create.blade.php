@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('company/config.add_company')}}</h4>

                    </div>
                    <hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('companies.store')}}">
                        @csrf
                       
                           <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.FullName')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.EmailAddress')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="mobile" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.mobile')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"   pattern=".{2,}" required >
                                            <p class="help-block wow tada" style="font-size: 15px"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.address')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                            
                                                <label for="country_id" class="col-sm-3 text-right control-label col-form-label">{{__('website/config.country')}}</label>
                                                <div class="col-sm-9">
                                                     <select class="form-control select_country" name="country_id" id="select_country"
                                   onchange="getCities(this.value)" required=""> 
                                
                                         @foreach ($countries as $key => $value)
                                        <option value="{{$key}}" > {{$value->name}} </option>
                                            @endforeach
    
                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="city_id" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.city')}}</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control cities" name="city_id" id="cities"> 
                                
                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                        
                           
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="mobile" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.facebook')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}"  >
                                            <p class="help-block wow tada" style="font-size: 15px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.twitter')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="mobile" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.about')}}</label>
                                                <div class="col-sm-9">
                                                     <textarea rows="5" class="form-control form-control-line" name="about" id="about"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-3 text-right control-label col-form-label">{{__('company/config.avatar')}}</label>
                                                <div class="col-sm-9">
                                                   <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">{{__('config.avatarText')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="mobile" class="col-sm-3 text-right control-label col-form-label">{{__('website/config.password')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password" required >
                        <p class="help-block wow tada" style="font-size: 15px" >   {{ __('website/config.strog_password') }}  </p>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 text-right control-label col-form-label">{{__('website/config.register_no')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="register_no" name="register_no" value="{{ old('register_no') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                        <hr>

                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.save')}}</button>
                                <a href="{{route('packages.index')}}" class="btn btn-dark waves-effect waves-light">{{__('config.cancel')}}</a>
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
    <script type="text/javascript">
        

        function getCities(id){
         console.log(id);          // ids = ($('#countries').val());

            // var token = $(this).data("token");

            // $.ajaxSetup({

            //     headers: {

            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            //     }

            // });


            $.ajax(

                {
                    url: '/getCities/' + id,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": id,
                    },

                    success: function (data){
                       // console.log(data)
                        $("#cities").empty();

                        for (let i=0; i<data.cities.length; i++) {
                            $("#cities").append("<option value='"+data.cities[i].id+"'>"+data.cities[i].name+"</option>");
                        }

                    }
                });

        }
    </script>

@endpush
