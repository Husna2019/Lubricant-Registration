@extends('layouts/layoutMaster') 

@section('title', 'Home')

@section('content')
<div class="card">
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif 

  <div class="card-body">
    <h5 class="card-title">Assign Role and Permissions to User: {{ $user->first_name }} {{ $user->last_name }}</h5>

    <!-- Form to assign role and permissions -->
    <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
      @csrf
      @method('POST') <!-- Specify POST method for role assignment -->

      <!-- Permissions Checklist -->
      <div class="mb-4">
        <h6>Available Permissions:</h6>
        @if($permissions->isEmpty())
          <p>No permissions available.</p>
        @else
          <div class="form-check">
            @foreach($permissions as $permission)
              <div class="mb-2">
                <input 
                  type="checkbox" 
                  name="permissions[]" 
                  id="permission-{{ $permission->id }}" 
                  value="{{ $permission->name }}" 
                  class="form-check-input"
                >
                <label for="permission-{{ $permission->id }}" class="form-check-label">
                  {{ ucfirst($permission->name) }}
                </label>
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <!-- Role selection dropdown -->
      <div class="mb-3">
        <label class="form-label" for="role">Assign Role</label>
        <select name="role" id="role" class="form-select">
          <option value="">Select a Role</option>
          @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
          @endforeach
        </select>

        <!-- Display validation error for 'role' -->
        @error('role')
          <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary">Assign Role and Permissions</button>
    </form>
  </div>
</div>
@endsection
