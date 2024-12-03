@extends('layouts.layoutMaster')

@section('title', 'Request Modification')

@section('content')
<div class="container mt-5">
    <div class="content-header mb-4 text-center">
        <h2>Request Modification</h2>
        <p class="text-muted">Submit your request for modifications below. Please provide detailed information to help us process your request efficiently.</p>
    </div>
    
    <form >
        @csrf

        <!-- Company Details Section -->
        <div id="account-details" class="mb-4">
            <h4 class="mb-3">Company Details</h4>
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="ewuraLicense">EWURA Lubricant Wholesale Licence:</label>
                    <select class="form-control select2" id="ewuraLicense" name="license">
                        <option value="">Choose one option</option>
                        <option value="licensed" name="license">Licensed</option>
                        <option value="notLicensed" name="license">Not Licensed</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="companyName">Name of the Company:</label>
                    <input type="text" class="form-control" id="companyName" name="company_name">
                </div>
                <div class="col-sm-6 form-password-toggle">
                    <label for="region">Region:</label>
                    <select class="form-control" id="region" name="region">
                        <option value="">Select Region</option>
                        <option value="Dodoma">Dodoma</option>
                        <option value="Mwanza">Mwanza</option>
                        <option value="Mbeya">Mbeya</option>
                        <option value="Moshi">Moshi</option>
                        <option value="Tabora">Tabora</option>
                        <option value="Singida">Singida</option>
                        <option value="Kilimanjaro">Kilimanjaro</option>
                        <option value="Dar Es Salaam">Dar es Salaam</option>
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
                    <label for="Telephone">Telephone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone">
                </div>
                <div class="col-sm-6">
                    <label for="Email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
        </div>

        <!-- Personal Info Section -->
        <div id="personal-info" class="mb-4">
            <h4 class="mb-3">Personal Info</h4>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="col-sm-6">
                    <label for="pobox" class="form-label">P.O Box</label>
                    <input type="text" id="pobox" class="form-control" name="address2">
                </div>
                <div class="col-sm-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" class="form-control" name="title">
                </div>
                <div class="col-sm-6">
                    <label for="cellphone" class="form-label">Cellphone</label>
                    <input type="text" id="cellphone" class="form-control" name="cellphone">
                </div>
                <div class="col-sm-6">
                    <label for="cellphone1" class="form-label">Alternative Phone Number</label>
                    <input type="text" id="cellphone1" class="form-control" name="cellphone1">
                </div>
                <div class="col-sm-6">
                    <label for="email2" class="form-label">Email</label>
                    <input type="email" id="email2" class="form-control" name="email2">
                </div>
            </div>
        </div>

        <!-- Lubricant Details Section -->
        <div id="lubricant-details" class="mb-4">
            <h4 class="mb-3">Lubricant Details</h4>
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
        </div>

        <!-- Supporting Documents Section -->
        <div id="supporting-documents" class="mb-4">
            <h4 class="mb-3">Supporting Documents</h4>
            <div class="table-responsive">
                <table class="table" style="width: 90%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <thead style="background-color: #c9e4e3; color: white;">
                        <tr>
                            <th>S/No</th>
                            <th>No & Name of Certification</th>
                            <th>Upload Certification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #f2f2f2;">
                            <td>1</td>
                            <td>
                                <label for="brand_ownership">Proof of Brand Ownership <span style="color: red; font-weight: bold;">(Mandatory)</span></label>
                            </td>
                            <td>
                                <input type="file" id="brand_ownership" name="brand_ownership" style="width: 100%; padding: 5px; font-size: 14px;">
                            </td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td>2</td>
                            <td>
                                <label for="certification_bodies">Proof of Certification by Certification Bodies <span style="color: red; font-weight: bold;">(Mandatory)</span></label>
                            </td>
                            <td>
                                <input type="file" id="certification_bodies" name="certification_bodies" style="width: 100%; padding: 5px; font-size: 14px;">
                            </td>
                        </tr>
                        <tr style="background-color: #f2f2f2;">
                            <td>3</td>
                            <td>
                                <label for="tbs_licence">Certified Copy of TBS Licence for Locally Blended Lubricant (Optional)</label>
                            </td>
                            <td>
                                <input type="file" id="tbs_licence" name="tbs_licence" style="width: 100%; padding: 5px; font-size: 14px;">
                            </td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td>4</td>
                            <td>
                                <label for="equipment_manufacturer">Proof from Original Equipment Manufacturer (Optional)</label>
                            </td>
                            <td>
                                <input type="file" id="equipment_manufacturer" name="equipment_manufacturer" style="width: 100%; padding: 5px; font-size: 14px;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Submission Buttons -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success me-2">Submit Request</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Add Lubricant button click
        const addLubricantButton = document.getElementById('addLubricantRow');
        const lubricantTableBody = document.querySelector('#lubricantTable tbody');

        addLubricantButton.addEventListener('click', function() {
            const rowCount = lubricantTableBody.rows.length + 1; // Increment row number

            // Create a new row
            const newRow = document.createElement('tr');

            // Insert columns (cells) in the new row
            newRow.innerHTML = `
                <td>${rowCount}</td>
                <td><input type="text" class="form-control" name="lubricant_name[]" placeholder="Lubricant Name"></td>
                <td><input type="text" class="form-control" name="lubricant_type[]" placeholder="Lubricant Type"></td>
                <td><input type="text" class="form-control" name="performance_level[]" placeholder="Performance Level"></td>
                <td><input type="text" class="form-control" name="brand[]" placeholder="Brand"></td>
                <td><input type="text" class="form-control" name="certification_no_name[]" placeholder="Certification No & Name"></td>
            `;

            // Append the new row to the table body
            lubricantTableBody.appendChild(newRow);
        });
    });
</script>
@endsection
