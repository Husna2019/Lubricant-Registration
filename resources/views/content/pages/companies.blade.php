<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body>
  <form method="POST" action="{{ route('submit') }}">
    @csrf
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
            <option value="licensed" name="license">Licensed</option>
            <option value="notLicensed" name="license">Not Licensed</option>
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


        <button class="btn btn-success btn-submit">Submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>