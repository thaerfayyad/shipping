@extends('layouts.admin.app')


@section('content')

<div class="row ">
   <div class="col-md-6">
      <div class="card shadow-base bd-0 overflow-hidden">
         <div class="card-header">
            <a  class="btn btn-secondary pull-left" href="{{ route('manage.roles.index') }}">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>

            <h5 class="card-title mt-2">{{ __('admin/role.title.insert.value') }}</h5>
            <p class="card-subtitle">{{ __('admin/role.title.insert.sub_value') }}</p>
         </div>
         <div class="card-body">
            <p class="card-text">
            <form method="POST" enctype="multipart/form-data" action="{{ route('manage.roles.store') }}">
            @csrf
            <div class="form-group">
               <label for="name">{{ __('admin/slider.fileds.title') }}<span class="tx-danger">*</span></label>
               <input type="text" name="name"  class="form-control"  value="{{old('name')}}" required >
            </div>

            <div class="form-group">
               <label for="name">{{ __('admin/role.fileds.permission') }}<span class="tx-danger">*</span></label>
                @foreach($permission as $value)
                    <label class="ckbox">
                        <input name="permission[]" value="{{$value->id}}" id="published" type="checkbox" ><span>   {{ $value->label }}</span>
                    </label>
                @endforeach
            </div>
            </p>

            <div class="form-group pull-left">
                    <button type="reset" class="btn btn-secondary" >{{ __('config.cancel') }} <i class="icon ion-android-cancel"> </i>  </button>
                    <button type="submit" class="btn btn-primary" >{{ __('config.save') }} <i class="icon ion-plus"> </i>  </button>
                </div>

         </div>
      </div>
   </div>
</div>




@endsection
