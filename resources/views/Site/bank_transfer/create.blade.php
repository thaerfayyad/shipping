<!--begin::Modal-->
<div class="modal " id="moduleModal" tabindex="-1" role="dialog" aria-labelledby="moduleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
       <form method="post" accept-charset="utf-8" id="form_action"  autocomplete="off"  action="{{route('admin.transfer.store')}}">
          @csrf
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="moduleModalLabel">@lang('lang.confirm')</h5>
                <div id="form_method"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
             </div>
             <div class="modal-body" style="margin-right: 20px">
      @foreach($banks as $bank)
                <div class="row">

                   <div class="form-group col-md-10 ">
                      <label>@lang('lang.bank_name')</label>
                      <input type="text" name="bank_name" id="bank_name" class="form-control"  value="{{$bank->name}}"disabled>
                   </div>


                   <div class="form-group col-md-10 ">
                      <label>@lang('lang.account_user_name')</label>
                      <input type="text" name="account_user_name" id="account_user_name" class="form-control" style="color: #000" value="{{$bank->user_account_name}}" disabled>
                   </div>



                   <div class="form-group col-md-10 ">
                      <label> @lang('lang.city')</label>
                      <input type="text" name="city" id="city" class="form-control" value="{{$bank->city}}"disabled >
                   </div>

                   <div class="form-group col-md-10 ">
                      <label> @lang('lang.account_number')</label>
                      <input type="number" name="account_number" id="account_number" class="form-control" value="{{$bank->account_number}}" disabled>
                   </div>

                   <div class="form-group col-md-10 ">
                      <p class="text-danger">@lang('lang.warrning')</p>
                   </div>

                </div>

                @endforeach
             </div>
             <div class="modal-footer" style="margin-bottom: 20px">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('lang.Close')</button>
                <button type="submit" class="btn-module-submit btn btn-primary font-weight-bold">@lang('lang.Confirmation')</button>
             </div>
          </div>
       </form>
    </div>
 </div>
 <!--end::Modal-->


