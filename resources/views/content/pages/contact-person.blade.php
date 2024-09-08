@extends('layouts.myapp')

@section('content')

<body style="background-color:#A0D6B4 ">
  <div class="container">
    @if(session('status'))
    <div class="alert alert-success">
      {{ session('status')}}
    </div>
    @endif

    <div class="card mx-auto" style="width: 800px;">
      <div class="card-body">
        <form method="POST" action="{{ url('submit_Form')}}">
          @csrf
          <h3 style="text-align: center;">B.DETAILS OF THE CONTACT PERSON</h3>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="contactPersonName">Name:</label>
              <input type="text" class="form-control" id="contactPersonName">
            </div>
            <div class="form-group col-md-6">
              <label for="contactPersonTitle">Title:</label>
              <input type="text" class="form-control" id="contactPersonTitle">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="contactPersonPOBox">P.O Box:</label>
              <input type="text" class="form-control" id="contactPersonPOBox">
            </div>
            <div class="form-group col-md-6">
              <label for="contactPersonCellPhone">Cell Phone:</label>
              <input type="tel" class="form-control" id="contactPersonCellPhone">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="contactPersonAltPhone">Alternative Phone:</label>
              <input type="tel" class="form-control" id="contactPersonAltPhone">
            </div>
            <div class="form-group col-md-6">
              <label for="contactPersonEmail">Email:</label>
              <input type="email" class="form-control" id="contactPersonEmail">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
@endsection