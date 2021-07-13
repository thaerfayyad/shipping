<!-- fieldsets package Start-->
<fieldset>
    <h2 class="fs-title"> <a href="" title="" class="login-btn-form">Login</a></h2>
   <h3 class="fs-subtitle">* {{__('website/shipping.required')}} </h3>
      <div class="shipping-form">
                   <div class="row">
                        <div class="col-12 col-lg-4">
                             <div class="form-group">
                            <label>{{__('website/shipping.pack_type')}}<sup>*</sup></label>
                           
                                <select class="form-control" name="PackageID"
                                 id="packageTypes" onchange="getShippingMethods(this.value)" 
                                    required="">
                                    </select>
                            
                        </div>
                  </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                       <label>{{__('website/shipping.shippingMethods')}}<sup>*</sup></label>  
                      <select class="form-control" name="Shipping_method_id"
                                 id="shippingMethods"
                                    required="" onchange="getShippingPrice(this.value)">
                                    </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                       <label>{{__('website/shipping.price')}}</label>  
                   <input type="text"  class="form-control" id="price" disabled>
                   <input type="hidden"  name="price" class="form-control" id="price1" > 
                                   
                        </div>
                    </div>
                </div>
              
            </div>
          
        
 
</fieldset>
<!-- fieldsets package end-->


<script type="text/javascript">
        
 function getPackageTypes(country_to_value){
            var zone_id = $('#countriesTo').find('option[value="'+country_to_value+'"]').data('zone_id');
            // var zone_id = getZoneId();
            var id = country_to_value;
     // console.log(zone_id,id);
      //return 0;         
            $.ajax(

                {
                    url: 'getPackageTypes/' + zone_id,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "zone_id": zone_id,
                    },

                    success: function (data){
                       console.log(data)
                        $("#packageTypes").empty();
                  $("#packageTypes").append("<option >اختر</option");
                        for (let i=0; i<data.packageTypes.length; i++) {
                            
                            $("#packageTypes").append("<option value='"+data.packageTypes[i].package_id +"'>"+data.packageTypes[i].packages[0].name_ar+'  ('+data.packageTypes[i].packages[0].length+'x'+data.packageTypes[i].packages[0].width+'x'+data.packageTypes[i].packages[0].height+'   )  '+'الوزن'+'('+data.packageTypes[i].packages[0].weight+" "+data.packageTypes[i].packages[0].type_ar+')'+"</option>");
                        }

                    }
                });

        }

         function getShippingMethods(package_to_value, zone_id){
        var zone_id = $('#countriesTo').find('option[value="'+$('#countriesTo').val()+'"]').data('zone_id');
            // var zone_id = getZoneId();

            var id = package_to_value;    
            $.ajax(

                {
                    url: 'getShippingMethods/'+id+'/'+zone_id ,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "zone_id": zone_id,
                    },

                    success: function (data){
                       console.log(data)
                        $("#shippingMethods").empty();
                         $("#shippingMethods").append("<option >اختر</option");
                        for (let i=0; i<data.shippingMethods.length; i++) {
                            $("#shippingMethods").append("<option value='"+data.shippingMethods[i].shipping_method_id+"'>"+data.shippingMethods[i].shipping_methods[0].title_ar+"</option>");
                        }

                    }
                });

        }
          
       function getShippingPrice(id){
         
            $.ajax(

                {
                    url: 'getShippingPrice/'+id ,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": id,
                       
                    },

                    success: function (data){
                      // console.log(data.price[0].price)
                        $("#price").empty();     
                        $('#price').val(data.price[0].price );

                        $("#price1").empty();     
                        $('#price1').val(data.price[0].price );
                        $("#amount").empty();

                     
                        $('#amount').val(parseInt(data.price[0].price) + parseInt({{setting_value('shipping_commission','all')}}));
                   

                    }
                });

        }

      
        
    </script>


