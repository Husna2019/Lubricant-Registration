@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'LOGIN - Page')

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/@form-validation/popular.js',
'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
'resources/assets/vendor/libs/@form-validation/auto-focus.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/pages-auth.js'
])
@endsection

@section('content')

<head>
  <div style="text-align: center;">
    <style>
  .card-lg {
    width: 350px;
    max-width: 400px;
    margin-left: 0; /* Aligns the card to the left */
    background-color: #154c79; /* Make background transparent */
    opacity: 0.8; /* Adjust the opacity value as needed */
}


.authentication-wrapper {    display: flex;    justify-content: center;    align-items: center;    min-height: 100vh; /* Full viewport height */    background-color: #566D7E; /* Replace with any color you */    background-image: url('assets/img/avatars/lub4.png'); /* Replace with your image path */    background-size: cover; /* Ensure the image covers the full background */    background-position: center; /* Center the image */    position: relative; /* Needed for the logo positioning */}




    </style>
  </div>
</head>

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card card-lg">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
           <img src="assets/img/avatars/ewura1.png" alt="Your Logo" style="height: 70px; width: auto;">

              <span class="app-brand-text demo text-body fw-bold ms-1">{{config('variables.templateName')}}</span>
            </a>
          </div>

          <!-- /Logo -->
          <h4 class="mb-1 pt-2" style="color: #f2891b; font-size: 25px; text-align: center;">LOGIN</h4>


          <form id="formAuthentication" class="mb-3" action="{{url('/login')}}" method="POST">
    @csrf
    <div class="mb-3">
    <label for="email" class="form-label" style="color: white;">Email or Username</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter username" value="{{ old('email') }}" autofocus style="border: 1px solid #fff; background-color: white;">
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" style="color: white;" for="password">Password</label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
            </a>
            @endif
        </div>
        <div class="input-group input-group-merge">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-describedby="password" style="border: 1px solid #fff; background-color: white;">
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="border: 1px solid #fff; background-color: transparent;">
            <label class="form-check-label" style="color: white;" for="remember-me">Remember Me</label>
        </div>
    </div>
    <div class="mb-3">
    <div class="mb-3 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit"
            style="background-color: #007bff; color: white; transition: background-color 0.3s ease, color 0.3s ease; onmouseover="this.style.backgroundColor='#FFA600'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#151B54'; this.style.color='#ffffff'; width: 60px; height: 30px; position: absolute; right: 10px; bottom: 10px;">
            Sign in
        </button>
    </div>
</form>


          <p class="text-center">
          <span style="color: white;">New on our platform?</span>
            <a href="{{url('/auth/register')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>
</div>
@endsection
