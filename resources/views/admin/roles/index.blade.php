@extends('layouts.admin.app')

@section('content')

<div class="row">
<div class="col-lg-12 col-xl-12">
            <div class="card widget-6">
              <div class="card-header">
                <div class=" align-items-center">

                    <span class="card-title">{{ __('admin/role.title.list.value') }} </span> <br/>
                    <span class="card-subtitle"> {{ __('admin/role.title.list.sub_value') }}</span>

                </div><!--  -->
                <span class="tx-12">
                  <a href="{{ route('manage.roles.create') }}" class="btn btn-primary btn-with-icon">
                        <div class="ht-40 justify-content-between">
                          <span class="pd-x-15">{{ __('config.create') }}</span>
                          <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                        </div>
                      </a>
                </span>
              </div><!-- card-header -->
              <div class="card-body pd-25">


        <div class="table-wrapper">
                <table  class="datatable table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">{{ __('config.id') }} / {{ __('config.action') }} </th>
                      <th class="wd-15p">{{ __('admin/role.fileds.title') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                          @foreach($roles as $key => $value)
                          <tr>
                              <td>{{ $value->id }}




                                <!-- show the slider (uses the show method found at GET /admin/sliders/{id} -->
                                <a class="btn btn-success btn-icon" href="{{ route('manage.roles.show',$value->id) }}"><div class=" tx-white"> <i class="fa fa-eye"> </i> </div </a>

                                    @can('role-edit_1')
                                     <!-- edit this slider (uses the edit method found at GET /admin/sliders/{id}/edit -->
                                     <a class="mr-1 btn btn-info btn-icon" href="{{ route('manage.roles.edit',$value->id) }}"> <div class=" tx-white"> <i class="fa fa-edit"> </i> </div></a>
                                     @endcan


                                     @can('role-delete_1')
                                        <!-- delete the slider (uses the destroy method DESTROY /admin/sliders/{id} -->
                                     <!-- we will add this later since its a little more complicated than the first two buttons -->
                                     <a class='remove-record btn btn-danger btn-icon'
                                     data-toggle='modal'
                                     data-url= "{{route('manage.roles.destroy',$value->id)}}"
                                     data-id='{{$value->id}}'
                                     data-target='#custom-width-modal'> <div class=" tx-white"> <i class="fa fa-trash"></i> </div>
                                   </a>
                                   @endcan
                                </td>
                              <td>{{ $value->name }}</td>

                          </tr>
                      @endforeach

                  </tbody>
                </table>
              </div><!-- table-wrapper -->

                </div><!-- card-body -->


              </div><!-- card -->
            </div>
            </div>


@include('admin.modal.delete')
@stop

@push('script')
    @include('admin.datatable')
@endpush
