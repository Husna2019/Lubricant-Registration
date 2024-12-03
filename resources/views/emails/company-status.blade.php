<!DOCTYPE html>
<html>
<head>
    <title>Company Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .image {
            text-align: center;
            margin-bottom: 20px;
        }
        .image img {
            max-width: 150px;
        }
        .content {
            text-align: center;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #555555;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="image">
            <img src="{{ asset('assets/img/ewura.png') }}" alt="Company Image">
        </div>
        <div class="content">
            <h1>Dear {{ $company->company_name }},</h1>
            <p>Your Application has been: <strong>{{ $status }}</strong>.</p>
            <p>If you have any questions, please contact us.</p>
            <p>Thank you,</p>
            <p>The {{ config('app.name') }} Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
