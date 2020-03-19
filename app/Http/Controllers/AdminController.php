<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function show()
    {
      $admins = Admin::all();
      $permissions = Permission::orderBy('entity','ASC')
                               ->orderBy('attribute','ASC')
                               ->orderBy('type','ASC')
                               ->get();
      //dd($permissions);
      return view('dashboard.admins',compact('admins','permissions'));
    }

    public function addAdmin(Request $request)
    {
      request()['admin_level'] = 1; //Set default admin_level. Current implementation only requires admin level 1;
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'surname' => 'required',
        'contact' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8'
      ]);

      if ($validator->fails())
      {
        $errors = collect($validator->errors()->all());
        $errors->put('type','error');

        return $errors;
      }

      $existingAdmin = User::where('email',request()->email)->first();
      if ($existingAdmin == null )
      {
        $this->storeToDatabase();
        return response()->json([
          'type'=>'success',
          'message' => 'Saved Successfully!']);
      }
      else
        return response()->json([
          'type'=>'error',
          'message' => 'Admin with the same email already exists']);
    }

    public function storeToDatabase()
    {
      $remember_token = hash('sha256',rand(0,999999999));
      $hashedPassword = bcrypt(request()->password);

      $userData =
      [
        'email'=>request()->email,
        'password' => $hashedPassword,
        'admin_level' => request()->admin_level,
        'remember_token' => $remember_token
      ];

      $newUser = User::create($userData);

      $adminData =
      [
          'id' => $newUser->id,
          'user_id' => $newUser->id,
          'name' => request()->name,
          'surname' => request()->surname,
          'contact' => request()->contact,
          'level' => request()->admin_level,
          'status' => 'Active'
      ];
      $admin = Admin::create($adminData);
      $admin->permissions()->sync(request()->writePermissions);//Oh, how I love this piece of code here
    }

    public function updateAdmin(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'surname' => 'required',
          'contact' => 'required',
        ]);
      $validator->sometimes('password','min:8',function($request){
        return strlen($request->password) > 0;
      });

      if ($validator->fails())
      {
        $errors = collect($validator->errors()->all());
        $errors->put('type','error');

        return $errors;
      }
      $userToUpdate = User::where('email',request()->email)->first();
      if ($userToUpdate != null )
      {
        $this->adminToDatabase($userToUpdate);
        return response()->json([
          'type'=>'success',
          'message' => 'Saved Successfully!']);
      }
      else
        return response()->json([
          'type'=>'error',
          'message' => 'Admin with this email does not exist']);
    }

    public function adminToDatabase($userToUpdate)
    {
      //$remember_token = hash('sha256',rand(0,999999999));
      $hashedPassword = bcrypt(request()->password);
      if(strlen(request()->password)>=8)
      {//only change password if present
        $userToUpdate->password = $hashedPassword;
        $userToUpdate->save();
      }

      $adminData =
      [
          'name' => request()->name,
          'surname' => request()->surname,
          'contact' => request()->contact,
      ];
      $admin = $userToUpdate->admin;
      $admin->update($adminData);
      $admin->permissions()->sync(request()->writePermissions);//Oh, how I love this piece of code here
    }

    public function deleteAdmin($id)
    {
      $admin = Admin::find($id);
      $userData = User::find($id);

      if($admin->level != 4)
      {
        $admin->permissions()->detach();
        $admin->delete();
        $userData->delete();
      }

      return redirect('admins');
    }

}
