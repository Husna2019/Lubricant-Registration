@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with Image</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-container {
            margin-top: 20px;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .menu-item i {
            margin-right: 10px;
        }
        .menu-item a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Add your image here -->
    <div class="text-center my-4">
        <img src="{{ asset('assets/img/ewura.png') }}" alt="EWURA Logo" class="img-fluid">
    </div>
    
    <!-- Menu items -->
    <div class="menu-container">
        <div class="list-group">
            <div class="menu-item list-group-item">
                <i class="menu-icon tf-icons ti ti-smart-home text-primary"></i>
                <a href="/pages/pages-home">Home</a>
            </div>
            <div class="menu-item list-group-item">
                <i class="menu-icon tf-icons ti ti-settings text-warning"></i>
                <a href="/pages/company-details">Register Lubricant</a>
            </div>
            <div class="menu-item list-group-item">
                <i class="menu-icon tf-icons ti ti-clipboard text-success"></i>
                <a href="/reviewAssign">Applications</a>
            </div>
            <div class="menu-item list-group-item">
                <i class="menu-icon tf-icons ti ti-user text-primary"></i>
                <a href="/content/user/index">User</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
@endsection
