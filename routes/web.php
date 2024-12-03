<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\pages\RegLubricantController;
use App\Http\Controllers\UserController;
use App\Exports\CompanyDetailsPDFExport;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Route

Route::get('/', function () {
  $pageConfigs = ['myLayout' => 'blank'];
  return view('auth.login', ['pageConfigs' => $pageConfigs]);
});

// Route::get('/login', function () {
//   $pageConfigs = ['myLayout' => 'blank'];
//   return view('auth.login', ['pageConfigs' => $pageConfigs]);
// });

Route::get('/auth/register', function () {
  $pageConfigs = ['myLayout' => 'blank'];
  return view('auth.register', ['pageConfigs' => $pageConfigs]);
});

Route::get('/password/reset', function () {
  $pageConfigs = ['myLayout' => 'blank'];
  return view('auth.passwords.email', ['pageConfigs' => $pageConfigs]);
});


Route::get('/home', [HomePage::class, 'index'])->name('dashboard');

Auth::routes();

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages


Route::get('/pages/single-page/{id}', [RegLubricantController::class, 'showAll'])->name('single-page');

Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/company-details', [RegLubricantController::class, 'companyDetails'])->name('company-details');
Route::get('/re-apply/{id}', [RegLubricantController::class, 'reapply'])->name('applications.re-apply');
Route::get('/view-result', [RegLubricantController::class, 'viewResult'])->name('view-result');
//nimeongeza
//Route::get('/viewApplication', [RegLubricantController::class, 'viewApplication'])->name('viewApplication');
Route::get('/notification', [RegLubricantController::class, 'notification'])->name('notification');
Route::get('/pages/pages-home', [RegLubricantController::class, 'home'])->name('home');


//za permission

//Route::get('/appyRegistration', [RegLubricantController::class, 'appyRegistration'])->name('appyRegistration');
Route::get('/assignReceive', [RegLubricantController::class, 'assignReceive'])->name('assignReceive');
//Route::get('/evaluateLubricant/{id}', [RegLubricantController::class, 'evaluateLubricant'])->name('evaluateLubricant');
///


Route::get('/reviewEvaluation', [RegLubricantController::class, 'reviewEvaluation'])->name('reviewEvaluation');
Route::get('/reviewAssign', [RegLubricantController::class, 'reviewAssign'])->name('reviewAssign');



//FOR ROLES


// Route to update the role
Route::put('/content/user/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

// Route to show the user index
Route::get('/content/user/index', [UserController::class, 'index'])->name('users.index');



Route::get('/content/user/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/content/user/{id}/assign-role', [UserController::class, 'assignRoleForm'])->name('users.assignRoleForm');
Route::post('/content/user/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');




//create new view + model + migration for submiting data

Route::post('/submit', [RegLubricantController::class, 'submit'])->name('submit');

Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::patch('/users/update', [UserController::class, 'update'])->name('users.update');


Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/viewAddedUser/{id}', [UserController::class, 'edit'])->name('users.viewAddedUser');

Route::post('/company/{id}/update-status', [RegLubricantController::class, 'updateStatus'])->name('company.updateStatus');

//Checklist
Route::get('/evaluateLubricant/{id}', [RegLubricantController::class, 'showEvaluationForm'])->name('evaluateLubricant');
//Route::get('/evaluate-lubricant/{id}', [RegLubricantController::class, 'showEvaluationForm'])->name('evaluateLubricant');
Route::post('/evaluateLubricant/{id}', [RegLubricantController::class, 'submitEvaluation'])->name('submitEvaluation');

//for LTC Secretary
Route::get('/reportLTC', [RegLubricantController::class, 'reportLTC'])->name('reportLTC');
Route::get('/applications/download', [RegLubricantController::class, 'downloadApplications'])->name('applications.download');

// Route::middleware(['auth', 'role:admin,LTC Secretary'])->group(function () {
//   Route::get('/ltc-report', function () {
//       return view('reportLTC');
//   })->name('ltc-report');
// });


Route::get('/{id}/role', [RegLubricantController::class, 'showUserRoles'])->name('role');
//Route::get('/reviewAssign', [RegLubricantController::class, 'showAssignDropdown'])->name('assign-dropdown');

//Assiugn to evaluator
Route::post('/assign-company', [RegLubricantController::class, 'assignCompanyToUser']);



//Export pff

Route::get('/download-pdf', [CompanyDetailsPDFExport::class, 'downloadPDF'])->name('download-pdf');


//for profile
Route::get('/user/app', [RegLubricantController::class, 'profile']);



//FOR REAPPLY

Route::get('/content/pages/request-modification', [RegLubricantController::class, 'requestModification'])->name('request-modification');





// Route::get('/', [LoginBasic::class, 'index'])->name('login');
//Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
//Route::get('/pages/companies', [RegLubricantController::class, 'companies'])->name('companies');
// Route::get('pages/contactPerson', [RegLubricantController::class, 'contactPerson'])->name('contactPerson');
// Route::get('pages/LubricantDetails', [RegLubricantController::class, 'LubricantDetails'])->name('LubricantDetails');
// Route::get('pages/SupportingDocuments', [RegLubricantController::class, 'SupportingDocuments'])->name('SupportingDocuments');

// authentication
//Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
//Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
