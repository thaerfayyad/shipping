<!DOCTYPE html>
<!-- @if(LaravelLocalization::setLocale()=='ar')
<html dir="rtl">
@else
    <html dir="ltr">
 @endif -->
<head>
@include('layouts.website.head')


</head>

<body>
<!-- Main Wrapper Start -->
<div class="main-wrapper"> 
  
  
 @include('layouts.website.header')
 
   @if (Session::has('success'))
                                        <div class="alert alert-success alert-rounded text-center">{{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                    @endif
  @yield('content')
  @include('layouts.website.footer')
</div>
<!-- Main Wrapper end --> 

</body>
</html>