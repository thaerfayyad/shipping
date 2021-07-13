@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('member/config.edit')}}</h4>
                    </div>
                    <hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('services.update',$service->id)}}">
                       {{method_field('PATCH')}}
                       @csrf

                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('admin/service.create.title')}}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$service->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('admin/service.create.label')}}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" name="label" value="{{$service->label}}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('admin/service.create.des_ar')}}</label>
                                        <div class="col-sm-9">
                                            <textarea name="des_ar" id="" cols="40" rows="3" >{{$service->des_en}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">{{__('admin/service.create.des_en')}}</label>
                                        <div class="col-sm-9">
                                            <textarea name="des_en" id="" cols="40" rows="3" >{{$service->des_en}}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        <label for="avatar" class="col-sm-3 text-right control-label col-form-label">{{__('admin/service.create.edit_img')}}</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control-file" name="img" id="avatarFile" aria-describedby="fileHelp" vau >
                                            <br><br>
                                            <img src="{{asset('storage/img/'.$service->img)}}"  alt="{{$service->title}}" class="rounded-circle" width="250" height="250">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">{{__('config.save')}}</button>
                                    <a href="" class="btn btn-dark waves-effect waves-light">{{__('config.cancel')}}</a>
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



    </script>

@endpush
