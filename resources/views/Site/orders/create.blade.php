@extends('layouts.app')

@section('content')
<!-- Breadcroumbs start -->
    <div class="wshipping-content-block wshipping-breadcroumb inner-bg-2">
        <div class="container">
            <div class="row">
                
                <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
            </div>
        </div>
    </div>
    <!-- Breadcroumbs end -->
                               @if (Session::has('delete'))
                                       <div class="alert alert-danger alert-rounded text-center"> {{ Session::get('delete') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                     @endif
                                      @if (Session::has('success'))
                                       <div class="alert alert-success alert-rounded text-center"> {{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                     @endif
    <form id="wizardForm" method="POST" enctype="multipart/form-data" action="{{route('order.store')}}">
        @csrf
        <!-- Create New Shipment Start -->
            <div class="wshipping-content-block shipping-block">
            <div class="container">
                <h2 class="heading2-border mt0">{{__('website/shipping.create')}}</h2>
                <div class="row">
                    <div class="shipping-form-block">
                        <div id="smartwizard">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-1">
                                        <strong>{{__('website/shipping.step1')}}</strong> <br>{{__('website/shipping.fromTo')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-2">
                                        <strong>{{__('website/shipping.step2')}}</strong> <br>{{__('website/shipping.what')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-3">
                                        <strong>{{__('website/shipping.step3')}}</strong> <br>{{__('website/shipping.how')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-4">
                                        <strong>{{__('website/shipping.step4')}}</strong> <br>{{__('website/shipping.payment')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-5">
                                        <strong>{{__('website/shipping.step5')}}</strong> <br> {{__('website/shipping.completed')}}
                                    </a>
                                </li>


                            </ul>

                            <div class="tab-content" style="margin: 20px">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <!-- <h3>{{__('website/shipping.FromToStep1')}}</h3><br> -->
                                    @include('Site.orders.step1')

                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                
                                    @include('Site.orders.step2')

                                </div>
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <!-- <h3>Step 3 How</h3><br><br><br> -->
                                    @include('Site.orders.step3')

                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                   <!--  <h3>Step 4 Payment</h3><br><br><br> -->
                                    @include('Site.orders.step4')

                                </div>
                                <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                                   <!--  <h3>Step 5 Completed</h3><br><br><br> -->
                                    @include('Site.orders.step5')

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create New Shipment end -->

    </form>





@stop


@push('script')

   
    <script type="text/javascript" src="{{ asset('website/plugins/SmartWizard/dist/js/jquery.smartWizard.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // Toolbar extra buttons
            
            var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled');
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled');
                } else {
                    $("#prev-btn").removeClass('disabled');
                    $("#next-btn").removeClass('disabled');
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'both', // both bottom
                    toolbarExtraButtons: [btnCancel]
                }
            });

            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });


            // Demo Button Events
            $("#got_to_step").on("change", function() {
                // Go to step
                var step_index = $(this).val() - 1;
                $('#smartwizard').smartWizard("goToStep", step_index);
                return true;
            });

            $("#is_justified").on("click", function() {
                // Change Justify
                var options = {
                    justified: $(this).prop("checked")
                };

                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

            $("#animation").on("change", function() {
                // Change theme
                var options = {
                    transition: {
                        animation: $(this).val()
                    },
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

            $("#theme_selector").on("change", function() {
                // Change theme
                var options = {
                    theme: $(this).val()
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

        });
    </script>

@endpush
