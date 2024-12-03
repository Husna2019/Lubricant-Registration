@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Evaluation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Review Evaluation</h1>
        <form >
            @csrf
            <div class="form-group">
                <label for="evaluation_result">Evaluation Result:</label>
                <textarea class="form-control" id="evaluation_result" name="evaluation_result" rows="5" readonly>{{ $evaluation_result }}</textarea>
            </div>
            <div class="form-group">
                <label for="decision">Decision:</label>
                <select class="form-control" id="decision" name="decision" required>
                    <option value="Forward to TMP">Forward to TMP</option>
                    <option value="Refer Back to Applicant">Refer Back to Applicant</option>
                    <option value="Refer Back to Evaluator">Refer Back to Evaluator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Decision</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
