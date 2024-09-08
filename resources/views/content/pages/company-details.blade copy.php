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
    <small class="text-light fw-medium">User registration</small>
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
              <svg viewBox="0 0 54 54">
                <use xlink:href="{{asset('assets/svg/icons/contact.svg#contact')}}"></use>
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
              <svg viewBox="0 0 54 54">
                <use xlink:href="{{asset('assets/svg/icons/lubricant.svg#lubricant')}}"></use>
              </svg>
            </span>
            <span class="bs-stepper-label">Lubricant Details</span>
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
      <form method="POST" action="{{ route('submit')}}">
        @csrf
        <div class="bs-stepper-content">
          <!-- Company Details -->
          <div id="account-details" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">Company Details</h6>
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
                <input type="text" class="form-control" id="companyName" name="company_Name">
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label for="region">Region:</label>
                <select class="form-control" id="region" name="region">
                  <Add options for regions>
                    <option value="region1">Select Region</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="region3">Mbeya</option>
                    <option value="region3">Moshi</option>
                    <option value="region3">Tabora</option>
                    <option value="region3">Singida</option>
                    <option value="region3">Kilimanjaro</option>
                    <option value="region3">Dar es salam</option>
                </select>
              </div>
              <div class="col-sm-6 form-password-toggle">
                <label for="block">Block:</label>
                <input type="text" class="form-control" id="block" name="block">
              </div>

              <div class="col-sm-6">
                <label for="Address">Address:</label>
                <input type="text" class="form-control" id="Address" name="address">
              </div>

              <div class="col-sm-6">
                <label for="Telephone">telephone:</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
              </div>

              <div class="col-sm-6">
                <label for="Email">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>

              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>
          <!-- <div class="btn btn-success btn-submit">Submit</div> -->
      </form>
      <!-- Personal Info -->
      <div id="personal-info" class="content">
        <div class="content-header mb-3">
          <h6 class="mb-0">Contact Person Details</h6>
          <small>Enter Your person Details</small>
        </div>
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label" for="first-name"> Name</label>
            <input type="text" id="name" class="form-control" name="name" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="last-name">Tittle</label>
            <input type="text" id="title" class="form-control" name="tittle" />
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="country">P.O. Box</label>
            <input type="text" id="address" class="form-control" name="address" />
          </div>


          <div class="col-sm-6">
            <label class="form-label" for="country">Cellphone</label>
            <input type="number" id="cellphone" class="form-control" name="cellphone" />
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="country">Altenative Phone Number</label>
            <input type="number" id="cellphone1" class="form-control" name="cellphone1" />
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="country">email</label>
            <input type="email" id="email" class="form-control" name="email" />
          </div>




          <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
          </div>
        </div>
      </div>

      <!-- Lubricant Details -->
      <div id="address" class="content">
        <div class="content-header mb-3">
          <h6 class="mb-0">Address</h6>
          <small>Enter Your Address.</small>
        </div>
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


        <div class="col-12 d-flex justify-content-between">
          <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
        </div>
      </div>
    </div>

    <!-- Supporting documents -->
    <div id="social-links" class="content">
      <div class="content-header mb-3">
        <h6 class="mb-0">Social Links</h6>
        <small>Enter Your Social Links.</small>
      </div>
      <div class="row g-3">
        <table class="table" style="margin: 0 auto;">
          <thead>
            <tr>
              <th>S/No</th>
              <th>No & Name of Certification</th>
              <th>Upload Certification</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <select class="form-control" name="certification_type[]">
                  <option value="proof_of_brand_ownership">Select certificate type</option>
                  <option value="proof_of_brand_ownership">Proof of Brand Ownership</option>
                  <option value="proof_of_certification">Proof of Certification by Certification Bodies</option>
                  <option value="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant</option>
                  <option value="oem_proof">Proof from Original Equipment Manufacturer</option>
                </select>
              </td>

              <td><input type="file" class="form-control-file" name="certification_file[]"></td>


            </tr>


            <tr>
              <td>2</td>
              <td>
                <select class="form-control" name="certification_type[]">
                  <option value="proof_of_brand_ownership">Select certificate type</option>
                  <option value="proof_of_brand_ownership">Proof of Brand Ownership</option>
                  <option value="proof_of_certification">Proof of Certification by Certification Bodies</option>
                  <option value="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant</option>
                  <option value="oem_proof">Proof from Original Equipment Manufacturer</option>
                </select>
              </td>
              <td><input type="file" class="form-control-file" name="certification_file[]"></td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <select class="form-control" name="certification_type[]">
                  <option value="proof_of_brand_ownership">Select certificate type</option>
                  <option value="proof_of_brand_ownership">Proof of Brand Ownership</option>
                  <option value="proof_of_certification">Proof of Certification by Certification Bodies</option>
                  <option value="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant</option>
                  <option value="oem_proof">Proof from Original Equipment Manufacturer</option>
                </select>
              </td>
              <td><input type="file" class="form-control-file" name="certification_file[]"></td>
            </tr>

            <tr>
              <td>4</td>
              <td>
                <select class="form-control" name="certification_type[]">
                  <option value="proof_of_brand_ownership">Select certificate type</option>
                  <option value="proof_of_brand_ownership">Proof of Brand Ownership</option>
                  <option value="proof_of_certification">Proof of Certification by Certification Bodies</option>
                  <option value="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant</option>
                  <option value="oem_proof">Proof from Original Equipment Manufacturer</option>
                </select>
              </td>

              <td><input type="file" class="form-control-file" name="certification_file[]"></td>


            </tr>

          </tbody>
        </table>



        <div class="col-12 d-flex justify-content-between">
          <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
        </div>
      </div>
    </div>
    <!-- Review -->
    <div id="review-submit" class="content">

      <p class="fw-medium mb-2">Company details</p>
      <ul class="list-unstyled">
        <li>Name of the company:</li>
        <li>Region:</li>
        <li>block:</li>
        </li>
        <li>p.o Box:</li>
        <li>Telephone:</li>
        <li>Email:</li>

      </ul>
      <hr>
      <p class="fw-medium mb-2">Contact Person Details</p>
      <ul class="list-unstyled">
        <li>Name:</li>
        <li>Tittle:</li>
        <li>P.o box:</li>
        <li>Cekkphone:</li>
        <li>Email</li>

      </ul>
      <hr>
      <p class="fw-medium mb-2">Lubricant Details</p>
      <ul class="list-unstyled">
        <li>S/N:</li>
        <li>lubricant Name:</li>
        <li>Lubricant Type:</li>
        <li>Lubricant Performance Level:</li>
        <li>Lubricant Brand:</li>
        <li>No and Certification Name:</li>

      </ul>
      <hr>
      <p class="fw-medium mb-2">Supporting Documents</p>
      <ul class="list-unstyled">
        <li>S/N:</li>
        <li>No and Name of Certificatio</li>

      </ul>
      <div class="col-12 d-flex justify-content-between">
        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
          <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <!-- <button class="btn btn-success btn-submit">Submit</button> -->
      </div>
    </div>
    </form>
  </div>
</div>
</div>
<!-- /Default Icons Wizard -->
</div>


<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#addLubricantRow').click(function() {
      $('#lubricantTable').append(`
        <tr>
          <td><input type="number" class="form-control"></td>
          <td><input type="text" class="form-control"></td>
          <td>
            <select class="form-control" name="Lubricant_detail">
              <option value="gearOil" n>Gear Oil</option>
              <option value="hydraulicOil">Hydraulic Oil</option>
              <option value="engineOil">Engine Oil</option>
              <option value="atf">ATF</option>
              <option value="transformerOil">Transformer Oil</option>
              <option value="other">Other</option>
            </select>
          </td>
          <td><input type="text" class="form-control"></td>
          <td><input type="text" class="form-control"></td>
          <td><input type="text" class="form-control"></td>
        </tr>
      `);
    });
  });
</script>-->

@endsection
