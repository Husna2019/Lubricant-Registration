<?php

namespace App\Http\Controllers\pages;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\ContactPerson;
use App\Models\LubricantDetail;
use App\Models\SupportingDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegLubricantController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  // public function companies()
  // {

  //  return view('content/pages/companies');
  //}





  public function companyDetails()
  {

    return view('content/pages/company-details');
  }


  public function submit(Request $request)
  {
    //validate form data

    // dd($request->all());
    //for company details
    $validateData = $request->validate([
      'company_name' => 'required|string',
      'license' => 'required|in:licensed,notLicensed',
      'region' => 'required|string',
      'block' => 'required|string',
      'address' => 'required|string',
      'telephone' => 'required|string',
      'email' => 'required|string',

      //for contact person
      'name' => 'required|string',
      'title' => 'required|string',
      'address2' => 'required|string',
      'cellphone' => 'required|string',
      'cellphone1' => 'required|string',
      'email2' => 'required|string',

      //for lubricant
      'lubricant_name.*' => 'required|string',
      'lubricant_type.*' => 'required|string',
      'lubricant_performance_level.*' => 'required|string',
      'lubricant_brand.*' => 'required|string',
      'certification_name.*' => 'required|string',



      //for supporting document
      //  'certification.*' => 'required|string',
      // 'file.*' => 'required|file|max:2048',
    ]);





    //dd($validateData);

    //create a new company instance

    $companyDetails = new CompanyDetail;
    $companyDetails->company_Name = $validateData['company_name'];
    $companyDetails->license = $validateData['license'];
    $companyDetails->region = $validateData['region'];
    $companyDetails->block = $validateData['block'];
    $companyDetails->address = $validateData['address'];
    $companyDetails->telephone = $validateData['telephone'];
    $companyDetails->email = $validateData['email'];
    $companyDetails->user_id = Auth::id();

    // dd($companyDetails);
    //save the company to the database

    $companyDetails->save();
    // dd($company);

    $contactPerson = new ContactPerson;
    $contactPerson->name = $validateData['name'];
    $contactPerson->title = $validateData['title'];
    $contactPerson->address2 = $validateData['address2'];
    $contactPerson->cellphone = $validateData['cellphone'];
    $contactPerson->cellphone1 = $validateData['cellphone1'];
    $contactPerson->email2 = $validateData['email2'];
    $contactPerson->company_detail_id = $companyDetails->id;

    $contactPerson->save();




    // $lubricantDetail = new LubricantDetail;
    // $lubricantDetail->lubricant_name = $validateData['lubricant_name'];
    // $lubricantDetail->lubricant_type = $validateData['lubricant_type'];
    // $lubricantDetail->lubricant_brand = $validateData['lubricant_performance_level'];
    // $lubricantDetail->lubricant_type = $validateData['lubricant_brand'];
    // $lubricantDetail->lubricant_type = $validateData['certification_name'];


    $count = count($request->input('lubricant_name'));

    for ($i = 0; $i < $count; $i++) {
      LubricantDetail::create([
        'lubricant_name' => $request->input('lubricant_name')[$i],
        'lubricant_type' => $request->input('lubricant_type')[$i],
        'lubricant_performance_level' => $request->input('lubricant_performance_level')[$i],
        'lubricant_brand' => $request->input('lubricant_brand')[$i],
        'certification_name' => $request->input('certification_name')[$i],
        'company_detail_id' => $companyDetails->id,
      ]);
    }

    // return redirect()->back()->with('success', 'Lubricant details addes');


    $supportDocs = ['brand_ownership', 'certification_bodies', 'tbs_licence', 'equipment_manufacturer'];

    foreach ($supportDocs as $supportDoc) {

      if ($request->hasFile($supportDoc)) {

        $fileName = Uuid::uuid4()->toString() . '.' . $request->file($supportDoc)->getClientOriginalExtension();
        $request->file($supportDoc)->storeAs('public/uploads', $fileName);

        $documents = [
          'name' => $fileName,
          'path' => 'public/uploads/' . $fileName,
          'extension' => $request->file($supportDoc)->getClientOriginalExtension(),
          'size' => $request->file($supportDoc)->getSize(),
          'type' => $supportDoc,
          'company_detail_id' => $companyDetails->id,
        ];

        SupportingDocument::create($documents);
      }
    }

    return back()->with('success', 'Documents uploaded and information saved successfully!');
  }









  public function LubricantDetails()
  {

    return view('pages/LubricantDetails');
  }



  public function SupportingDocuments()
  {

    return view('pages/SupportingDocuments');
  }






  public function reapply()
  {
    return view('/re-apply');
  }


  public function viewResult()
  {
    return view('/view-result');
  }

  public function notification()
  {
    return view('/notification');
  }


  public function home()
  {
    return view('content/pages/pages-home');
  }
}
