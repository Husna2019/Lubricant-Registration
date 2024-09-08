@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Lubricant Registration Results</title>
  <style>
    /*  CSS styles here */
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
      display: block;
      width: 100%;
      padding: 10px 0;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Review Lubricant Registration Results</h2>
    <table>
      <tr>
        <th>Application Number</th>
        <td>12345</td>
      </tr>
      <tr>
        <th>Date Submitted</th>
        <td>April 14, 2024</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>Approved</td>
      </tr>
      <!-- Add more rows for other details -->
    </table>
    <h3>Results Summary</h3>
    <p>Based on the review, the lubricant product has been approved for registration.</p>
    <p>Please find attached the detailed report for your reference.</p>
    <a href="/path/to/detailed/report.pdf" class="btn" download>Download Report</a>
  </div>
</body>
@endsection