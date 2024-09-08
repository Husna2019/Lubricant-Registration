@extends('layouts.myapp')

@section('content')

<body style="background-color: #0000;"> <!-- Change the color code to your desired background color -->
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



          <h3 style="text-align: center;">C. LUBRICANT DETAILS</h3>
          <div class="form-group">
            <label for="lubricantTable">Lubricant Details:</label>
            <table class="table" id="lubricantTable">
              <thead>
                <tr>
                  <th name="SerialNumbe">S/No</th>
                  <th name="lubricant_Name">Lubricant Name</th>
                  <th name="lubricant_type">Lubricant Type</th>
                  <th name="lubricant_Perfomance_Level">Lubricant Performance Level</th>
                  <th name="lubricant_Brand">Lubricant Brand </th>
                  <th name="number_Certification">No & Certification Name</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="addLubricantRow">Add Lubricant</button>
          </div>




        </form>
      </div>
    </div>
</body>

@endsection
