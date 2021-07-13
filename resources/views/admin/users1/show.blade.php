@extends('layouts.admin.app')
<style type="text/css">
   .help-block{
      color: red !important;}
</style>
@section('content')
@if( $user->hasAnyPermission(['member']) && isset($user->UserInfo))
<form method="POST" enctype="multipart/form-data" novalidate id="wizardForm"  action="{{ route('manage.users.update', $user->UserID) }}">
   {{method_field('PATCH')}}
   @csrf
   <div class="row ">
      <div class="col-md-12">
         <div class="card shadow-base bd-0 overflow-hidden">
            <div class="card-header">
               <a  class="btn btn-secondary pull-left" href="{{ route('manage.users.index') }}">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>
               <h5 class="card-title mt-2">{{ __('admin/users.title.show.value') }}</h5>
               <p class="card-subtitle">{{ __('admin/users.title.show.sub_value') }}</p>
            </div>
            <div class="card-body">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ __('userInfo.wizard.basic_info') }} </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> {{ __('custom.organization_activity') }}</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">{{ __('custom.coordinator_info') }} </a>
                    </div>
                </nav>
{{--                <div class="tab-content mt-3" id="nav-tabContent">--}}
{{--                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">@include('member.info.step1')</div>--}}
{{--                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">@include('member.info.step2')</div>--}}
{{--                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">@include('member.info.step3')</div>--}}
{{--                </div>--}}




            </div>
         </div>
      </div>
   </div>
</form>
@else
<div class="row mt-5">
   <div class="col-md-6">
      <div class="card shadow-base bd-0 overflow-hidden">
         <div class="card-header">
            <a  class="btn btn-secondary pull-left" href="{{ route('manage.users.index') }}">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>
            <h5 class="card-title mt-2">{{ __('admin/users.title.show.value') }}</h5>
            <p class="card-subtitle">{{ __('admin/users.title.show.sub_value') }}</p>
         </div>
         <div class="card-body">
            <p class="card-text">
            <div class="form-group">
               <label for="name">{{ __('config.name') }}</label>
               <input type="text" name="name"  value="{{$user->name}}" class="form-control" disabled>
            </div>
            <div class="form-group">
               <label for="name">{{ __('config.email') }}</label>
               <input type="text" name="email"  value="{{$user->email}}" class="form-control" disabled>
            </div>
            <div class="form-group">
               <label for="name">{{ __('config.groups') }}</label>
               @if(!empty($user->getRoleNames()))
               @foreach($user->getRoleNames() as $v)
               <label><span class="badge badge-danger tx-14">{{ $v }}</span></label>
               @endforeach
               @endif
            </div>
            @if(empty($user->UserInfo))
            <form method="POST"   action="{{ route('manage.users.update', $user->UserID) }}">
               {{method_field('PATCH')}}
               @csrf
               <div class="form-group">
                  <label for="notes"  class="form-label">  ملاحظات  </label>
                  <textarea  class="form-control" name="notes" id="notes" cols="30" rows="10">{{isset($user->UserInfo->notes) ? $user->UserInfo->notes : old('notes')}}</textarea>
                  <div class="help-block with-errors"></div>
               </div>
               <input type="submit" name="forceApprove"  value='حفظ واعتماد' class="btn btn-danger pull-left ml-2" >
               <input type="submit" name="forceSaveWithoutApprove"  value='حفظ' class="btn btn-danger pull-left ml-2" >
               <input type="submit" name="reject"  value='* رفض العضوية' class="btn btn-danger pull-left ml-2" >
               <div class="form-group">
                  <label for="hint" class="form-label text-danger">
                  <u>
                  تلميح : عند الضغط على  <b>زر رفض العضوية</b>
                  سيتم
                  إرسال رسالة للعضو بالتالي
                  </u><br>
                  <q>
                  نأسف لعدم قبول طلبك حيث لا يسمح للأفراد بالتسجيل بصفة شخصية ، التسجيل للجمعيات و المنظمات الرسمية فقط ، بإمكانك الدخول على حسابك الشخصي و تعديل بيانات الاسم الى اسم جهة رسمية ، أو تسجيل حساب جديد بإسم الجهة
                  </q>
                  </label>
               </div>
            </form>
            @endif
            </p>
         </div>
      </div>
   </div>
</div>

@endif
@endsection
@push('style')
<link href="{{ asset('website/plugins/SmartWizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('website/plugins/SmartWizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('website/css/build.css')}}">
@endpush
@push('script')
<script src="{{ asset('website/js/validator.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('website/plugins/SmartWizard/dist/js/jquery.smartWizard.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
@include('member.info.smartwizard')
@endpush
