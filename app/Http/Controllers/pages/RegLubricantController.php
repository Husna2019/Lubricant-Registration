<?php

namespace App\Http\Controllers\pages;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\ChecklistItem;
use App\Models\ContactPerson;
use App\Models\LubricantDetail;
use App\Models\SupportingDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\CompanyStatusMail;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use App\Mail\ApplicationSubmissionFeedback;
use Inertia\Inertia;




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
    // Validate form data
    $validateData = $request->validate([
        'company_name' => 'required|string',
        'license' => 'required|in:licensed,notLicensed',
        'region' => 'required|string',
        'block' => 'required|string',
        'address' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|email',

        // Contact person
        'name' => 'required|string',
        'title' => 'required|string',
        'address2' => 'required|string',
        'cellphone' => 'required|string',
        'cellphone1' => 'required|string',
        'email2' => 'required|email',
    ]);

    // Generate application number
    $latestCompany = CompanyDetail::latest()->first();
    $year = now()->year;
    $incrementNumber = $latestCompany ? intval(substr($latestCompany->application_number, -4)) + 1 : 1;
    $formattedNumber = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT);
    $applicationNumber = "ALUB/{$year}/{$formattedNumber}";

    // Create a new company instance
    $companyDetails = new CompanyDetail;
    $companyDetails->company_name = $validateData['company_name'];
    $companyDetails->license = $validateData['license'];
    $companyDetails->region = $validateData['region'];
    $companyDetails->block = $validateData['block'];
    $companyDetails->address = $validateData['address'];
    $companyDetails->telephone = $validateData['telephone'];
    $companyDetails->application_number = $applicationNumber; // Assign application number
    $companyDetails->email = $validateData['email'];
    $companyDetails->user_id = Auth::id();
    $companyDetails->save();

    // Save contact person
    $contactPerson = new ContactPerson;
    $contactPerson->name = $validateData['name'];
    $contactPerson->title = $validateData['title'];
    $contactPerson->address2 = $validateData['address2'];
    $contactPerson->cellphone = $validateData['cellphone'];
    $contactPerson->cellphone1 = $validateData['cellphone1'];
    $contactPerson->email2 = $validateData['email2'];
    $contactPerson->company_detail_id = $companyDetails->id;
    $contactPerson->save();

    // Save lubricant details
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

    // Save supporting documents
    $supportDocs = ['brand_ownership', 'certification_bodies', 'tbs_licence', 'equipment_manufacturer'];
    foreach ($supportDocs as $supportDoc) {
        if ($request->hasFile($supportDoc)) {
            $fileName = Uuid::uuid4()->toString() . '.' . $request->file($supportDoc)->getClientOriginalExtension();
            $request->file($supportDoc)->storeAs('public/uploads', $fileName);

            SupportingDocument::create([
                'name' => $fileName,
                'path' => 'public/uploads/' . $fileName,
                'extension' => $request->file($supportDoc)->getClientOriginalExtension(),
                'size' => $request->file($supportDoc)->getSize(),
                'type' => $supportDoc,
                'company_detail_id' => $companyDetails->id,
            ]);
        }
    }

    // Send email notification
    Mail::to($validateData['email'])->send(new ApplicationSubmissionFeedback($companyDetails));

    return back()->with('success', 'Application submitted successfully! Your application number is: ' . $applicationNumber);
}








  public function LubricantDetails()
  {

    return view('pages/LubricantDetails');
  }



  public function SupportingDocuments()
  {

    return view('pages/SupportingDocuments');
  }






  public function reapply($id)
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
 

  //za permission
 

  public function assignReceive()
  {
    return view('/assignReceive');
  }

  //EVALUATE

  // public function evaluateLubricant($id)
  // {
  //   // Fetch details for the given ID
  //   $detail = Lubricant::findOrFail($id);
  //    // Pass the data to the evaluateLubricant view
  //   return view('/evaluateLubricant', compact('company'));
  // }

  public function evaluateLubricant($id)
{
  
    // Fetch the company details using the ID
    $detail =  CompanyDetail::with(['contactPeople', 'lubricantDetails', 'supportingDocuments'])->findOrFail($id);
   // dd($detail->id);
    // Pass the company details to the view
    return view('evaluateLubricant', compact('detail'));

    
}

  

  public function reviewEvaluation()
  {

    $evaluation_result = "Sample evaluation result text";
    return view('/reviewEvaluation', compact('evaluation_result'));
   // return view('/reviewEvaluation');
  }
