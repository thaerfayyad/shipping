@extends('layouts.company.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{__('company/config.zones_prices.create')}}</h3>

                        <div class="table-responsive">
                                <form method="post" id="dynamic_form" enctype="multipart/form-data" action="{{ route('add_prices.insert')}}" >
                                    @csrf
                                  @if (Session::has('success'))
                                        <div class="alert alert-success alert-rounded text-center">{{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-3">
                                                <select class="form-control" id="zone_id" name="zone_id">
                                                    <option>{{__('company/config.zones_prices.choose')}}</option>
                                                    @foreach($zones as $zone)
                                                        @if(LaravelLocalization::setLocale()=='ar')
                                                     
                                                            <option value="{{$zone->id}}">{{$zone->name_ar}}</option>
                                                        @else
                                                            <option value="{{$zone->id}}">{{$zone->name_en}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                      <table id="dynamicTable" class="table table-striped table-bordered display">

                                          <tr>
                                              <td><select class="form-control" id="package_id" name="addmore[0][package_id]">
                                                      <option>{{__('company/config.zones_prices.packageType')}}</option>
                                                      @foreach($packages as $package)
                                                          @if(LaravelLocalization::setLocale()=='ar')
                                                              <option value="{{$package->id}}">

                                                                  {{$package->name_ar}} (
                                                                  {{$package->length}} x  {{$package->width}} x  {{$package->height}}
                                                                  )


                                                              </option>
                                                          @else
                                                              <option value="{{$package->id}}">{{$package->name_en}}
                                                                  {{$package->length}} x  {{$package->width}} x  {{$package->height}}
                                                                  )
                                                              </option>
                                                          @endif
                                                      @endforeach

                                                  </select></td>
                                              <td> <select class="form-control" id="shipping_method_id" name="addmore[0][shipping_method_id]" >
                                                      <option>{{__('company/config.zones_prices.shippingMethod')}}</option>

                                                  @foreach ($shipping_methods->where('parent_id', 0) as $value) <!-- first level only: no parent -->
                                                      @if(LaravelLocalization::setLocale()=='ar')
                                                          @if($value->children->count()==0)
                                                              <option value="{{ $value->id }}">
                                                                  {{ $value->title_ar }}
                                                              </option>
                                                          @endif
                                                          @if($value->children->count()) <!-- if has children -->
                                                          <optgroup label="{{$value->title_ar}}"> <!-- display parent optgroup and within child categories option -->
                                                              @foreach($value->children as $child)
                                                                  <option value="{{ $child->id }}">
                                                                      -- {{ $child -> title_ar }}
                                                                  </option>
                                                              @endforeach
                                                          </optgroup>
                                                          @endif
                                                      @else
                                                          @if($value->children->count()==0)
                                                              <option value="{{ $value->id }}">
                                                                  {{ $value->title_en }}
                                                              </option>
                                                          @endif
                                                          @if($value->children->count()) <!-- if has children -->
                                                          <optgroup label="{{$value->title_en}}"> <!-- display parent optgroup and within child categories option -->
                                                              @foreach($value->children as $child)
                                                                  <option value="{{ $child->id }}">
                                                                      -- {{ $child -> title_en }}
                                                                  </option>
                                                              @endforeach
                                                          </optgroup>
                                                          @endif

                                                      @endif
                                                      @endforeach
                                                  </select></td>
                                              <td><select class="form-control" id="currency_id" name="addmore[0][currency_id]">
                                                      <option>{{__('company/config.zones_prices.currencyType')}}</option>
                                                      @foreach($currencies as $curr)
                                                          <option value="{{$curr->id}}">
                                                              {{$curr->name}}
                                                          </option>
                                                      @endforeach
                                                  </select></td>
                                              <td> <input type="text" class="form-control" id="price" name="addmore[0][price]" placeholder="{{__('company/config.zones_prices.price')}}"></td>
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

            $("#dynamicTable").append('<tr><td><select class="form-control" id="package_id" name="addmore['+i+'][package_id]">' +
                '                                                      <option>{{__('company/config.zones_prices.packageType')}}</option>' +
                '                                                      @foreach($packages as $package)' +
                '                                                          @if(LaravelLocalization::setLocale()=='ar')' +
                '                                                              <option value="{{$package->id}}">' +
                '                                                              {{$package->name_ar}} (\n' +
                '                                                                  {{$package->length}} x  {{$package->width}} x  {{$package->height}}' +
                '                                                                  )' +
                '                                                              </option>' +
                '                                                          @else' +
                '                                                              <option value="{{$package->id}}">{{$package->name_en}}' +
                '                                                                  {{$package->length}} x  {{$package->width}} x  {{$package->height}}' +
                '                                                                  )' +
                '                                                              </option>' +
                '                                                          @endif' +
                '                                                      @endforeach' +
                '                                                  </select></td>' +
                '<td>                 <select class="form-control" id="shipping_method_id" name="addmore['+i+'][shipping_method_id]">\n' +
                '                                            <option>{{__('company/config.zones_prices.shippingMethod')}}</option>\n' +
                '\n' +
                '                                        @foreach ($shipping_methods->where('parent_id', 0) as $value)' +
                '                                            @if(LaravelLocalization::setLocale()=='ar')' +
                '                                            @if($value->children->count()==0)' +
                '                                            <option value="{{ $value->id }}">' +
                '                                                {{ $value->title_ar }}' +
                '                                            </option>' +
                '                                           @endif' +
                '                                        @if($value->children->count()) <!-- if has children -->' +
                '                                            <optgroup label="{{$value->title_ar}}">' +
                '                                                @foreach($value->children as $child)' +
                '                                                    <option value="{{ $child->id }}">' +
                '                                                       -- {{ $child -> title_ar }}' +
                '                                                    </option>' +
                '                                                @endforeach' +
                '                                            </optgroup>' +
                '                                            @endif' +
                '                                            @else' +
                '                                                @if($value->children->count()==0)' +
                '                                                    <option value="{{ $value->id }}">' +
                '                                                        {{ $value->title_en }}' +
                '                                                    </option>' +
                '                                                @endif\n' +
                '                                                @if($value->children->count()) <!-- if has children -->' +
                '                                                <optgroup label="{{$value->title_en}}"> ' +
                '                                                    @foreach($value->children as $child)' +
                '                                                        <option value="{{ $child->id }}">' +
                '                                                            -- {{ $child -> title_en }}' +
                '                                                        </option>' +
                '                                                    @endforeach' +
                '                                                </optgroup>' +
                '                                                @endif' +
                '\n' +
                '                                                @endif' +
                '                                            @endforeach' +
                '                                        </select> </td>'+
                '<td>' +
                '<select class="form-control" id="currency_id" name="addmore['+i+'][currency_id]">'+
                '<option>{{__('company/config.zones_prices.currencyType')}}</option>'+
                '@foreach($currencies as $curr)'+
                '<option value="{{$curr->id}}">'+
                '{{$curr->name}}'+
                '</option>'+
                '@endforeach'+
                '</select></td>' +
                '<td> <input type="text" class="form-control" id="price" name="addmore['+i+'][price]" placeholder="{{__('company/config.zones_prices.price')}}"></td>'+
                '<td><button type="button" class="btn btn-danger remove-tr">{{__('company/config.zones_prices.remove')}}</button></td></tr>');
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

{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
    <!-- Latest compiled and minified CSS -->

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">--}}

{{--@include('company.zones_prices.newRow')--}}

    <!-- apps -->



@endpush
