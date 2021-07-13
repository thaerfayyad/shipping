@extends('layouts.app')

@section('content')
 @if(Auth::guest()) 

 <!-- Breadcroumbs start -->
  <div class="wshipping-content-block wshipping-breadcroumb inner-bg-1">
    <div class="container">
      <div class="row">
         <!-- <div class="col-12 col-lg-7">
            <h1>{{__('website/config.login')}}</h1>
            <a href="index.html" title="Home">Home</a> / Login
         </div> -->
         <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
      </div>
    </div>
  </div>
  <!-- Breadcroumbs end -->
 <!-- Customer Registration Start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="customer-login">
        <div class="row">
         <div class="col-12 col-md-6 col-lg-6">
            <div class="customer-login-left">
               <div class="login-icon"><i class="fa fa-unlock-alt"></i></div>
               <h4>{{__('website/config.WelcomeToNewAccount')}}</h4>
               <p>{{__('website/config.description1')}} <a href="{{route('login')}}">{{__('website/config.loginToAccount')}}</a></p>
               
            </div>
         </div>

         <div class="col-12 col-md-6 col-lg-6">
            <div class="customer-login-block">
              <h2>{{__('website/config.Registration')}}</h2>
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.FullName')}}:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.EmailAddress')}}:</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                      </div>
                    </div>    
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label>{{__('website/config.mobile')}}:</label>
                        <input type="text" class="form-control wow tada  {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}"   pattern=".{2,}" required >
                         <p class="help-block wow tada" style="font-size: 15px">   {{ __('website/config.phone_hint') }}  </p>
                        @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.address')}}:</label>
                       <input type="text" class="form-control" name="address" required="" />
                      </div>
                    </div>    
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.country')}}:</label>
                        <select class="select2 form-control custom-select select_country" name="country_id" id="select_country" style="width: 100%; height:36px;" required=""> 
                                     <option selected disabled value="0" >{{__('website/config.choose')}}</option>
                                         @foreach ($countries as $key => $value)
                                        <option value="{{$key}}" > {{$value->name}} </option>
                                            @endforeach
    
                                </select>
                                 
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.city')}}:</label>

                        <select class="select2 form-control custom-select cities" name="city_id" id="cities" style="width: 100%; height:36px;"> 
                                 <option selected disabled value="0" >{{__('website/config.choose')}}</option>
                                </select>
                       
                      </div>
                    </div>    
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.password')}}:</label>
                       <input type="password" class="form-control wow tada  {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
                        <p class="help-block wow tada" style="font-size: 15px" >   {{ __('website/config.strog_password') }}  </p>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                       <label>{{__('website/config.confirmpassword')}}:</label>
                        <input type="password" class="form-control wow tada "  name="password_confirmation" required>
                       
                      </div>
                    </div>    
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                       
            <label>{{__('website/config.role')}}:</label>
                      <select class="select2 form-control custom-select" name="role_id" id="result" style="width: 100%; height:36px;"
                    required="">   
                        @foreach ($roles as $key => $value)
                                        <option value="{{$value->id}}" >
                                         @if(LaravelLocalization::setLocale()=='ar')
                                         {{$value->label}} 
                                        @else

                                         {{$value->name}} 
                                         @endif
                                     </option>
                         @endforeach
    
                                </select>

                      </div>
                      <div class="col-12 col-md-6 col-lg-6" id="register_no">
                        <label>{{__('website/config.register_no')}}:</label>
                        <input type="text" class="form-control wow tada "  name="register_no"  >

                      </div>
                    </div>    
                  </div>
        
        
                  <button type="submit" class="btn btn-submit">{{__('website/config.Registration')}}</button>

                </form> 
            </div> 
         </div>
       </div>       
     </div>
    </div>
  </div>
  <!-- Customer Registration end -->
@endif
@endsection
@push('style')
 <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">

@endpush
@push('script')
 <!-- <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script> -->
    <!-- <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script> -->
    <script type="text/javascript">
        // function getCities(id){
        //  console.log(id);         
        //     $.ajax(
        //         {
        //             url: '/getCities/' + id,
        //             type: 'get',
        //             dataType: "JSON",
        //             data: {
        //                 "id": id,
        //             },

        //             success: function (data){
        //                // console.log(data)
        //                 $("#cities").empty();

        //                 for (let i=0; i<data.cities.length; i++) {
        //                     $("#cities").append("<option value='"+data.cities[i].id+"'>"+data.cities[i].name+"</option>");
        //                 }

        //             }
        //         });

        // }
$(document).ready(function(){

$('#cities').select2({
  ajax: {
    url: 'getCities/',
    data: function (params) {
      var query = {
        search: params.term,
        page: params.page || 1,
        id: $('#select_country').val(),
      }
      // Query parameters will be ?search=[term]&page=[page]
      return query;
    },
    processResults: function (data, params) {
    //console.log(data.cities.data);
    //params.page = params.page || 1;
    var city_list = [];
    $.each(data.cities.data,function (index,item) {
      city_list.push({'id':item.id,'text':item.name});
    });
    console.log(city_list);
    return {
        results: city_list,
        pagination: {
            more: (data.cities.current_page < data.cities.last_page)
        }
    };
}
  },
  });
  $('#result').change(function(){
  if (this.value == 3){
    $('#register_no').show();
    
  }else{
    $('#register_no').hide();
  }
});
  });
    </script>
    
@endpush
