@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Re-Apply for Lubricant Registration</title>
  <style>
    /* Add your custom CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f0f0f0;
      /* Background color for the page */
    }

    .card {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="card">
    <h2>Re-Apply for Lubricant Registration</h2>
    <table>
      <tr>
        <th>Application Number</th>
        <td>ALUB/2023/00001</td>
      </tr>
      <tr>
        <th>Date Submitted</th>
        <td>April 14, 2024</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>Pending</td>
      </tr>

      <!-- Add more rows for other details -->
    </table>
    <button class="btn">Submit Re-Application</button>
  </div>
  @endsection
