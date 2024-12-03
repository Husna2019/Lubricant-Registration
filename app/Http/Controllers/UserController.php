<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::all();
    $notVerified = $users->where('email_verified_at', '')->count();
    $verified = $users->where('email_verified_at', '!=', '')->count();

    $usersCount = $users->count();
    return view('content/user/index', compact('users', 'usersCount', 'notVerified', 'verified'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request);
    $validateData = $request->validate(
      [

        'email' => 'required|string|email',
        'password' => 'required|string',
        'username' => 'required|string',
        'middle_name' => '',
        'first_name' => 'required|string',
        'surname' => 'required|string',
        'gender' => 'required|in:Male,Female',

      ]
    );
    // dd($validateData);
    User::create($validateData);
    return redirect()->back()->withSuccess('User Created Successfull');
    
  }

  /**
   * Display the specified resource.
   */
  

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
    $user = User::findOrFail($id);
    return view('/content/user/edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validateData = $request->validate(
      [

        'email' => 'required|string|email',
        'username' => 'required|string',
        'middle_name' => '',
        'first_name' => 'required|string',
        'surname' => 'required|string',
        'gender' => 'required|in:Male,Female',
      ]
    );

    $user = User::find($id);
    if ($user) {
      $user->email = $request->email;
      $user->username = $request->username;
      $user->middle_name = $request->middle_name;
      $user->first_name = $request->first_name;
      $user->surname = $request->surname;
      $user->gender = $request->gender;
    }
    $user->save();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }


   //FOR ROLES
   
   // Show role assignment form
  
       // Show user details
      
           // Show user details
           public function show($id)
           {
               $user = User::findOrFail($id);
              // return view('content.user.show', compact('user'));
             return redirect()->route('users.show', $user->id)->with('success', 'Role assigned successfully');
             // return response()->json(['message' => 'Role assigned successfully']);
           }
           
       
           // Show role assignment form
           public function assignRoleForm($id)
           {
               $user = User::findOrFail($id);
               $roles = Role::all(); // Retrieve all roles
               $permissions = Permission::all(); // Assuming permissions are retrieved similarly

               return view('content.user.assign-role', compact('user', 'roles', 'permissions'));
              // return view('content.user.assign-role', compact('user', 'roles'));
           }
       
           // Handle role assignment
           public function assignRole(Request $request, $id)
           {
               $user = User::findOrFail($id);
       
               $request->validate([
                   'role' => 'required|exists:roles,name',
               ]);
       
               // Assign the selected role
               $user->assignRole($request->role);
       
              //  return redirect()->route('users.show', $user->id)->with('success', 'Role assigned successfully');
              }       
   
       // Update user role
       public function updateRole(Request $request, $id)
       {
           $user = User::findOrFail($id);
   
           $request->validate([
               'role_id' => 'required|exists:roles,id',
           ]);
   
           // Sync the selected role
           $user->roles()->sync([$request->role_id]);
   
           return redirect()->route('users.index')->with('success', 'Role assigned successfully.');
       }
   
       // Show user index
      
   
   

  
}
