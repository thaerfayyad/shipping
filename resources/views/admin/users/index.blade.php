@extends('layouts.admin.app')

@section('content')

     


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ __('admin/request.user.title') }}</h2>

                        <div class="table-responsive">


                            <table id="file_export" class="table table-striped table-bordered display">

                                <thead >

                                <tr>

                                    <th>{{@__('admin/request.user.id')}}</th>
                                
                                    <th>{{@__('admin/request.user.name')}}</th>
                                    <th>{{@__('admin/request.user.role')}}</th>
                                    <th>{{@__('admin/request.user.status')}}</th>


                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($users as $key => $val)
                                @if( $val->UserInfo->role->name != 'admin')
                                    <tr>
                       
                                        <td>{{$key+=1}}</td>
                                        
                                        <td>{{$val->name}}</td>
                                        <td>
                                        @if(LaravelLocalization::setLocale()=='ar')
                                            {{$val->UserInfo->role->label}}
                                            @else

                                          {{  $val->UserInfo->role->name}}

                                            @endif
                                                  </td>


                                        <td>

                              @if($val->active == 0)
                                            <input type="hidden" id="txt-{{$val->UserID}}"  value="{{ $val->active }}">
                                            <button id="btn-{{$val->UserID}}" class="btn btn-sm {{$val->active==0 ?'btn-danger':'btn-success'}}"  onclick="activeUser({{$val->UserID}})">{{$val->active==1?'تم القبول':'قيد الانتظار'}}</button>
 
                                            @else
                                            <button disabled="disabled" class="btn btn-sm {{$val->active==0 ?'btn-danger':'btn-success'}}" style="color: #000">{{$val->active==1?'تم القبول':'قيد الانتظار'}}</button>
                                        </td>
                             @endif


                                    </tr>
                                    @endif
                                 
                                @endforeach
                                <script src="">
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                </script>




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

    <script>
        $(document).ready(function() {
            // alert("hhhhhhhh");
            // $().change(function() {
            //     var active = $(this).prop('checked') == true ? 1 : 0;
            //     var UserID = $(this).data('id');
            //      alert(active);
            //     $.ajax({
            //         type: "GET",
            //         dataType: "json",
            //         url: '/changeStatus',
            //         data: {'active': active, 'UserID': UserID},
            //         success: function(data){
            //             console.log(data.success)
            //         }
            //     });
            // })
        })
        function activeUser(id) {
            var url='{{URL::to(LaravelLocalization::setLocale().'/admin/changeStatus')}}';

            // alert(url);
            var active =$('#txt-'+id).val();
            var activate=0;
            if(active==0){
                activate=1;
            }if(active==1){
                activate=0;

            }
            var UserID = id;
             // alert(activate);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                data: {active: activate, id: UserID},

                success: function(data){
                    // alert(data);
                    // alert("Success !");
                    location.reload();

                      if(data.user.active==0)  {
                          $('#btn-'+id).removeClass('btn-danger').addClass( "btn-success" );

                  }else{
                      $('#btn-'+id).removeClass('btn-success').addClass( "btn-danger" );

                  }

                 }
            });

        }
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
    {{--                ajax: '{!! route('admin.packages.data') !!}',--}}
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
