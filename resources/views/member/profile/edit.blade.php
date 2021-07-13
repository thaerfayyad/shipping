@extends('layouts.app')

@section('content')
      <!-- Breadcroumbs start -->
       @if (Session::has('success'))
                                        <div class="alert alert-success alert-rounded text-center">{{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                    @endif
  <div class="wshipping-content-block wshipping-breadcroumb inner-bg-1">
    <div class="container">
      <div class="row">
       <!--  <div class="col-12 col-lg-7">
          <h1>{{__('website/config.profile')}}</h1>
          <a href="index.html" title="Home">Home</a> / Contact Us </div> -->
        <!-- <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div> -->
      </div>

    </div>
  </div>
  <!-- Breadcroumbs end --> 
  
  <!-- Contact Start -->
  <div class="wshipping-content-block" >
    <div class="container" style="background-color: #f7f7f7;padding: 50px">
      <div class="row flex-lg-row-reverse">
        <div class="col-12 col-lg-4">
          <div class="address">
           
            <div class="address-block">
              <ul>
                <li class="address-icon"><strong>{{__('website/config.address')}}:</strong><br>
                 {{\Auth::user()->UserInfo->address}}.</li>
                <li class="phone-icon"><strong>{{__('website/config.mobile')}}:</strong><br>
                  {{\Auth::user()->UserInfo->mobile}}</li>
            
                <li class="email-icon"><strong>{{__('website/config.EmailAddress')}}:</strong><br>
                  <a href="mailto:{{\Auth::user()->email}}" title="">{{\Auth::user()->email}}</a></li>
              </ul>
            </div>
          </div>
         
        </div>

        <div class="col-12 col-lg-8">
          <div class="contact-text">
           <!--  <h3>We are Always with <span>you :)</span></h3> -->
            <img src="{{asset('storage/avatars/')}}/{{\Auth::user()->UserInfo->avatar}}" width="210px" height="210px" alt=""/> 
            <br> <br> 
        </div>
         <form method="POST" class="form-horizontal form-material" enctype="multipart/form-data"  action="{{route('profile.update', \Auth::user()->UserID) }}">
                        {{method_field('PATCH')}}
                        @csrf
                          <input type="hidden" class="form-control" placeholder="" value="{{\Auth::user()->UserID}}" name="UserID">
         <div class="col-12">
        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">{{__('config.avatarText')}}</small>
                                            </div>
          <div class="contact-form">
            <h3 class="heading3-border text-uppercase">{{__('website/config.profile')}}</h3>
            
              <div class="form-group">
                <div class="row">
                  <div class="col-12 col-lg-6">
                      <label class="">{{__('website/config.FullName')}}:</label>
                    <input type="text" class="form-control" placeholder="" value="{{\Auth::user()->name}}" name="name">
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="example-email" class="">{{__('website/config.EmailAddress')}}:</label>
                    <input type="email" class="form-control" placeholder="" value="{{\Auth::user()->email}}" name="email">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-12 col-lg-6">
                     <label class="">{{__('website/config.mobile')}}:</label>
                    <input type="text" class="form-control" placeholder="" value="{{\Auth::user()->UserInfo->mobile}}" name="mobile">
                  </div>
                  <div class="col-12 col-lg-6">
                     <label class="">{{__('website/config.address')}}:</label>
                    <input type="text" class="form-control" placeholder="" value="{{\Auth::user()->UserInfo->address}}" name="address">
                  </div>
                </div>
              </div>
           <div class="form-group">
                <div class="row">
                  <div class="col-12 col-lg-6">
                 <label class="col-sm-12">{{__('config.country')}}:</label>
                      
                            
                                            <select class="select2 form-control select_country" name="country_id" id="select_country" style="width: 100%; height:36px;" required=""> 
                                              
                                            
                                              @php $cou=old('country_id',\Auth::user()->userInfo()->first()->country()->first()->id); @endphp
                                             
                                    @foreach($countries as $country)
                                                    @if ($cou == $country->id)
                                                        <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                                    @else
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endif

                                                @endforeach
                                           
    
                                </select>

                  </div>
                  <div class="col-12 col-lg-6">
                  <label class="">{{__('website/config.city')}}:</label>
                  
                         <select class="select2 form-control custom-select cities" name="city_id" id="cities" style="width: 100%; height:36px;"> 
                         
                                               <option selected disabled value="0" >
                                                
                                               </option>
                                </select>
                                
                                </select>
                  
                
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <label class="">{{__('website/config.facebook')}}:</label>
                    <input type="text" class="form-control" placeholder="" value="{{\Auth::user()->UserInfo->facebook}}" name="facebook">
                  </div>
                  <div class="col-12 col-lg-6">
                    <label class="">{{__('website/config.twitter')}}:</label>
                    <input type="text" class="form-control" placeholder="" value="{{\Auth::user()->UserInfo->twitter}}" name="twitter">
                  </div>
                </div>
              </div>
             <!--  <div class="form-group">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div> -->
              <div class="form-group">
                <button type="submit" class="btn btn-submit" >{{__('website/config.Update Profile')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact end --> 

@endsection
@push('style')
 <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">

@endpush
@push('script')

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
    url: '/getCities/',
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
 });
    </script>
@endpush
