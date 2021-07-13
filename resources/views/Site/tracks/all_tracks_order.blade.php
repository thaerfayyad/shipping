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
                        <br><br><br>
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">

                                <thead style="color: #0b0b0b;font-size: 15px">
                                <tr>

                                    <th>{{__('company/config.track.id')}}</th>
                                    <th>{{__('company/config.track.locations')}}</th>
                                    <th>{{__('company/config.track.latitude')}}</th>
                                    <th>{{__('company/config.track.longitude')}}</th>
                                    <th>{{__('company/config.track.created_at')}}</th>
                                    
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($tracks as $key => $val)
                                    <tr>

                                        <td>{{$key+1}}</td>

                                        <td>{{$val->current_location}}</td>
                                        <td>{{$val->latitude}}</td>
                                
                                        <td>{{$val->longitude}}</td>
                                        <td>{{$val->created_at}}</td>
                                        


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
