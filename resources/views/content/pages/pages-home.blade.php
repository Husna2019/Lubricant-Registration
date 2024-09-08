@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<div class="center">
  <style>
    /* Define keyframes for animation
    @keyframes slideFromLeft {
      0% {
        transform: translateX(-100%);
      }

      100% {
        transform: translateX(100%);
      }
    }

    Apply animation to h2 element
    h2 {
      position: absolute;
      Ensures the header moves independently
      animation: slideFromLeft 5s linear infinite;
      Adjust duration as needed
      white-space: nowrap;
      Ensures the text stays on a single line
      overflow: hidden;
      Hides overflow to avoid horizontal scroll
    }

    /* Center the h2 element */
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10vh;
      /* Adjust as needed */
    }
  </style>

  <h2>WELCOME TO LUBRICANT REGISTRATION SYSTEM</h2>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">What is the Lubricant Registration System</h5>
          <p class="card-text">The Lubricant Registration System is an online platform designed to streamline the registration process for lubricant products. Whether you're a manufacturer, importer, or distributor, our system makes it easy for you to register your products and ensure compliance with regulatory requirements.</p>
          <p class="card-text">Our system provides a user-friendly interface for submitting product details, managing registrations, and staying up-to-date with regulatory changes. With features such as document uploads, status tracking, and notifications, we aim to simplify the registration process and save you time and effort.</p>
          <p class="card-text">Explore our platform to discover how we can help you navigate the lubricant registration process efficiently and effectively.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
