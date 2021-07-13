@extends('layouts.company.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('company/config.packages.edit')}}</h4>
                    </div>
                    <hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('packages.update',$package->id)}}">

                        {{method_field('PATCH')}}
                        @csrf
                        <div class="card-body">
                            @if(LaravelLocalization::setLocale()=='ar')
                            <div class="form-group row">
                                <label for="name_ar" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.name')}}</label>
                                <div class="col-sm-6">
                                    <input name="name_ar" type="text" class="form-control" id="name_ar" value="{{$package->name_ar}}">
                                </div>
                            </div>
                        @else

                            <div class="form-group row">
                                <label for="name_en" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.name_en')}}</label>
                                <div class="col-sm-6">
                                    <input name="name_en" type="text" class="form-control" id="name_en" value="{{$package->name_en}}">
                                </div>
                            </div>
                        @endif
                            <div class="form-group row">
                                <label for="length" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.length')}}</label>
                                <div class="col-sm-6">
                                    <input name="length" type="text" class="form-control" id="length" value="{{$package->length}}">
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="width" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.width')}}</label>
                                    <div class="col-sm-6">
                                        <input name="width" type="text" class="form-control" id="width" value="{{$package->width}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="height" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.height')}}</label>
                                    <div class="col-sm-6">
                                        <input name="height" type="text" class="form-control" id="height"  value="{{$package->height}}">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="weight" class="col-sm-2 text-right control-label col-form-label">{{__('company/config.packages.weight')}}</label>
                                <div class="col-sm-6">
                                    <input name="weight" type="text" class="form-control" id="weight"  value="{{$package->weight}}">
                                </div>
                            </div>



                        </div>

                        <hr>

                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.update')}}</button>
                                <a href="{{route('packages.index')}}" class="btn btn-dark waves-effect waves-light">{{__('config.cancel')}}</a>
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

{{--    <script>--}}
{{--        $(function () {--}}

{{--            pdfMake.fonts = {--}}
{{--                Arial: {--}}
{{--                    normal: 'arial.ttf',--}}
{{--                    bold: 'arialbd.ttf',--}}
{{--                    italics: 'ariali.ttf',--}}
{{--                    bolditalics: 'arialbi.ttf'--}}
{{--                },--}}
{{--                Roboto: {--}}
{{--                    normal: 'Amiri-Regular.ttf',--}}
{{--                    bold: 'Amiri-Regular.ttf',--}}
{{--                    italics: 'Amiri-Regular.ttf',--}}
{{--                    bolditalics: 'Roboto-MediumItalic.ttf'--}}
{{--                }--}}
{{--            };--}}


{{--            'use strict';--}}
{{--            var table = $('#file_export').DataTable({--}}
{{--                // stateSave: true,--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}



{{--                autoWidth: false,--}}
{{--                ajax: '{!! route('company.packages.data') !!}',--}}
{{--                columns: [{--}}
{{--                    data: 'action',--}}
{{--                    name: 'action',--}}
{{--                    width: "20%"--}}
{{--                },--}}
{{--                    {--}}
{{--                        data: 'PackageID',--}}
{{--                        name: 'PackageID',--}}
{{--                        width: "30%"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'name_ar',--}}
{{--                        name: 'name_ar',--}}
{{--                        width: "60%"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'length',--}}
{{--                        name: 'length',--}}
{{--                        width: "30%"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'width',--}}
{{--                        name: 'width',--}}
{{--                        width: "30%"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'height',--}}
{{--                        name: 'height',--}}
{{--                        width: "30%"--}}
{{--                    },--}}

{{--                ],--}}
{{--                "order": [--}}
{{--                    [1, "desc"]--}}
{{--                ],--}}

{{--                'columnDefs': [{--}}
{{--                    'targets': [0],--}}
{{--                    /* column index */--}}
{{--                    'orderable': false,--}}
{{--                    /* true or false */--}}
{{--                }],--}}

{{--                fixedColumns: {--}}
{{--                    leftColumns: 1--}}
{{--                },--}}
{{--                'bSortable': false,--}}
{{--                colReorder: true,--}}
{{--                dom: 'lBfrtip',--}}
{{--                "lengthMenu": [--}}
{{--                    [10, 25, 50, -1],--}}
{{--                    [10, 25, 50, "الكل"]--}}
{{--                ], // page length options--}}
{{--                buttons: [{--}}
{{--                    extend: 'excel',--}}
{{--                    text: 'تصدير اكسل',--}}
{{--                    exportOptions: {--}}
{{--                        modifier: {--}}
{{--                            // DataTables core--}}
{{--                            order: 'index', // 'current', 'applied', 'index',  'original'--}}
{{--                            page: 'all', // 'all',     'current'--}}
{{--                            search: 'none' // 'none',    'applied', 'removed'--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}


{{--                    {--}}
{{--                        extend: 'colvis',--}}
{{--                        text: 'تحديد الأعمدة',--}}
{{--                        exportOptions: {--}}
{{--                            columns: ':visible'--}}
{{--                        }--}}
{{--                    },--}}


{{--                    {--}}
{{--                        extend: 'print',--}}
{{--                        text: 'اطبع',--}}
{{--                        autoPrint: true,--}}

{{--                        customize: function (win) {--}}


{{--                            $(win.document.body).find('th').addClass('display').css('text-align', 'right');--}}
{{--                            $(win.document.body).find('table').addClass('display').css('font-size', '12px');--}}
{{--                            $(win.document.body).find('table').addClass('display').css('text-align', 'right');--}}
{{--                            $(win.document.body).find('tr:nth-child(odd) td').each(function (index) {--}}
{{--                                $(this).css('background-color', '#D0D0D0');--}}
{{--                            });--}}
{{--                            $(win.document.body).css('direction', 'rtl');--}}
{{--                            $(win.document.body).find('h1').css('text-align', 'center');--}}
{{--                            $(win.document.body).find('h1').css('font-size', '18px');--}}
{{--                        }--}}
{{--                    }--}}


{{--                ],--}}
{{--                language: {--}}
{{--                    "decimal": "",--}}
{{--                    "emptyTable": "{{__('config.datatable.emptyTable')}}",--}}
{{--                    "info": "{{__('config.datatable.info')}}",--}}
{{--                    "infoEmpty": "{{__('config.datatable.infoEmpty')}}",--}}
{{--                    "infoFiltered": "{{__('config.datatable.infoFiltered')}} ",--}}
{{--                    "infoPostFix": "",--}}
{{--                    "thousands": ",",--}}
{{--                    "lengthMenu": " _MENU_ {{__('config.datatable.show')}}",--}}
{{--                    "loadingRecords": "{{__('config.datatable.Loading')}}...",--}}
{{--                    "processing": "{{__('config.datatable.Processing')}}...",--}}
{{--                    "search": "{{__('config.datatable.Search')}}:",--}}
{{--                    "zeroRecords": "{{__('config.datatable.no_matching_records')}} ",--}}
{{--                    "paginate": {--}}
{{--                        "first": "{{__('config.datatable.First')}}",--}}
{{--                        "last": "{{__('config.datatable.Last')}}",--}}
{{--                        "next": "{{__('config.datatable.Next')}}",--}}
{{--                        "previous": "{{__('config.datatable.Previous')}}"--}}
{{--                    },--}}
{{--                    "aria": {--}}
{{--                        "sortAscending": ": {{__('config.datatable.sort_asc')}}",--}}
{{--                        "sortDescending": ": {{__('config.datatable.sort_desc')}}"--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}



{{--        });--}}
{{--    </script>--}}
@endpush
