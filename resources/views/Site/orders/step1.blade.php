
                        <fieldset>
 <h3 class="fs-subtitle">* {{__('website/shipping.required')}} </h3>
                            <div class="shipping-form">
                               
                                     <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('website/shipping.companies')}}<sup>*</sup></label>
                                        
                                             <select class="form-control select_country" name="CompanyID" id="select_country" onchange="getCountriesFrom(this.value)" 
                                   required=""> 
                                   <option>اختر</option>
                                
                                         @foreach ($companies as $key => $value)
                                        <option value="{{$value->CompanyID}}" > {{$value->userInfo->user->name}} </option>
                                            @endforeach
    
                                </select>
                                        </div>
                                    </div>
                                    
                                </div>
                       
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('website/shipping.country_from')}}<sup>*</sup></label>
                                    
                                             <select class="form-control" name="country_from" id="countries" onchange="getCountriesTo(this.value)" 
                                   required=""> 
                                    <option>اختر</option>
                                
    
                                </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label>{{__('website/shipping.country_to')}}<sup>*</sup></label>
                                        
                                             <select class="form-control select_country" name="country_to" 
                                             id="countriesTo" onchange="getPackageTypes(this.value)" 
                                    required="">
                                     <option>اختر</option> 
                                
                                  
    
                                </select>
                                        </div>
                                    </div>
                                </div>

                                  
                            </div>
{{--                            <h2 class="fs-title">How would like to pay? <a href="" title="" class="login-btn-form">Login</a></h2>--}}

                        </fieldset>


  <script type="text/javascript">
    
        function getCountriesFrom(id){
       //  console.log(id);         
            $.ajax(

                {
                    url: 'getCountriesFrom/' + id,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": id,
                    },

                    success: function (data){
                       // console.log(data)
                        $("#countries").empty();
                        $("#countries").append("<option >اختر</option");
                        for (let i=0; i<data.countries.length; i++) {
                            
                            $("#countries").append("<option value='"+data.countries[i].country_id_from +"'>"+data.countries[i].countries_from[0].name+"</option>");
                        }

                    }
                });

        }

         function getCountriesTo(id){
         console.log(id);         

            $.ajax(

                {
                    url: 'getCountriesTo/' + id,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": id,
                    },

                    success: function (data){
                        console.log(data)
                        $("#countriesTo").empty();
                    $("#countriesTo").append("<option >اختر</option");
                        for (let i=0; i<data.countries.length; i++) {
                            
                            $("#countriesTo").append("<option data-zone_id='"+data.countries[i].zone_id +"' value='"+data.countries[i].country_id_to +"'>"+data.countries[i].countries_to[0].name+"</option>");
                        }

                    }
                });

        }

      
    </script>


