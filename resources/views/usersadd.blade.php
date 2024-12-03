@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/moment/moment.js',
'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/@form-validation/popular.js',
'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
'resources/assets/vendor/libs/@form-validation/auto-focus.js',
'resources/assets/vendor/libs/cleavejs/cleave.js',
'resources/assets/vendor/libs/cleavejs/cleave-phone.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/app-user-list.js',
'resources/assets/js/pages-auth.js'
])
@endsection

@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Users</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ $usersCount }}</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total Users</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="ti ti-user ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Verified Users</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ $verified }}</h3>
              <small class="text-success">(+95%)</small>
            </div>
            <small>Recent analytics </small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="ti ti-user-check ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Duplicate Users</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{'Duplicates'}}</h3>
              <small class="text-success">(0%)</small>
            </div>
            <small>Recent analytics</small>
          </div>
          <span class="badge bg-label-danger rounded p-2">
            <i class="ti ti-users ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Not Verified</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ $notVerified }}</h3>
              <small class="text-danger">(+6%)</small>
            </div>
            <small>Recent analytics</small>
          </div>
          <span class="badge bg-label-warning rounded p-2">
            <i class="ti ti-user-circle ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Users List Table -->
<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title mb-3">Search Filter</h5>
    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
      <div class="col-md-4 user_role"></div>
      <div class="col-md-4 user_plan"></div>
      <div class="col-md-4 user_status"></div>
    </div>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
      <thead class="border-top">
        <tr>
          <th></th>
          <th>Id</th>
          <!-- <th>Id</th> -->
          <th>Full name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php $i = 1 @endphp
        @foreach ($users as $user)
        <tr>
          <td></td>
          <td>{{ $i++ }}</td>
          <!-- <td>{{ $user->username }}</td> -->
          <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->surname }}</td>
          <td>{{ $user->email}}</td>
          <td>{{ $user->gender}}</td>
          <td>
            <div class="d-flex align-items-center">
              <a href="{{ route('users.edit', $user->id) }}" class="text-body">
                <i class="ti ti-edit ti-sm me-2"></i>
              </a>
              <a href="javascript:;" class="text-body delete-record">
                <i class="ti ti-trash ti-sm mx-2"></i>
              </a>
              <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm mx-1"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end m-0" style="">
                <a href="" class="dropdown-item">View</a>
                <a href="javascript:;" class="dropdown-item">Suspend</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="formAuthentication" class="add-new-user pt-0" method="post" action="{{ route('users.store') }}">
        @csrf
        <input type="hidden" name="id" id="user_id">
        <div class="row">
          <div class="mb-3 col-6">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" class="form-control {{ ($errors->has('first_name')) ? 'is-invalid' : '' }}" id="firstname" placeholder="" name="first_name" />
            @if($errors->has('first_name'))
            <span class="small danger">{{ $errors->first('first_name') }}</span>
            @endif
          </div>
          <div class="mb-3 col-6">
            <label class="form-label" for="middle-name">Middle Name</label>
            <input type="text" id="middle-name" class="form-control {{ ($errors->has('middle_name')) ? 'is-invalid' : '' }}" name="middle_name" />
            @if($errors->has('middle_name'))
            <span class="small danger">{{ $errors->first('middle_name') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="surname">Surname</label>
          <input type="text" id="surname" class="form-control {{ ($errors->has('surname')) ? 'is-invalid' : '' }}" name="surname" />
          @if($errors->has('surname'))
          <span class="small danger">{{ $errors->first('surname') }}</span>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input type="text" id="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" placeholder="name@domain.com" name="email" />
          @if($errors->has('email'))
          <span class="small danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <input type="text" id="username" class="form-control {{ ($errors->has('username')) ? 'is-invalid' : '' }}" placeholder="" name="username" />
          @if($errors->has('username'))
          <span class="small danger">{{ $errors->first('username') }}</span>
          @endif
        </div>


        <div class="row">
          <div class="mb-3 col-6">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" />
            @if($errors->has('password'))
            <span class="small danger">{{ $errors->first('password') }}</span>
            @endif

          </div>
          <div class="mb-3 col-6">
            <label class="form-labe l" for="confirm-password">Re-Enter Password</label>
            <input type="password" id="confirm-password" class="form-control {{ ($errors->has('re_ password')) ? 'is-invalid' : '' }}" name="re_password" />
            @if($errors->has('re_password'))
            <span class="small danger">{{ $errors->first('re_password') }}</span>
            @endif
          </div>

        </div>

        <div class="mb-3">
          <label class="form-label" for="gender">Gender</label>
          <select id="gender" name="gender" class="select2 form-select">
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <!-- <div class="mb-3">
          <label class="form-label" for="user-role">User Role</label>
          <select id="user-role" class="form-select">
            <option value="subscriber">Subscriber</option>
            <option value="editor">Editor</option>
            <option value="maintainer">Maintainer</option>
            <option value="author">Author</option>
            <option value="admin">Admin</option>
          </select>
        </div>-->
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </form>

      @foreach ($users as $user)
    <a href="{{ route('role', ['id' => $user->id]) }}" class="btn btn-primary">
        View {{ $user->name }}'s Roles
    </a>
@endforeach

    </div>
  </div>
</div>
@endsection