<!-- fieldsets pick up Start-->
<fieldset>
  
    <h3 class="fs-subtitle">* {{__('website/shipping.required')}} </h3>
    <div class="shipping-form dropoff-block">
       
     
           
                 <h3>{{__('website/shipping.send')}}</h3>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label> {{__('website/shipping.sending')}}:<sup>*</sup> </label>
                            <div class="datepicker-group">
                                <input type="text" class="form-control datetimepicker1" name="send_date"/>
                                <div class="datepicker-icon"><i class="fa fa-calendar-alt"></i></div>


                            </div>
                        </div>
                    </div>
                
               
            </div>
            <br>
              <h3>{{__('website/shipping.delivered')}}</h3>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>{{__('website/shipping.dropOff')}}:<sup>*</sup></label>
                            <div class="datepicker-group">
                                <input type="text" class="form-control datetimepicker1" name="delivered_date" />
                                <div class="datepicker-icon"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            
        </div>

  </fieldset>
<!-- fieldsets package end-->
