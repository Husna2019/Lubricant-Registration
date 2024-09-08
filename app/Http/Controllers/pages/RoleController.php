<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\ContactPerson;
use App\Models\LubricantDetail;
use App\Models\Role;
use App\Models\Supporting_documents;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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

  public function index()
  {
    $roles = Role::all();
    return view('content/pages/companies', compact('roles'));
  }


  public function create(Request $request)
  {
    //validate form data

    // dd($request->all());
    //for company details
    $validateData = $request->validate([
      'name' => 'required|string',
      'description' => 'required|string',
    ]);

    //dd($validateData);

    //create a new company instance

    $roles = new Role;
    $roles->name = $validateData['name'];
    $roles->description = $validateData['description'];
    $roles->created_by = Auth::id();

    return redirect()->back()->with('success', 'Role added');
  }







  public function edit()
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
