



@extends('layouts/layoutMaster')

@section('title', ' Edit User')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
'resources/assets/vendor/libs/cleavejs/cleave.js',
'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
'resources/assets/vendor/libs/moment/moment.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/select2/select2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/form-layouts.js'])
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> View Users</h4>

<form class="card-body" method="POST" action="{{ route('users.update', $user->id) }}">
    @method('PATCH')
    @csrf




<div class="card mb-4">
    <h5 class="card-header">View User Information</h5>
    <div class="card-body">
        <h6>1. Account Details</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="view-username">Username</label>
                <input type="text" id="view-username" class="form-control" value="{{ $user->username }}" disabled />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="view-email">Email</label>
                <input type="text" id="view-email" class="form-control" value="{{ $user->email }}" disabled />
            </div>
        </div>
        <hr class="my-4 mx-n4" />
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="view-first-name">First Name</label>
                <input type="text" id="view-first-name" class="form-control" value="{{ $user->first_name }}" disabled />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="view-last-name">Last Name</label>
                <input type="text" id="view-last-name" class="form-control" value="{{ $user->surname }}" disabled />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="view-middle-name">Middle Name</label>
                <input type="text" id="view-middle-name" class="form-control" value="{{ $user->middle_name }}" disabled />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="view-gender">Gender</label>
                <input type="text" id="view-gender" class="form-control" value="{{ $user->gender }}" disabled />
            </div>
        </div>
    </div>
</div>
 </form>
</div>

@endsection
