@extends('layouts/layoutMaster')

@section('title', ' Vertical Layouts - Forms')

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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>



<!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <h5 class="card-header">Edit User Informations</h5>
  <form class="card-body" method="POST" action="{{ route('users.update', $user->id) }}">
    @method('PATCH')
    @csrf
    <h6>1. Account Details</h6>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Username</label>
        <input type="text" id="multicol-username" class="form-control" name="username" value="{{$user->username}}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-email">Email</label>
        <div class="input-group input-group-merge">
          <input type="text" id="multicol-email" name="email" class="form-control" value="{{$user->email}}" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-password-toggle">
          <label class="form-label" for="multicol-password">Password</label>
          <div class="input-group input-group-merge">
            <input type="password" id="multicol-password" class="form-control" name="password" />
            <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-password-toggle">
          <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
          <div class="input-group input-group-merge">
            <input type="password" id="multicol-confirm-password" class="form-control" name="re_password" />
            <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-4 mx-n4" />
    <!--<h6>2. Personal Info</h6>-->
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">First Name</label>
        <input type="text" id="multicol-first-name" class="form-control" name="first_name" value="{{ $user->first_name }}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-last-name">Last Name</label>
        <input type="text" id="multicol-last-name" class="form-control" name="surname" value="{{$user->surname}}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="middle-name">Middle Name</label>
        <input type="text" id="middle-name" class="form-control" name="middle_name" value="{{$user->middle_name}}" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-country">Select Gender</label>
        <select id="multicol-country" class="select2 form-select" name="gender" data-allow-clear="true">
          <option value="">Select</option>
          <option value="Male" {{ ($user->gender == "Male")? "selected": "" }}>Male</option>
          <option value="Female" {{ ($user->gender == "Female")? "selected": "" }}>Female</option>
        </select>
      </div>
    </div>

    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
      <button type="reset" class="btn btn-label-secondary">Cancel</button>
    </div>
  </form>
</div>

@endsection