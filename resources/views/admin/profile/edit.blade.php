@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
                              @if (Session::has('success'))
                                        <div class="alert alert-success alert-rounded text-center">{{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                    @endif


        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{asset('storage/avatars/')}}/{{\Auth::user()->UserInfo->avatar}}" class="rounded-circle" width="150" />
                           
                            <h4 class="card-title m-t-10">{{\Auth::user()->name}}</h4>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">{{__('admin/config.EmailAddress')}}</small>
                        <h6>{{\Auth::user()->email}}</h6> <small class="text-muted p-t-30 db">{{__('admin/config.mobile')}}</small>
                        <h6>{{$user->UserInfo->mobile}}</h6> <small class="text-muted p-t-30 db">{{__('admin/config.address')}}</small>
                        <h6>{{$user->UserInfo->address}}</h6>
                        <small class="text-muted p-t-30 db">{{__('admin/config.Social Profile')}}</small>
                        <br/>
                        <a  href="{{$user->UserInfo->facebook}}" class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$user->UserInfo->twitter}}" class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></a>
                       
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tabs -->
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                      
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">{{__('admin/config.Profile')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{__('admin/config.Setting')}}</a>
                        </li>
                    </ul>
                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('admin/config.FullName')}}</strong>
                                        <br>
                                        <p class="text-muted">{{\Auth::user()->name}}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('admin/config.mobile')}}</strong>
                                        <br>
                                        <p class="text-muted">{{$user->UserInfo->mobile}}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('admin/config.EmailAddress')}}</strong>
                                        <br>
                                        <p class="text-muted">{{\Auth::user()->email}}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>{{__('admin/config.address')}}</strong>
                                        <br>
                                        <p class="text-muted">{{$user->UserInfo->address}}</p>
                                    </div>
                                </div>
                                <hr>
                                <h4>{{__('admin/config.about')}}</h4>
                                <p class="m-t-30">{{$user->UserInfo->about}}.</p>
                    
                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                         <form method="POST" class="form-horizontal form-material" enctype="multipart/form-data"  action="{{route('profile.update', \Auth::user()->UserID) }}">
                        {{method_field('PATCH')}}
                        @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">{{__('admin/config.FullName')}}</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" class="form-control form-control-line" value="{{\Auth::user()->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">{{__('admin/config.EmailAddress')}}</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="" value="{{$user->email}}" class="form-control form-control-line" name="email" id="email">
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label class="col-md-12">{{__('admin/config.mobile')}}</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{$user->UserInfo->mobile}}" class="form-control form-control-line" name="mobile" id="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">{{__('admin/config.about')}}</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="about" id="about">{{$user->UserInfo->about}}</textarea>
                                        </div>
                                    </div>


                        
                                    <div class="form-group">
                                        <label class="col-md-12">{{__('admin/config.address')}}</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{$user->UserInfo->address}}" class="form-control form-control-line" name="address" id="address">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">{{__('company/config.country')}}</label>
                                        <div class="col-sm-12">
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
                                    </div>
                                      <div class="form-group">
                                        <label class="col-sm-12">{{__('company/config.city')}}</label>
                                        <div class="col-sm-12">
                                             <select class="select2 form-control custom-select cities" name="city_id" id="cities" style="width: 100%; height:36px;"> 
                         
                                               <option selected disabled value="0" >
                                                
                                               </option>
                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">{{__('admin/config.facebook')}}</label>
                                        <div class="col-sm-12">
                                             <input type="text" value="{{$user->UserInfo->facebook}}" class="form-control form-control-line" name="facebook" id="facebook">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">{{__('admin/config.twitter')}}</label>
                                        <div class="col-sm-12">
                                             <input type="text" value="{{$user->UserInfo->twitter}}" class="form-control form-control-line" name="twitter" id="twitter">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">{{__('config.avatar')}}</label>
                                        <div class="col-sm-12">
                                              <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">{{__('config.avatarText')}}</small>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">{{__('admin/config.Update Profile')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>


@endsection
@push('style')
 <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">

@endpush
@push('script')

 <script type="text/javascript">
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
