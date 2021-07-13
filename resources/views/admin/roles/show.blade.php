@extends('layouts.admin.app')

@section('content')

<div class="row ">
    <div class="col-md-6">
      <div class="card shadow-base bd-0 overflow-hidden">

            <div class="card-header">
                    <a  class="btn btn-secondary pull-left" href="{{ route('manage.roles.index') }}">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>

                    <h5 class="card-title mt-2">{{ __('admin/role.title.show.value') }}</h5>
                    <p class="card-subtitle">{{ __('admin/role.title.show.sub_value') }}</p>


                      </div>

              <div class="card-body">
                <p class="card-text">


                        <div class="form-group">
                            <label for="name">{{ __('admin/role.fileds.title') }}</label>
                            <input type="text" name="name" disabled  value="{{$role->name}}" class="form-control" >
                        </div>


                        <div class="form-group">
                                <label for="name">{{ __('admin/role.fileds.permission') }}</label>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <label><span class="badge badge-danger tx-14">{{ $v->label }}</span></label>
                                    @endforeach
                                @endif
                             </div>


                </p>

          </div>
      </div>
    </div>


</div>
</div>


@stop

