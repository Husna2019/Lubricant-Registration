@extends('layouts.layoutMaster')

@section('title', 'Approved Applications')

@section('content')
<div class="container mt-5" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
    <h2 class="text-center mb-4">Approved Applications</h2>
    
    
    <!-- Download Button -->
    <div class="d-flex justify-content-end mb-3">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Download
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('download-pdf') }}">PDF</a></li>
                <li><a class="dropdown-item" href="#">CSV</a></li>
                <li><a class="dropdown-item" href="#">Excel</a></li>
            </ul>
        </div>
    </div>

    @if($companyDetails->isEmpty())
        <div class="alert alert-warning text-center">No company details found.</div>
    @else
        <table class="table table-bordered table-hover table-striped">
            <thead style="background-color: #d2dbf5; color: white;">
                <tr>
                    <th>Application Number</th>
                    <th>Lubricant Name</th>
                    <th>Lubricant Type</th>
                    <th>Performance Level</th>
                    <th>Brand</th>
                    <th>Certification Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companyDetails as $detail)
                    <tr>
                        <td>{{ $detail->application_number }}</td>
                        <td>
                            @foreach($detail->lubricantDetails as $lubricant)
                                {{ $lubricant->lubricant_name }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($detail->lubricantDetails as $lubricant)
                                {{ $lubricant->lubricant_type }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($detail->lubricantDetails as $lubricant)
                                {{ $lubricant->lubricant_performance_level }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($detail->lubricantDetails as $lubricant)
                                {{ $lubricant->lubricant_brand }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($detail->lubricantDetails as $lubricant)
                                {{ $lubricant->certification_name }}<br>
                            @endforeach
                        </td>
                        <td>{{ $detail->status }}</td>
                        <td>
                            <a href="{{ route('single-page', $detail->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $companyDetails->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif
</div>
@endsection

<script>
    function assignCompanyToUser(userId, companyId) {
        if (!companyId) {
            alert('No company selected!');
            return;
        }

        axios.post('/assign-company', {
            user_id: userId,
            company_id: companyId,
        })
        .then(response => {
            alert(response.data.message);
            location.reload();
        })
        .catch(error => {
            alert(error.response?.data?.error || 'An error occurred.');
        });
    }
</script>
