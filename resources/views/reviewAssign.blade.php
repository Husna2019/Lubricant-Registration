@extends('layouts.layoutMaster')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h2>List of Pending Applications</h2>
    @if( $companyDetails ->isEmpty())
        <p>No company details found.</p>
    @else
        <table class="table table-bordered" style="font-size: 14px;">
            <thead style="background-color: #cfd6cf; color: white;">
                <tr>
                    <th>Company Name</th>
                    <th>License</th>
                    <th>Application Number</th>
                    <th>Region</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            
            <tbody>
                @foreach ( $companyDetails as $detail)
                    <tr>
                        <td>{{ $detail->company_name }}</td>
                        <td>{{ $detail->license }}</td>
                        <td>{{ $detail->application_number }}</td>
                        <td>{{ $detail->region }}</td>
                        <td>{{ $detail->address }}</td>
                        <td>{{ $detail->telephone }}</td>
                        <td>{{ $detail->email }}</td>
                        <td>{{ $detail->status }}</td>
                        {{-- <td>
                            <!-- Only show if the user can view the assigned company -->
                            @can('viewAssigned', $detail)
                                <a href="{{ route('', $detail->id) }}" class="btn btn-info btn-sm">View</a>
                            @endcan
                        </td> --}}
                        <td>
                            <div class="btn-group" style="display: flex;">
                                
                                <a href="{{ route('single-page', $detail->id) }}" class="btn btn-info btn-sm" style="margin-right: 5px;">View</a>
                                

                                <!-- Check if user has admin or PE-PQ role -->
                                  @if(auth()->user() && (auth()->user()->hasRole('PE-PQ') )) 
                                    <div class="btn-group" style="margin-right: 5px;">
                                        <button 
                                            type="button" 
                                            class="btn btn-warning btn-sm dropdown-toggle" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false">
                                            Assign
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($users as $user)
                                                <li>
                                                    <a 
                                                        class="dropdown-item" 
                                                        href="#" 
                                                        onclick="assignCompanyToUser({{ $user->id }}, {{ $detail->id }})">
                                                        {{ $user->first_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                              @endif 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{  $companyDetails->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif
</div>  
@endsection

<!-- Add this script block -->
<script>
    function assignCompanyToUser(userId, companyId) {
        console.log('User ID:', userId);  // Debugging
        console.log('Company ID:', companyId);  // Debugging

        if (!companyId) {
            alert('No company selected!');
            return;
        }

        // Use Axios to send a POST request to the server
        axios.post('/assign-company', {
            user_id: userId,
            company_id: companyId,
        })
        .then(response => {
            console.log(response);  // Debugging: Check the response
            alert(response.data.message); // Display success message
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error(error);  // Debugging: Check if there's an error
            alert(error.response?.data?.error || 'An error occurred.'); // Display error message
        });
    }
</script>
