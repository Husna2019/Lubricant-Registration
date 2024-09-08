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
                <form method="POST" action="{{ url('submit_Form')}}" >
                    @csrf

                    <h3 style="text-align: center;">D. SUPPORTING DOCUMENTS</h3>
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

                    <!-- Applicant Declaration -->
                    <div class="form-group">
                        <label for="applicantDeclaration">Applicant Declaration*</label>
                        <textarea class="form-control" id="applicantDeclaration" rows="3" readonly>I hereby declare that I am authorized to make this application on behalf of the applicant and that to the best of my knowledge, the information supplied herein is correct and that within a reasonable period of time after notice, I undertake to provide whatever additional information EWURA may require in order to evaluate this application.</textarea>
                    </div>

                    <!-- Checkbox for Declaration -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="declarationCheckbox">
                        <label class="form-check-label" for="declarationCheckbox">
                            I agree to the declaration above.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@endsection
