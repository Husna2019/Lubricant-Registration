@extends('layouts/layoutMaster')

@section('title', 'User registration')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/jquery/jquery.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')

<!-- Default -->
<div class="row">

  <!-- Default Icons Wizard -->
  <div class="col-12 mb-4">

    <div class="bs-stepper wizard-icons wizard-icons-example mt-2">

      <div class="bs-stepper-header">
        <div class="step" data-target="#account-details">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-icon">
              <svg viewBox="0 0 54 54">
                <use xlink:href="{{asset('assets/svg/icons/company.svg#company')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Company Details</span>
          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#personal-info">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-icon">
              <svg viewBox="0 0 58 54">
                <use xlink:href="{{asset('assets/svg/icons/contacts.svg#contacts')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Contact Person</span>
          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#address">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-icon">
              <svg viewBox="0 0 58 54">
                <use xlink:href="{{asset('assets/svg/icons/lubricants.svg#lubricants')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Lubricant details</span>
          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#social-links">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-icon">
              <svg viewBox="0 0 54 54">
                <use xlink:href="{{asset('assets/svg/icons/document.svg#document')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Supporting Documents</span>
          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#review-submit">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-icon">
              <svg viewBox="0 0 54 54">
                <use xlink:href="{{asset('assets/svg/icons/submit.svg#submit')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Review & Submit</span>
          </button>
        </div>
      </div>

      <div class="bs-stepper-content">
        <form method="POST" action="{{ route('submit')}}" enctype="multipart/form-data">
          @csrf
          <!-- Account Details -->
          <div id="account-details" class="content">
            <div class="content-header mb-3">
              
              <small>Enter Your Company Details.</small>
            </div>
            <div class="row g-3">
              <div class="col-sm-12">
                <label for="ewuraLicense">EWURA Lubricant Wholesale Licence:</label>
                <select class="form-control select2" id="ewuraLicense" name="license">
                  <option value="">Choose one option</option>
                  <option value="licensed" name="lincese">Licensed</option>
                  <option value="notLicensed" name="lincese">Not Licensed</option>
                </select>

              </div>
              <div class="col-sm-6">
                <label for="companyName">Name of the Company:</label>
                <input type="text" class="form-control {{ ($errors->has('company_name')) ? 'is-invalid' : '' }}" id="companyName" name="company_name">
                @if($errors->has('company_name'))
                <span class="small danger">{{ $errors->first('company_name') }}</span>
                @endif
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label for="region">Region:</label>
                <select class="form-control {{ ($errors->has('region')) ? 'is-invalid' : '' }}" id="region" name="region">
                  @if($errors->has('region'))
                  <span class="small danger">{{ $errors->first('region') }}</span>
                  @endif
                  <Add options for regions>
                    <option value="--Select--">Select Region</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="Mbeya">Mbeya</option>
                    <option value="Moshi">Moshi</option>
                    <option value="Tabora">Tabora</option>
                    <option value="Singida">Singida</option>
                    <option value="Klimanjaro">Kilimanjaro</option>
                    <option value="Dar Es Salaam">Dar es salam</option>
                </select>
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label for="block">Block:</label>
                <input type="text" class="form-control {{ ($errors->has('block')) ? 'is-invalid' : '' }}" id="block" name="block">

                @if($errors->has('block'))
                <span class="small danger">{{ $errors->first('block') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label for="Address">Address:</label>
                <input type="text" class="form-control {{ ($errors->has('address')) ? 'is-invalid' : '' }}" id="Address" name="address">
                @if($errors->has('address'))
                <span class="small danger">{{ $errors->first('address') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label for="Telephone">telephone:</label>
                <input type="text" class="form-control {{ ($errors->has('telephone')) ? 'is-invalid' : '' }}" id="telephone" name="telephone">
                @if($errors->has('telephone'))
                <span class="small danger">{{ $errors->first('telephone') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label for="Email">Email:</label>
                <input type="text" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email" name="email">
                @if($errors->has('email'))
                <span class="small danger">{{ $errors->first('email') }}</span>
                @endif
              </div>

              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                
                <button type="submit" class="btn btn-success" id="saveBtn">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span> <i class="ti ti-save"></i>
                </button>
                <button type="button" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>






          <!-- Personal Info -->
          <div id="personal-info" class="content">
            <div class="content-header mb-3">
              
              <small>Enter Your Personal Info.</small>
            </div>
            <div class="row g-3">

              <div class="col-sm-6">
                <label class="form-label" for="name"> Name</label>
                <input type="text" id="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" name="name" />
                @if($errors->has('name'))
                <span class="small danger">{{ $errors->first('name') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label class="form-label" for="pobox">P.O Box</label>
                <input type="text" id="pobox" class="form-control {{ ($errors->has('address2')) ? 'is-invalid' : '' }}" name="address2" />
                @if($errors->has('address2'))
                <span class="small danger">{{ $errors->first('address2') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label class="form-label" for="title">Title</label>
                <input type="text" id="title" class="form-control {{ ($errors->has('title')) ? 'is-invalid' : '' }}" name="title" />
                @if($errors->has('title'))
                <span class="small danger">{{ $errors->first('title') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label class="form-label" for="country">Cellphone</label>
                <input type="text" id="cellphone" class="form-control {{ ($errors->has('cellphone')) ? 'is-invalid' : '' }}" name="cellphone" />
                @if($errors->has('cellphone'))
                <span class="small danger">{{ $errors->first('cellphone') }}</span>
                @endif
              </div>

              <div class="col-sm-6">
                <label class="form-label" for="cellphone1">Altenative Phone Number</label>
                <input type="text" id="cellphone1" class="form-control {{ ($errors->has('cellphone1')) ? 'is-invalid' : '' }}" name="cellphone1" />
                @if($errors->has('cellphone1 '))
                <span class="small danger">{{ $errors->first('cellphone1') }}</span>
                @endif
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="email">email</label>
                <input type="email" id="email" class="form-control {{ ($errors->has('email2')) ? 'is-invalid' : '' }}" name="email2" />
                @if($errors->has('email2'))
                <span class="small danger">{{ $errors->first('email2') }}</span>
                @endif
              </div>

              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="submit" class="btn btn-success" id="saveBtn">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span> <i class="ti ti-save"></i>
                </button>
              
               
                <button type="button" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>





         <!-- Lubricant Details Section -->
<div class="row g-3">
  <div id="address" class="content">
    <div class="content-header mb-3">

      <small class="text-muted">Enter your lubricant details below.</small>
    </div>

    <!-- Table Section -->
    <div class="form-group">
      <label for="lubricantTable" class="form-label">Lubricant Details</label>
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="lubricantTable">
          <thead class="table-primary">
            <tr>
              <th scope="col">S/No</th>
              <th scope="col">Lubricant Name</th>
              <th scope="col">Lubricant Type</th>
              <th scope="col">Performance Level</th>
              <th scope="col">Brand</th>
              <th scope="col">Certification No & Name</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dynamic Rows Go Here -->
          </tbody>
        </table>
      </div>
      <button type="button" class="btn btn-sm btn-primary mt-3" id="addLubricantRow">
        <i class="ti ti-plus me-1"></i>Add Lubricant
      </button>
    </div>

    <!-- Navigation Buttons -->
    <div class="col-12 d-flex justify-content-between mt-4">
      <button type="button" class="btn btn-label-secondary btn-prev">
        <i class="ti ti-arrow-left me-sm-1"></i>
        <span class="align-middle">Previous</span>
      </button>
      <button type="submit" class="btn btn-success" id="saveBtn">
        <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span> <i class="ti ti-save"></i>
      </button>
      <button type="button" class="btn btn-primary btn-next">
        <span class="align-middle me-sm-1">Next</span>
        <i class="ti ti-arrow-right"></i>
      </button>
    </div>
  </div>
</div>





          <!-- Supporting documents -->
          <div id="social-links" class="content">
            <div class="content-header mb-3">
            
              <small>Enter Your Documents</small>
            </div>
            <div class="row g-3">
              <table class="table" style="width: 90%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
                <thead style="background-color: #c9e4e3; color: white;">
                  <tr>
                    <th style="text-align: left; padding: 10px 15px; border: 1px solid #ddd; text-transform: uppercase; letter-spacing: 0.05em;">S/No</th>
                    <th style="text-align: left; padding: 10px 15px; border: 1px solid #ddd; text-transform: uppercase; letter-spacing: 0.05em;">No & Name of Certification</th>
                    <th style="text-align: left; padding: 10px 15px; border: 1px solid #ddd; text-transform: uppercase; letter-spacing: 0.05em;">Upload Certification</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="background-color: #f2f2f2;">
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">1</td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <label for="brand_ownership">Proof of Brand Ownership <span style="color: red; font-weight: bold;">(Mandatory)</span></label>
                    </td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <input type="file" id="brand_ownership" name="brand_ownership" style="width: 100%; padding: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr style="background-color: #fff;">
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">2</td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <label for="certification_bodies">Proof of Certification by Certification Bodies <span style="color: red; font-weight: bold;">(Mandatory)</span></label>
                    </td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <input type="file" id="certification_bodies" name="certification_bodies" style="width: 100%; padding: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr style="background-color: #f2f2f2;">
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">3</td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <label for="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant (Optional)</label>
                    </td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <input type="file" id="tbs_licence" name="tbs_licence" style="width: 100%; padding: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr style="background-color: #fff;">
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">4</td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <label for="equipment_manufacturer">Proof from Original Equipment Manufacturer (Optional)</label>
                    </td>
                    <td style="text-align: left; padding: 10px 15px; border: 1px solid #ddd;">
                      <input type="file" id="equipment_manufacturer" name="equipment_manufacturer" style="width: 100%; padding: 5px; font-size: 14px;">
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="submit" class="btn btn-success" id="saveBtn">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span> <i class="ti ti-save"></i>
                </button>
                <button type="button" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>





          <!-- Review -->
          <div id="review-submit" class="content">

            <div class="row g-3">
              <div class="col-sm-6">
                <p class="fw-medium mb-2"><strong>Company details</strong></p>
                <ul class="list-unstyled">
                  <li>Name of the company: <span id="compName"></span></li>
                  <li>Region:<span id="region1"></span></li>
                  <li>block: <span id="block1"></span></li>
                  <li>p.o Box:<span id="Address1"></span></li>
                  <li>Telephone:<span id="telephone1"></span></li>
                  <li>Email:<span id="email3"></span></li>
                </ul>
              </div>

              <div class="col-sm-6">
                <p class="fw-medium mb-2"><strong>Contact Person Details</strong></p>
                <ul class="list-unstyled">
                  <li>Name:<span id="name1"></span></li>
                  <li>Tittle:<span id="address2"></span></li>
                  <li>P.o box:<span id="title1"></span></li>
                  <li>Cellphone:<span id="cellphone12"></span></li>
                  <li>Altenative phone number:<span id="cellphone11"></span></li>
                  <li>Email:<span id="email22"></span></li>
                </ul>
              </div>
              <hr>

              <div class="col-sm-6">
                <p class="fw-medium mb-2"><strong>Lubricant Details</strong></p>
                <ul class="list-unstyled">
                  <li>S/N:</li>
                  <li>lubricant Name:</li>
                  <li>Lubricant Type:</li>
                  <li>Lubricant Performance Level:</li>
                  <li>Lubricant Brand:</li>
                  <li>No and Certification Name:</li>
                </ul>
              </div>

              <div class="col-sm-6">
                <p class="fw-medium mb-2"><strong> Documents</strong></p>
                <ul class="list-unstyled">
                  <li>S/N:</li>
                  <li>No and Name of Certification:</li>
                </ul>
              </div>
            </div>








            <!-- Applicant Declaration -->
            <div class="form-group">
              <label for="applicantDeclaration"><strong style="color: red;"> Declaration*</strong></label>

              <textarea class="form-control" id="applicantDeclaration" rows="3" readonly>I hereby declare that I am authorized to make this application on behalf of the applicant and that to the best of my knowledge, the information supplied herein is correct and that within a reasonable period of time after notice, I undertake to provide whatever additional information EWURA may require in order to evaluate this application.</textarea>
            </div>

            <!-- Checkbox for Declaration -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="declarationCheckbox">
              <label class="form-check-label" for="declarationCheckbox">
                I agree to the declaration above.
              </label>
            </div>



            <div class="col-12 d-flex justify-content-between">
              <button type="button" class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button type="submit" class="btn btn-success btn-submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Default Icons Wizard -->
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // var rowCounter = 1; // Initialize row counter

  // document.getElementById("addLubricantRow").addEventListener("click", function() {
  //   var table = document.getElementById("lubricantTable").getElementsByTagName('tbody')[0];
  //   var newRow = table.insertRow();

  //   var cell0 = newRow.insertCell(0);

  //   cell0.textContent = rowCounter++;

  //   var cells = ['lubricant_name', 'lubricant_type', 'lubricant_performance_level', 'lubricant_brand', 'certification_name'];

  //   for (var i = 0; i < 6; i++) {
  //     var cell = newRow.insertCell(i);
  //     var input = document.createElement("input");
  //     input.type = "text";
  //     input.className = "form-control"; // Bootstrap class for styling
  //     input.name = cells[i] + "[]";
  //     cell.appendChild(input);
  //   }

  // cells[0].innerText = table.rows.length; // Serial Number
  // });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  //SCRIPT FOR COMPANY DETAILS
  $(document).ready(function() {
    $('#companyName').keyup(function() {
      var value = $(this).val();
      $('#compName').text(value);
    });
    $('#region').change(function() {
      var value = $(this).val();
      $('#region1').text(value);
    });
    $('#block').keyup(function() {
      var value = $(this).val();
      $('#block1').text(value);
    });
    $('#Address').keyup(function() {
      var value = $(this).val();
      $('#Address1').text(value);
    });
    $('#telephone').keyup(function() {
      var value = $(this).val();
      $('#telephone1').text(value);
    });
    $('#email').keyup(function() {
      var value = $(this).val();
      $('#email3').text(value);
    });
    $('#block').keyup(function() {
      var value = $(this).val();
      $('#block1').text(value);
    });


    //SCRIPT FOR CONTACT PERSON
    $('#name').keyup(function() {
      var value = $(this).val();
      $('#name1').text(value);
    });
    $('#pobox').keyup(function() {
      var value = $(this).val();
      $('#address2').text(value);
    });
    $('#title').keyup(function() {
      var value = $(this).val();
      $('#title1').text(value);
    });
    $('#cellphone').keyup(function() {
      var value = $(this).val();
      $('#cellphone12').text(value);
    });
    $('#cellphone1').keyup(function() {
      var value = $(this).val();
      $('#cellphone11').text(value);
    });
    $('#email').keyup(function() {
      var value = $(this).val();
      $('#email22').text(value);
    });




    //for lubricant
    // $('#block').keyup(function() {
    //   var value = $(this).val();
    //   $('#block1').text(value);
    // });
    // $('#block').keyup(function() {
    //   var value = $(this).val();
    //   $('#block1').text(value);
    // });
    // $('#block').keyup(function() {
    //   var value = $(this).val();
    //   $('#block1').text(value);
    // });
    // $('#block').keyup(function() {
    //   var value = $(this).val();
    //   $('#block1').text(value);
    // });


  });
</script>








<script>
  //SCRIPT FOR LUBRICANT
  document.getElementById("addLubricantRow").addEventListener("click", function() {
    var table = document.getElementById("lubricantTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cells = [];
    var cellNames = ['bbyhu', 'lubricant_name', 'lubricant_type', 'lubricant_performance_level', 'lubricant_brand', 'certification_name'];


    for (var i = 0; i < 6; i++) {
      cells.push(newRow.insertCell(i));
      if (i == 2) {
        var input = document.createElement("select");
        input.className = "form-control select2"; // Bootstrap class for styling
        var option1 = document.createElement("option");
        option1.text = "select";
        input.add(option1);

        var option2 = document.createElement("option");
        option2.text = "Gear oil";
        input.add(option2);

        var option2 = document.createElement("option");
        option2.text = "Hydraulic oil";
        input.add(option2);

        var option2 = document.createElement("option");
        option2.text = "Engine oil";
        input.add(option2);

        var option2 = document.createElement("option");
        option2.text = "ATF";
        input.add(option2);

        var option2 = document.createElement("option");
        option2.text = "Transformer oil";
        input.add(option2);


        var option2 = document.createElement("option");
        option2.text = "Others";
        input.add(option2);

      } else {
        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control"; // Bootstrap class for styling
      }
      input.name = cellNames[i] + "[]";
      cells[i].appendChild(input);
    }

    cells[0].innerText = table.rows.length; // Serial Number
  });
</script>





@endsection