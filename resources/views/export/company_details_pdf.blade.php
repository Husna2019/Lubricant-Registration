<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Details PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h2>Company Details</h2>
<table>
    <thead>
        <tr>
            <th>Application Number</th>
            <th>Lubricant Name</th>
            <th>Lubricant Type</th>
            <th>Lubricant Performance Level</th>
            <th>Lubricant Brand</th>
            <th>Certification Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companyDetails as $detail)
            <tr>
                <td>{{ $detail->application_number }}</td>
                <td>{{ $detail->lubricantDetails->pluck('lubricant_name')->join(', ') }}</td>
                <td>{{ $detail->lubricantDetails->pluck('lubricant_type')->join(', ') }}</td>
                <td>{{ $detail->lubricantDetails->pluck('lubricant_performance_level')->join(', ') }}</td>
                <td>{{ $detail->lubricantDetails->pluck('lubricant_brand')->join(', ') }}</td>
                <td>{{ $detail->lubricantDetails->pluck('certification_name')->join(', ') }}</td>
                <td>{{ $detail->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
