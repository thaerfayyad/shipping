@extends('layouts.app')

@section('content')

 <!-- Breadcroumbs start -->
  <div class="wshipping-content-block wshipping-breadcroumb inner-bg-1">
    <div class="container">
      <div class="row">
         <!-- <div class="col-12 col-lg-7">
            <h1>{{__('website/config.login')}}</h1>
            <a href="index.html" title="Home">Home</a> / Login
         </div> -->
         <div class="col-10 text-center"><h4>{{__('website/config.text')}} <span>{{__('website/config.fast')}}</span> {{__('website/config.and')}} <span>{{__('website/config.saffly')}}</span></h4></div>
      </div>
    </div>
  </div>
  <!-- Breadcroumbs end -->
  
  <!-- Customer login Start -->
  <div class="wshipping-content-block">
    <div class="container">
      <div class="customer-login">
        <div class="row">
         <div class="col-12 col-md-6 col-lg-6">
            <div class="customer-login-left">
               <div class="login-icon"><i class="fa fa-lock"></i></div>
               <h4>{{__('website/config.welcomeToLogin')}}</h4>
               <p>{{__('website/config.description')}} <a href="{{route('register')}}">{{__('website/config.createAccount')}}</a></p>
              
            </div>
         </div>
         <div class="col-12 col-md-6 col-lg-6">
            <div class="customer-login-block">
              <h2>{{__('website/config.loginToAccount')}}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
 <input type="hidden" name="id" value="{{ request()->get('id') }}">
                  <div class="form-group">
                    <label>{{__('website/config.EmailAddress')}}:</label>
                     <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('config.E-MailAddress') }}" aria-label="E-MailAddress" aria-describedby="basic-addon1" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                    
                  </div>
                  <div class="form-group">
                    <label>{{__('website/config.password')}}:</label>
                   <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('config.Password') }}" aria-label="Password" aria-describedby="basic-addon1">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                  </div>
                  <div class="checkbox">
                  <!--   <input type="checkbox" name="remember" id="remember" class="css-checkbox" />
                    <label for="remember" class="css-label">Remember me</label> -->
                 
                     @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}" title="" class="forgot-pass">{{ __('config.Forgot pwd') }}</a>      
                                    @endif
                  </div>
                  <button type="submit" class="btn btn-submit">{{ __('config.Login') }}</button>
                </form> 
            </div> 
         </div>
       </div>       
     </div>
    </div>
  </div>
  <!-- Customer login end -->

@endsection
