@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<div class="container">
  <div class="center mb-5">
    <style>
      /* Define keyframes for animation */
      @keyframes slideFromLeft {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(0);
        }
      }

      /* Apply animation only to h2 element */
      h4{
        animation: slideFromLeft 3s ease-out;
      }

      /* Center the h2 element */
      .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh; /* Adjust as needed */
      }

      /* Card background styling */
      .card-custom {
        background-color: #d5efee; /* Light Blue for the background */
        color: black; /* Change text color to black */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .card-custom:hover {
        transform: scale(1.05); /* Slightly enlarge the card on hover */
      }

      .card-body {
        padding: 20px;
      }

      .card-title {
        font-size: 1.2rem;
        font-weight: bold;
      }

      .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Add space between the cards */
      }

      .col-md-3 {
        flex: 1 1 45%; /* Make each card take up 45% width */
        max-width: 45%; /* Ensure that cards take up 2 per row */
      }
    </style>

    <h4>WELCOME TO LUBRICANT REGISTRATION SYSTEM</h4>
  </div>

  <div class="row justify-content-center">
    <!-- Card 1: What is the Lubricant Registration System -->
    <div class="col-md-3">
      <div class="card card-custom">
        <div class="card-body">
          <h5 class="card-title">What is the Lubricant Registration System?</h5>
          <p class="card-text">The Lubricant Registration System is an online platform designed to streamline the registration process for lubricant products. Whether you're a manufacturer, importer, or distributor, our system makes it easy for you to register your products and ensure compliance with regulatory requirements.</p>
        </div>
      </div>
    </div>

    <!-- Card 2: How to Register Lubricants -->
    <div class="col-md-3">
      <div class="card card-custom">
        <div class="card-body">
          <h5 class="card-title">How to Register Lubricants</h5>
          <p class="card-text">To register lubricants, simply log in to the platform, fill out the required forms with your product details, upload supporting documents, and submit your registration for review. The system will guide you through each step of the process.</p>
        </div>
      </div>
    </div>

    <!-- Card 3: Requirements for Registration -->
    <div class="col-md-3">
      <div class="card card-custom">
        <div class="card-body">
          <h5 class="card-title">Requirements for Registration</h5>
          <p class="card-text">Before starting the registration process, make sure you have the necessary documents such as a product specification, safety data sheets, and proof of compliance with local regulations. These will be required for successful submission.</p>
        </div>
      </div>
    </div>

    <!-- Card 4: Email Notifications After Registration -->
    <div class="col-md-3">
      <div class="card card-custom">
        <div class="card-body">
          <h5 class="card-title">Email Notifications After Registration</h5>
          <p class="card-text">Once your lubricant product is successfully registered, you will receive email notifications about the status of your registration, any required updates, and important regulatory changes. Stay informed throughout the process!</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
