@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lubricant Registration System - Notifications</title>
  <style>
    /* Add your custom CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      text-align: center;
    }

    .notification {
      margin-bottom: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 4px;
      background-color: #f9f9f9;
    }

    .notification h3 {
      margin-top: 0;
      color: #007bff;
    }

    .notification p {
      margin-bottom: 0;
    }

    .btn-mark-read {
      padding: 8px 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-mark-read:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Lubricant Registration System - Notifications</h2>
    <div class="notification">
      <h3>New Notification</h3>
      <p>Your lubricant registration application with Application Number <strong>LUB-2024/0001</strong> has been approved.</p>
      <button class="btn-mark-read">Mark as Read</button>
    </div>
    <div class="notification">
      <h3>New Notification</h3>
      <p>Your lubricant registration application with Application Number <strong>LUB-2024/0001</strong> is pending review.</p>
      <button class="btn-mark-read">Mark as Read</button>
    </div>
  </div>
  <script>
    // Add JavaScript logic here
    const markReadButtons = document.querySelectorAll('.btn-mark-read');

    markReadButtons.forEach(button => {
      button.addEventListener('click', () => {
        button.parentElement.style.display = 'none'; // Hide the notification
        // You can add additional logic here to mark the notification as read in your system
      });
    });
  </script>
</body>
@endsection