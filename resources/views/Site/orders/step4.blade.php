<!-- fieldsets payment Start-->
<fieldset>
    
    <h3 class="fs-subtitle">* {{__('website/shipping.required')}}  </h3>
    <div class="shipping-form">
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-lg-4">
                     <input type="hidden"  name="price_commission" value="{{setting_value('shipping_commission','all')}}" class="form-control"
                      id="">
                              <label>{{__('website/shipping.commission')}}</label>
                       <input type="text" disabled="" name="" class="form-control"  id="amount">
                        
<br>
                      
                    <label>{{__('website/shipping.cardType')}}<sup>*</sup></label>
                   
                    <select name="payment_method_id" class="form-control" id="cardType">
                         <option>{{__('website/config.choose')}}</option>
                         @foreach($payment_methods as $key => $val)  
                        @if(LaravelLocalization::setLocale()=='ar')
                       <option value="{{$val->id}}">{{$val->name}}</option>
                       @else
                         <option value="{{$val->id}}">{{$val->name_en}}</option>
                         @endif
                        @endforeach
                    </select>
                </div>
              
            </div>
        </div>
         <div class="form-group d-none"  id="bank" >
            <div class="row" >
                <div class="col-12 col-lg-4">
                    <label>{{__('website/shipping.banks')}}<sup>*</sup></label>
                   
                    <select class="form-control"
                     name="bank_id">
                        <option>{{__('website/config.choose')}}</option>
                        @foreach($banks as $key => $val)  
                        @if(LaravelLocalization::setLocale()=='ar')
                       <option value="{{$val->id}}">{{$val->name}}</option>
                       @else
                         <option value="{{$val->id}}">{{$val->name_en}}</option>
                         @endif
                        @endforeach
                    </select>
                </div>
              
            </div>
        </div>
        <div class="form-group d-none"  id="pay" >
            <div class="row" >
                <div class="col-12 col-lg-4">
                  <!--   <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"
          action="{!! URL::to('paypal') !!}"> -->
          <!-- {{ csrf_field() }} -->
            
          <button class="w3-btn w3-blue">{{__('website/shipping.pay')}}</button>
      <!--   </form> -->
                </div>
              
            </div>
        </div>
        
    
       <br><br><br>
        <br><br><br>
    </div>
</fieldset>
<!-- fieldsets payment Start-->

<script type="text/javascript">

$(function() {
  $('#cardType').change(function(){
      var value = $(this).val();
      console.log(value);
    if(value == 2){
        $('#bank').removeClass('d-none');
        $('#pay').addClass('d-none');
    }else if(value == 1){
      $('#bank').addClass('d-none');
       $('#pay').removeClass('d-none');
    }else if(value == 3){
      $('#bank').addClass('d-none');
       $('#pay').addClass('d-none');
    }

  });
  $('#cardType').change();
});

</script>
