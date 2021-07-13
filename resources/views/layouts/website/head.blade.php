<head>
   <meta charset="utf-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Bootstrap4, Multipurpose, responsive, Business, template,Shipping, Cargo, logistic, html5, css, javascript, web24service" />
<meta name="author" content="web24service">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Title -->
@if(LaravelLocalization::setLocale()=='ar')

<title>{{setting_value('title','ar')}}</title>
<base href="http://webtest.mynet.net/shipping/public/ar/">

@else
<title>{{setting_value('title','en')}}</title>
<base href="http://webtest.mynet.net/shipping/public/en/">

@endif


<!-- Favicon -->
<link rel="shortcut icon" type="image/png" href="assets/images/fevicon.png">
<!-- Bootstrap CSS -->
@if(LaravelLocalization::setLocale()=='ar')
<link rel="stylesheet" href="{{asset('website/assets/css/rtl/bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}"> -->
@else
<link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}">
@endif
<!-- Font awesome CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/fontawesome.all.min.css')}}">

<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/animate.min.css')}}">

<!-- OwlCarousel CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/owl.carousel.min.css')}}">

<!-- fancybox popup CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/fancybox.min.css')}}">

<!-- chat CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/chat.css')}}">

    <!-- Wizard CSS -->
@if(LaravelLocalization::setLocale()=='en')
    <link rel="stylesheet" href="{{asset('website/plugins/SmartWizard/dist/css/smart_wizard_all.css')}}">
@else
	<link rel="stylesheet" href="{{asset('website/plugins/SmartWizard/dist/css/smart_wizard_all-rtl.css')}}">
@endif


<!-- Slicknav CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/slicknav.min.css')}}">

<!-- Date picker CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/bootstrap-datetimepicker.min.css')}}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}">

<!-- Responsive CSS -->
<link rel="stylesheet" href="{{asset('website/assets/css/responsive.css')}}">

@if(LaravelLocalization::setLocale()=='ar')
<link rel="stylesheet" href="{{asset('website/assets/css/rtl.css')}}">
@endif

<link rel="stylesheet" href="{{asset('website/assets/plugins/select2/css/select2.min.css')}}">

<!-- RTL CSS -->

@stack('style')
<!-- fonts -->

 @jquery
    @toastr_js
    @toastr_render
<!-- Tether JS -->
<script src="{{asset('website/assets/js/tether.min.js')}}"></script>

<!-- Popper JS -->
<script src="{{asset('website/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('website/assets/js/bootstrap.min.js')}}"></script>
<!-- OwlCarousel JS -->
<script src="{{asset('website/assets/js/owl.carousel.min.js')}}"></script>

<!-- Bootstrap dateTimePicker -->
<script src="{{asset('website/assets/js/datetimepicker-moment.min.js')}}"></script>
<script src="{{asset('website/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- SlickNav JS -->
<script src="{{asset('website/assets/js/jquery.slicknav.min.js')}}"></script>

<!-- fancybox Popup JS -->
<script src="{{asset('website/assets/js/jquery.fancybox.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('website/assets/js/wow-1.3.0.min.js')}}"></script>

<!-- Step Form with validate -->
<script src="{{asset('website/assets/js/jquery.validate.js')}}"></script>
<script src="{{asset('website/assets/js/form-step.js')}}"></script>

<!-- SlickNav JS -->
<script src="{{asset('website/assets/js/youtube-background.js')}}"></script>

<!-- Gallery Filter -->
<script src="{{asset('website/assets/js/jquery.filterizr.min.js')}}"></script>

<!-- Chat JS -->
<script src="{{asset('website/assets/js/chat.js')}}"></script>

<!-- Coming Soon JS -->
<script src="{{asset('website/assets/js/coming-soon.js')}}"></script>

<!-- Active JS -->
<script src="{{asset('website/assets/js/active.js')}}"></script>
<script src="{{asset('website/assets/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Jquery -->
<!-- select2 -->
<script src="{{asset('website/assets/plugins/select2/js/select2.full.min.js')}}"></script>
    
    @stack('script')


</head>
