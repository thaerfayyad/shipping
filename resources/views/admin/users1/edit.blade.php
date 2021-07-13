@extends('layouts.admin.app')
@section('content')
<div class="row ">
   <div class="col-md-6">
      <div class="card shadow-base bd-0 overflow-hidden">
         <div class="card-header">
            <a  class="btn btn-secondary pull-left" href="{{ route('manage.users.index') }}">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>
            <h5 class="card-title mt-2">{{ __('admin/users.title.edit.value') }}</h5>
            <p class="card-subtitle">{{ __('admin/users.title.edit.sub_value') }}</p>
         </div>
         <div class="card-body">
            <p class="card-text">
            <form method="POST"   action="{{ route('manage.users.update', $user->id) }}">
               {{method_field('PATCH')}}
               @csrf
               <div class="form-group">
                  <label for="name">{{ __('config.name') }}<span class="tx-danger">*</span></label>
                  <input type="text" name="name"  value="{{$user->name}}" class="form-control" >
               </div>
               <div class="form-group">
                  <label for="name">{{ __('config.email') }}<span class="tx-danger">*</span></label>
                  <input type="text" name="email"  value="{{$user->email}}" class="form-control" >
               </div>
               <div class="form-group">
                  <label for="name">{{ __('config.password') }}</label>
                  <input type="password" name="password"   class="form-control" >
               </div>
               <div class="form-group">
                  <label for="name">{{ __('config.confirm_password') }}</label>
                  <input type="password" name="password_confirmation"  value="" class="form-control" >
               </div>
               <div class="form-group">
                  <label for="name">{{ __('config.groups') }}<span class="tx-danger">*</span></label>
                  @foreach($roles as $key => $value)
                  <label class="ckbox">
                  <input name="roles[]" value="{{$key}}"  @if(in_array($value, $userRole)) checked @endif  type="checkbox" ><span>   {{ $value }}</span>
                  </label>
                  @endforeach
               </div>
               <div class="form-group" id="select2CountryParent">
                <label for="country"  class="form-label"> {{ __('admin/event.fileds.country') }} </label>
                <select id="country" name="country" class="form-control countrySelect"  required>
                        <option value="{{$user->UserInfo->country->country_code}}" selected="selected">{{$user->UserInfo->country->country_name_ar}}</option>
                </select>
                <div class="invalid-feedback">{{__('config.required')}}</div>
              </div>

               </p>
               <div class="form-group pull-left">
                  <button type="reset" class="btn btn-secondary" >{{ __('config.cancel') }} <i class="icon ion-android-cancel"> </i>  </button>
                  <button type="submit" class="btn btn-primary" >{{ __('config.edit') }} <i class="icon ion-edit"> </i>  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
@stop


@push('script')
<script>

$(document).ready(function() {
            var parentElement = $("#select2CountryParent");

           var isoCountries =  $.get( "{{URL::to('/api/countries')}}");

           function formatCountry (country) {
             if (!country.id) { return country.text; }
             var $country = $(
               '<span class="flag-icon flag-icon-'+ country.id.toLowerCase() +' flag-icon-squared"></span>' +
               '<span class="flag-text">'+ country.text+"</span>"
             );
             return $country;
           };

           $(".countrySelect").select2({
                dir: "rtl",
                width:"100%",
                dropdownParent: parentElement,
                ajax: {
                url: "{{URL::to('/api/countries')}}",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
                },
                processResults: function (response) {
                    return {
                    results: response
                    };
                },
                cache: true
                },
                placeholder: "{{__('config.select_country')}}",
                templateResult: formatCountry,
                });
        });
</script>
@endpush
