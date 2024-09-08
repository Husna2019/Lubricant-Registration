@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

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
        width: 500px;
        /* You can adjust the width as needed */
        max-width: 600px;
        /* You can adjust the maximum width as needed */
        margin: 0 auto;
        /* Center the card horizontally */
        background-color: white;
        /* Set background color to orange */
      }
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
              <!-- Replace the existing logo markup with an <img> tag -->
              <img src="assets/img/avatars/ew.png" alt="Your Logo" style="height: 60px; width: auto;">
              <span class="app-brand-text demo text-body fw-bold ms-1">{{config('variables.templateName')}}</span>
            </a>
          </div>

          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Welcome to Lubricant system registration system </h4>

          <form id="formAuthentication" class="mb-3" action="{{url('/login')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter username" value="{{ old('email') }}" autofocus>
            </div>

            <div class="mb-3 form-password-toggle">

              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  <small>Forgot Password?</small>
                </a>
                @endif
              </div>
              <div class="input-group input-group-merge">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
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
