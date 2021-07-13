@extends('layouts.admin.app')
@section('content')
<div class="row">
   <div class="col-lg-12 col-xl-12">
      <div class="card widget-6">
         <div class="card-header">
            <div class=" align-items-center">
               <span class="card-title">{{ __('admin/users.title.list.value') }} </span> <br/>
               <span class="card-subtitle"> {{ __('admin/users.title.list.sub_value') }}</span>
            </div>
            <!--  -->
            <span class="tx-12">
               <a href="{{ route('manage.users.create') }}" class="btn btn-primary btn-with-icon">
                  <div class="ht-40 justify-content-between">
                     <span class="pd-x-15">{{ __('config.create') }}</span>
                     <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                  </div>
               </a>
            </span>
         </div>
         <!-- card-header -->
         <div class="card-body pd-25">
            <div class="table-wrapper">
               <table  class="table table-striped table-bordered nowrap datatable" style="width:100%">


                  <thead>
                     <tr>
                        <th class="wd-5p">{{ __('config.id') }} / {{ __('config.action') }}</th>
                        <th class="wd-15p">{{ __('custom.membership_id') }}</th>
                        <th class="wd-15p">{{ __('config.name') }}</th>

                        <th class="wd-15p">رقم الجوال</th>
<th class="wd-15p">الدولة</th>
<th class="wd-15p">المدينة</th>
                        <th class="wd-15p">الأحداث</th>
                        <th class="wd-15p">اعتماد</th>
                        <th class="wd-15p">{{ __('config.email') }}</th>
                        <th class="wd-15p">{{ __('config.groups') }}</th>
 <th class="wd-15p">النشاط</th>
 <th class="wd-15p">الكيان القانوني</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $key => $user)
                     <tr>
                        <td>
                           {{ $key + 1 }}
                           <!-- show the slider (uses the show method found at GET /admin/userss/{id} -->
                           <a class="mr-1 btn btn-success btn-icon" href="{{ route('manage.users.show',$user->UserID) }}">
                              <div class=" tx-white"> <i class="fa fa-eye"> </i> </div>
                           </a>
                           <!-- edit this slider (uses the edit method found at GET /admin/userss/{id}/edit -->
                           <a class="mr-1 btn btn-info btn-icon" href="{{ route('manage.users.edit',$user->UserID) }}">
                              <div class=" tx-white"> <i class="fa fa-edit"> </i> </div>
                           </a>
                           <!-- delete the slider (uses the destroy method DESTROY /admin/userss/{id} -->
                           <!-- we will add this later since its a little more complicated than the first two buttons -->
                           <a class='remove-record btn btn-danger btn-icon'
                              data-toggle='modal'
                              data-url= "{{route('manage.users.destroy',$user->UserID)}}"
                              data-id='{{$user->id}}'
                              data-target='#custom-width-modal'>
                              <div class=" tx-white"> <i class="fa fa-trash"></i> </div>
                           </a>
                        </td>
                        <td>{{ $user->name }}</td>

   <td> @if(!empty($user->UserInfo)) {{ $user->UserInfo->mobile}} @else  @endif</td>
   <td> @if(!empty($user->UserInfo)) {{ $user->UserInfo->country->country_name_ar}} @else  @endif</td>
   <td> @if(!empty($user->UserInfo)) {{ $user->UserInfo->city}} @else  @endif</td>
                         <td>
                           @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    @if($v == 'member')
                                        @if( isset($user->UserInfo) && $user->UserInfo->status == '0')
                                        <a class="mr-1 btn btn-sm btn-danger" href="{{ route('manage.users.show',$user->UserID) }}">
                                            <div class=" tx-white"> اعتماد </div>
                                        </a>

                                         <a class="mr-1 btn btn-sm btn-danger" href="{{ route('admin.notify.not-completed',$user->UserID) }}">
                                            <div class=" tx-white"> اكمال</div>
                                        </a>

                                        @elseif( isset($user->UserInfo) && $user->UserInfo->status == '1')
                                        <a class="mr-1 btn btn-sm btn-success" href="{{ route('manage.users.show',$user->UserID) }}">
                                            <div class=" tx-white"> معتمد</div>
                                        </a>

                                        @elseif( isset($user->UserInfo) && $user->UserInfo->status == '2')
                                        <a class="mr-1 btn btn-sm btn-danger" href="{{ route('manage.users.show',$user->UserID) }}">
                                            <div class=" tx-white">العضوية مرفوضة</div>
                                        </a>
                                        @else
                                        <a class="mr-1 btn btn-sm btn-danger" href="{{ route('manage.users.show',$user->UserID) }}">
                                            <div class=" tx-white"> لا يوجد معلومات </div>
                                        </a>

                                         <a class="mr-1 btn btn-sm btn-danger" href="{{ route('admin.notify.not-completed',$user->UserID) }}">
                                            <div class=" tx-white"> اكمال</div>
                                        </a>

                                        @endif
                                    @else
                                    -
                                    @endif
                                @endforeach
                           @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                           @if(!empty($user->getRoleNames()))
                           @foreach($user->getRoleNames() as $v)
                           <label class="badge badge-success tx-12">{{ $v }}</label>
                           @endforeach
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- table-wrapper -->
         </div>
         <!-- card-body -->
      </div>
      <!-- card -->
   </div>
</div>
{{--@include('admin.modal.delete')--}}
@stop
@push('script')
@include('admin.datatable')


<script type="text/javascript">
  $(document).ready(function () {

    });
</script>


@endpush
