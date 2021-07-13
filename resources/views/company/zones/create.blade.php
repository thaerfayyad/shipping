@extends('layouts.company.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{__('company/config.zones.create')}}</h3>

                        <div class="table-responsive">
                                <form method="post" id="dynamic_form" enctype="multipart/form-data" action="{{ route('add_zone.insert')}}" >
                                    @csrf
                                  @if (Session::has('success'))
                                        <div class="alert alert-success alert-rounded text-center">{{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if(LaravelLocalization::setLocale()=='ar')
                                            <div class="form-group col-md-3">
                                                <label for="name_ar" class="text-right control-label col-form-label">{{__('company/config.zones.name')}}</label>
                               
                                    <input name="name_ar" type="text" class="form-control" id="name_ar" required="">
                    <input name="zone_id" type="hidden" class="form-control" id="zone_id" required="">
                                            </div>
                                            @else
                                             <div class="form-group col-md-3">
                                                <label for="name_ar" class="text-right control-label col-form-label">{{__('company/config.zones.name')}}</label>
                               
                                    <input name="name_en" type="text" class="form-control" id="name_en">
                    
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                      <table id="dynamicTable" class="table table-striped table-bordered display">
 
                                          <tr>

                                            <td>
                                        <label for="country_id_from" class="text-right control-label col-form-label">{{__('company/config.zones.country_from')}}</label>
                                            </td>
                                              <td>

                                        
                                                <select class="form-control" id="country_id_from" name="addmore[0][country_id_from]"  required=""> 
                               
                                               <option>{{__('company/config.zones.select')}}</option>
                                                      @foreach ($countries as $key => $value)
                                                         
                                                              <option value="{{$value->id}}">
                                                                   {{$value->name}}
                                                             </option>                                            
                                                      @endforeach
                                                  </select></td>  

                                             <td>
                                              <label for="zone_id" class="text-right control-label col-form-label">{{__('company/config.zones.country_to')}}</label>
                                            </td>
                                              <td><select class="form-control" id="country_id_to" name="addmore[0][country_id_to]"  required=""> 
                               
                                               <option>{{__('company/config.zones.select')}}</option>
                                                      @foreach ($countries as $key => $value)
                                                         
                                                              <option value="{{$value->id}}">
                                                                   {{$value->name}}
                                                             </option>                                            
                                                      @endforeach
                                                  </select></td>  



                                              <td><button type="button" name="add" id="add" class="btn btn-success">{{__('company/config.zones_prices.add')}}</button></td>
                                          </tr>

                                      </table>
                                    @if(LaravelLocalization::setLocale()=='ar')
                                        <button type="submit" class="btn btn-info waves-effect waves-light" style="margin-right: 970px">{{__('company/config.zones_prices.save')}}</button>
                                    @else
                                        <button type="submit" class="btn btn-info waves-effect waves-light" style="margin-left: 960px">{{__('company/config.zones_prices.save')}}</button>
                                    @endif
                                </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        </div>



@endsection
@push('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">

@endpush
@push('script')

    <script type="text/javascript">

        var i = 0;

        $("#add").click(function(){

            ++i;

            $("#dynamicTable").append('<tr><td>'+
                   '<label for="zone_id" class="text-right control-label col-form-label">'+
                   '{{__('company/config.zones.country_from')}}</label>'+
                                            '</td>'+
              '<td><select class="form-control" id="country_id_from" name="addmore['+i+'][country_id_from]">' +
                '                                                      <option>{{__('company/config.zones.select')}}</option>' +
                '                                                      @foreach($countries as $key => $value)' +
               
                '                                                              <option value="{{$value->id}}">' +
                '                                                              {{$value->name}} \n' +
                
                '                                                              </option>' +
                                                                    
                '                                                      @endforeach' +
                '                                                  </select></td>' +
                ' <td>'+
                '<label for="zone_id" class="text-right control-label col-form-label">'+
                '{{__('company/config.zones.country_to')}}</label>'+
                                            '</td>'+
                '<td><select class="form-control" id="country_id_to" name="addmore['+i+'][country_id_to]">' +
                '                                                      <option>{{__('company/config.zones.select')}}</option>' +
                '                                                      @foreach($countries as $key => $value)' +
               
                '                                                              <option value="{{$value->id}}">' +
                '                                                              {{$value->name}} \n' +
                
                '                                                              </option>' +
                                                                    
                '                                                      @endforeach' +
                '                                                  </select></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">{{__('company/config.zones_prices.remove')}}</button></td>'+
              '</tr>');
        });

        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });

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
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jquery.repeater/repeater-init.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jquery.repeater/dff.js')}}"></script>




    <!-- apps -->



@endpush
