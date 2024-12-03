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
        width: 400px;
        max-width: 400px;
        margin-left: 0; /* Aligns the card to the left */
        background-color: #154c79; /* Make background transparent */
        opacity: 0.8; /* Adjust the opacity value as needed */
      }

      .authentication-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Full viewport height */
        background-color: #566D7E; /* Replace with any color you */
        background-image: url('{{ asset('assets/img/avatars/lub4.png') }}'); /* Ensure the image covers the full background */
        background-size: cover; /* Ensure the image covers the full background */
        background-position: center; /* Center the image */
        position: relative; /* Needed for the logo positioning */
      }
    </style>
  </div>
</head>

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Register -->
      <div class="card card-lg">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{ url('/') }}" class="app-brand-link gap-2">
              <img src="{{ asset('assets/img/avatars/ew.png') }}" alt="Your Logo" style="height: 60px; width: auto;">
              <span class="app-brand-text demo text-body fw-bold ms-1">{{ config('variables.templateName') }}</span>
            </a>
          </div>

          <h4 class="mb-1 pt-2" style="color: #f2891b; font-size: 25px; text-align: center;">REGISTER</h4>

          <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="username" class="form-label" style="color: white;">Username</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="Enter your username" autofocus style="border: 1px solid #fff; background-color: white;">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label" style="color: white;">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" style="border: 1px solid #fff; background-color: white;">
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password" style="color: white;">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" style="border: 1px solid #fff; background-color: white;" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password-confirm" style="color: white;">Password confirmation</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" style="border: 1px solid #fff; background-color: white;" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" style="border: 1px solid #fff; background-color: transparent;">
                <label class="form-check-label" style="color: white;" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);" style="color: white;">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" style="background-color: #007bff; color: white; transition: background-color 0.3s ease, color 0.3s ease;" onmouseover="this.style.backgroundColor='#FFA600'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#151B54'; this.style.color='#ffffff';">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span style="color: white;">Already have an account?</span>
            <a href="{{ url('/') }}">
              <span>Sign in instead</span>
            </a>
          </p>

          {{-- <div class="divider my-4">
            <div class="divider-text">or</div>
          </div> --}}

          {{-- <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
              <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
              <i class="tf-icons fa-brands fa-google fs-5"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
              <i class="tf-icons fa-brands fa-twitter fs-5"></i>
            </a>
          </div> --}}
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

@endsection