//To Display only status with pending review assign page
  public function reviewAssign()
  {
    $users = User::role(
      'Lubricant Evaluator'
      )->get();

  
      $companyDetails = CompanyDetail::where('status', 'pending')->paginate(6);
  
      return view('reviewAssign', compact('companyDetails','users'));
  }
  // public function reviewAssign()
  // {
  //     // Get all users with the 'Lubricant Evaluator' role
  //     $users = User::role('Lubricant Evaluator')->get();
  
  //     // Get company details with 'pending' status
  //     $companyDetails = CompanyDetail::where('status', 'pending')->paginate(8);
  
  //     // Filter company details for each user based on the policy
  //     $companyDetailsForUser = $companyDetails->filter(function ($companyDetail) {
  //         // Use the policy to check if the current user can view this company detail
  //         return auth()->user()->can('viewAssigned', $companyDetail);
  //     });
  
  //     return view('reviewAssign', compact('companyDetailsForUser', 'users'));
  // }
  
  
  //to display only for approved aplications in reportLTC Page
  public function reportLTC()
  {
    $users = User::role(
      'Lubricant Evaluator'
      )->get();
      // Fetch company details along with related lubricant details and supporting documents where status is 'Approved'
      $companyDetails = CompanyDetail::where('status', 'Approved')
                          ->with(['lubricantDetails'])
                          ->paginate(6);
  
      return view('reportLTC', compact('companyDetails', 'users'));
  }
  
  
  

public function showAll($id)
{
    // Retrieve the company by ID, including related models
    $company = CompanyDetail::with(['contactPeople', 'lubricantDetails', 'supportingDocuments'])->findOrFail($id);

    // Pass the company data to the view
    return view('content.pages.single-page', compact('company'));
}


//For email
public function updateStatus(Request $request, $id)
{
    // Find the company record
    $company = CompanyDetail::findOrFail($id);

    // Update status
    $status = $request->input('status'); // 'Approved' or 'Rejected'
    $company->status = $status;
    $company->save();

    // Send email notification
    Mail::to($company->email)->send(new CompanyStatusMail($company, $status));

    return redirect()->back()->with('success', 'Status updated and email sent!');
}

public function showEvaluationForm($id)
{
    // Fetch checklist items and details for the given company ID
    $checklistItems = ChecklistItem::all(); // Fetch all checklist items (or specific to company if applicable)

    $companyDetails = CompanyDetail::findOrFail($id);

    return view('evaluateLubricant', compact('checklistItems', 'companyDetails'));
}

public function submitEvaluation(Request $request, $id)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'checklist.*.response' => 'required|string', // Yes/No field
        'checklist.*.remark' => 'nullable|string',  // Remarks field
        'recommendation' => 'required|string',       // Overall recommendation
    ]);

    // Loop through checklist items and update their responses and remarks
    foreach ($request->checklist as $itemId => $data) {
        ChecklistItem::where('id', $itemId)->update([
            'response' => $data['response'],
            'remark' => $data['remark'],
        ]);
    }

    // Store overall recommendation if needed
    $company = CompanyDetail::findOrFail($id);
    $company->recommendation = $request->recommendation;
    $company->save();

    return redirect()->back()->with('success', 'Evaluation submitted successfully!');
}





//for LTC Secretary
// public function showApplications()
// {
//     $applications = [
//         (object) [
//             'application_no' => 'APP12345',
//             'trade_name' => 'Lubricant X',
//             'performance_level' => 'API CF',
//             'brand' => 'Brand A',
//             'certification_name' => 'ISO 9001',
//             'approval_status' => 'Pending'
//         ],
//         (object) [
//             'application_no' => 'APP12346',
//             'trade_name' => 'Lubricant Y',
//             'performance_level' => 'GL-4',
//             'brand' => 'Brand B',
//             'certification_name' => 'ISO 14001',
//             'approval_status' => 'Approved'
//         ],
//     ];

//     return view('reportLTC', compact('applications'));
// }

public function showUserRoles($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Get all roles assigned to the user
    $roleNames = $user->getRoleNames(); // Returns a collection of role names

    return view('role', compact('user', 'roleNames'));
}

public function assignCompanyToUser(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'company_id' => 'required|exists:company_details,id',
    ]);

    // Log the validated data to see what is received
    \Log::info('Assign Company Data:', $validated);

    try {
        // Find the user and company
        $user = User::findOrFail($validated['user_id']);
        $company = CompanyDetail::findOrFail($validated['company_id']);

        // Log the fetched user and company
        \Log::info('User found:', ['user' => $user]);
        \Log::info('Company found:', ['company' => $company]);

        // Assign the company to the user
        $company->user()->associate($user);
        $company->save();

        // Log the success message
        \Log::info('Company successfully assigned to user:', ['user' => $user, 'company' => $company]);

        return response()->json([
            'message' => 'Company successfully assigned to ' . $user->first_name,
            'user' => $user->id,
            'company' => $company->id,
        ], 200);
    } catch (\Exception $e) {
        // Log any error that occurs
        \Log::error('Error assigning company to user', ['error' => $e->getMessage()]);

        return response()->json(['error' => 'An error occurred while assigning the company.'], 500);
    }
}


//for inertia
// public function index()
// {
//     return Inertia::render('Dashboard');
// }

public function profile()
{
    return Inertia::render('Profile');  // Inertia view component, not a Blade view
}



//FOR REAPPLY
public function requestModification()
{
    return view('content.pages.request-modification');
}





  public function home()
  {
    return view('content/pages/pages-home');
  }
  
}
