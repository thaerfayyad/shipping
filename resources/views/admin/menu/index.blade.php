@extends('layouts.admin.app')

@section('content')
      <div class="row ">
          <div class="col-md-6">
            <div class="card shadow-base bd-0 overflow-hidden">
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  {{ session()->get('message') }}
                </div>
                <!-- alert -->
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ __('admin/menu.title') }}</h5>
                  <p class="card-subtitle">{{ __('admin/menu.sub_title') }}</p>
                  <div class="alert alert-success" id='success-indicator' role="alert"  style="display:none;">
                      <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                        <span><strong> {{ __('admin/menu.alert.success.sort')}} </strong> </span>
                      </div>
                      <!-- d-flex -->
                  </div>
                  <!-- alert -->
                  <p class="card-text">

                  <div class="dd" id="nestable">
                      {!! $menu !!}
                  </div>
                  </p>
                  <a href="#newModal" class="btn btn-info" data-toggle="modal">إضافة بند للقائمة <i class="icon ion-plus"> </i> </a>
                </div>
            </div>
          </div>
      </div>
    </div>


  <!-- Create new item Modal -->
   <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
       <form method="POST" action="{{ route('menu.store') }}" class="form-horizontal" role="form">
      @csrf
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">{{ __('config.modal.insert.title') }}</h4>
            <h6 class="modal-title tx-danger">{{ __('config.modal.insert.message') }}</h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">{{ __('admin/menu.fileds.title') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="title" />

                </div>
            </div>
            <div class="form-group">
                <label for="label" class="col-lg-2 control-label">{{ __('admin/menu.fileds.label') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="label" />

                </div>
            </div>
            <div class="form-group">
                    <label for="label" class="col-lg-2 control-label">{{ __('admin/menu.fileds.type') }}</label>
                    <div class="col-lg-12">
                            <select name="type"  class='form-control'>
                                <option value="admin">{{ __('admin/menu.fileds.admin') }}</option>
                                <option value="web">{{ __('admin/menu.fileds.web') }}</option>
                            </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">{{ __('admin/menu.fileds.URL') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="url" />
                </div>
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('config.cancel') }}</button>
           <button type="submit" class="btn btn-primary">{{ __('config.insert') }}</button>
         </div>
        </form>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

  <!-- Edit item Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
        <form action="" method="POST"  class="form-horizontal" role="form" id="edit-modal">
            {{method_field('PATCH')}}
            @csrf
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">{{ __('config.modal.edit.title') }}</h4>
            <h6 class="modal-title tx-danger">{{ __('config.modal.edit.message') }}</h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">{{ __('admin/menu.fileds.title') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="title" id='patch_title' />

                </div>
            </div>
            <div class="form-group">
                <label for="label" class="col-lg-2 control-label">{{ __('admin/menu.fileds.label') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="label" id='patch_label' />

                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">{{ __('admin/menu.fileds.URL') }}</label>
                <div class="col-lg-12">
                  <input type="text" class='form-control' value="" name="url" id='patch_url' />
                </div>
            </div>
         </div>
         <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('config.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('config.edit') }}</button>
         </div>
        </form>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <!-- Delete item Modal -->

   <!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
     {{method_field('DELETE')}}
     @csrf

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel"> {{ __('config.modal.delete.title') }}</h4>
                </div>
                <div class="modal-body">
                    <h4>{{ __('config.modal.delete.message') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">{{ __('config.cancel') }}</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">{{ __('config.delete') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

   <!-- /.modal -->





@stop

@push('style')
  <link href="{{ asset('admin/lib/nestable/nestable-rtl.css') }}" rel="stylesheet">
@endpush
@push('script')

<script src="{{ asset('admin/lib/nestable/jquery.nestable.js') }}"></script>
<script type="text/javascript">
$(function() {
  $('.dd').nestable({
    dropCallback: function(details) {

       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });

       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }


       $.post('{{ route("menu.store.item") }}',
        {   _token: $('meta[name=csrf-token]').attr('content'),
          source : details.sourceId,
          destination: details.destId,
          order:JSON.stringify(order),
          rootOrder:JSON.stringify(rootOrder)
        },
        function(data) {
         // console.log('data '+data);
        })
       .done(function() {
          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
       })
       .fail(function() {  })
       .always(function() {  });
     }
   });


	// For A Delete Record Popup
	$('.update-record').click(function() {
		var url = $(this).attr('data-url');
		$("#edit-modal").attr("action",url);
		$("#patch_title").val($(this).data('title'));
		$("#patch_label").val($(this).data('label'));
		$("#patch_url").val($(this).data('updated-url'));

	});


	// For A Delete Record Popup
	$('.remove-record').click(function() {
		var url = $(this).attr('data-url');
		$(".remove-record-model").attr("action",url);
		$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
	});

	$('.remove-data-from-delete-form').click(function() {
		$('body').find('.remove-record-model').find( "input" ).remove();
	});
	$('.modal').click(function() {
	});

});
</script>
@endpush
