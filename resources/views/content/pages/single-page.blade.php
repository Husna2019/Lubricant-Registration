@extends('layouts.layoutMaster')

@section('title', 'Evaluate Lubricant')

@section('content')


<div class="container mt-0" style="font-size: 12px; background-color: #e0f0f0; padding: 20px; border-radius: 8px; position: relative;">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    
    <!-- Buttons at Top-Right -->
    <div class="d-flex justify-content-end mb-3" style="gap: 10px;">
       
   
           
        <form action="{{ route('company.updateStatus', $company->id) }}" method="POST" style="display: inline;">

            @csrf
            @if(auth()->user() && (auth()->user()->hasRole('Lubricant Evaluator') ))
            <a href="{{ route('evaluateLubricant', $company->id) }}" class="btn btn-success btn-sm" style="margin-right: 5px;">Evaluate</a>
            @endif
            {{-- @if(auth()->user() && (auth()->user()->hasRole('PE-PQ') )) --}}
            <input type="hidden" name="status" value="Approved">
            <button type="submit" class="btn btn-success btn-sm">Approve</button>
        </form>
        
        <form action="{{ route('company.updateStatus', $company->id) }}" method="POST" style="display: inline;">
            @csrf
            @if(auth()->user() && (auth()->user()->hasRole('PE-PQ') ))
            <input type="hidden" name="status" value="Rejected">
            <button type="submit" class="btn btn-secondary btn-sm">Reject</button>
            @endif
        </form>



        {{-- @if(auth()->user() && (auth()->user()->hasRole('LTC Secretary') ))
        <a href="{{ route('reportLTC', $company->id) }}" class="btn btn-success btn-sm" style="margin-right: 5px;">Approved Report</a>
        @endif --}}
       
        <button class="btn btn-success btn-sm">Button 3</button>
        <button class="btn btn-danger btn-sm">Button 4</button>
    
    {{-- @endif --}}
</div>
    <h1 class="mb-4 text-center" style="font-size: 20px;">Company Details</h1>

    <div class="row">
        <!-- General Information -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg" style="font-size: 12px; background-color: #e0f0f0;">
                <div class="card-header" style="background-color: #eab676;">
                    <h6 class="mb-0 text-black">General Information</h6>
                </div>
                <div class="card-body">
                    <p><strong>License:</strong> {{ $company->license }}</p>
                    <p><strong>Region:</strong> {{ $company->region }}</p>
                    <p><strong>Block:</strong> {{ $company->block }}</p>
                    <p><strong>Address:</strong> {{ $company->address }}</p>
                    <p><strong>Telephone:</strong> {{ $company->telephone }}</p>
                    <p><strong>Email:</strong> {{ $company->email }}</p>
                </div>
            </div>
        </div>

        <!-- Contact People -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg" style="font-size: 12px; background-color: #e0f0f0;">
                <div class="card-header" style="background-color: #eab676;">
                    <h6 class="mb-0 text-black">Contact Person</h6>
                </div>
                <div class="card-body">
                    @if($company->contactPeople->isNotEmpty())
                        @foreach($company->contactPeople as $person)
                        <div class="mb-2">
                            <strong>{{ $person->name }}</strong> ({{ $person->title }})<br>
                            <strong>Phone:</strong> {{ $person->cellphone }} / {{ $person->cellphone1 }}<br>
                            <strong>Email:</strong> {{ $person->email2 }}
                        </div>
                        @endforeach
                    @else
                        <p>No contact people available.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Lubricant Details -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg" style="font-size: 12px; background-color: #e0f0f0;">
                <div class="card-header" style="background-color: #eab676;">
                    <h6 class="mb-0 text-black">Lubricant Details</h6>
                </div>
                <div class="card-body">
                    @if($company->lubricantDetails->isNotEmpty())
                        @foreach($company->lubricantDetails as $lubricant)
                        <div class="mb-2">
                            <strong>{{ $lubricant->lubricant_name }}</strong> ({{ $lubricant->lubricant_type }})<br>
                            <strong>Performance:</strong> {{ $lubricant->lubricant_performance_level }}<br>
                            <strong>Status:</strong> {{ $lubricant->approval_status }}
                        </div>
                        @endforeach
                    @else
                        <p>No lubricant details available.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Supporting Documents -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg" style="font-size: 12px; background-color: #e0f0f0;">
                <div class="card-header" style="background-color: #eab676;">
                    <h6 class="mb-0 text-black">Supporting Documents</h6>
                </div>
                <div class="card-body">
                    @if($company->supportingDocuments->isNotEmpty())
                        <ul class="list-group">
                            @foreach($company->supportingDocuments as $document)
                            <li class="list-group-item" style="font-size: 12px;">
                                <a href="{{ asset($document->path) }}" target="_blank">{{ $document->name }}</a>
                                <span class="text-muted">({{ $document->type }}, {{ $document->size }})</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No supporting documents available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
    
</div>
@endsection
