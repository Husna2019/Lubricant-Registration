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


Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/company-details', [RegLubricantController::class, 'companyDetails'])->name('company-details');
Route::get('/re-apply', [RegLubricantController::class, 'reapply'])->name('re-apply');
Route::get('/view-result', [RegLubricantController::class, 'viewResult'])->name('view-result');
Route::get('/notification', [RegLubricantController::class, 'notification'])->name('notification');
Route::get('/pages/pages-home', [RegLubricantController::class, 'home'])->name('home');

//create new view + model + migration for submiting data

Route::post('/submit', [RegLubricantController::class, 'submit'])->name('submit');

Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::patch('/users/update', [UserController::class, 'update'])->name('users.update');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');






// Route::get('/', [LoginBasic::class, 'index'])->name('login');
//Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
//Route::get('/pages/companies', [RegLubricantController::class, 'companies'])->name('companies');
// Route::get('pages/contactPerson', [RegLubricantController::class, 'contactPerson'])->name('contactPerson');
// Route::get('pages/LubricantDetails', [RegLubricantController::class, 'LubricantDetails'])->name('LubricantDetails');
// Route::get('pages/SupportingDocuments', [RegLubricantController::class, 'SupportingDocuments'])->name('SupportingDocuments');

// authentication
//Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
//Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
