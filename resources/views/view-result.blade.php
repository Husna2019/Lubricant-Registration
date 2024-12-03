@extends('layouts.layoutMaster')

@section('title', 'View Registration Result')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registration Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .result {
            margin-bottom: 20px;
        }
        .result p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Result</h1>
        <div class="result">
            <h3>User Information</h3>
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> 123-456-7890</p>
        </div>
        <div class="result">
            <h3>Lubricant Details</h3>
            <p><strong>Lubricant Name:</strong> Super Lubricant</p>
            <p><strong>Lubricant Type:</strong> Synthetic</p>
            <p><strong>Performance Level:</strong> High</p>
            <p><strong>Approval Status:</strong> Approved</p>
        </div>
        <div class="result">
            <h3>Evaluation</h3>
            <p><strong>Recommendation:</strong> Recommend</p>
            <p><strong>Remarks:</strong> Meets all standards and requirements.</p>
        </div>
    </div>
</body>
@endsection
 