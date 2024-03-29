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
      $permissions = Permission::all();
      $writePermissions = $permissions->where('type','write')->merge($permissions->where('type','delete'));

      //if you want a custom name displayed on the permissions table write it in this array as 'current name'=>'custom name'
      $readableNames = ['f_name'=>'first name','membership_no'=>'membership no.','id_passport_no'=>'id or passport number',
                        'member_certified_id'=>'member id', 'pop'=>'proof of payment','date_payment'=>'date of payment',
                        'nok'=>'next of kin', 'nok_id'=>'next of kin id'];

      $tables = ['members','miscs','next_of_kin','home_addresses','beneficiaries','areas','documents','post_addresses','subscriptions'];
      $listNum = 5;
      return view('dashboard.admins',compact('admins','permissions','writePermissions','tables','readableNames','listNum'));
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
    {//function when storing NEW admn to database
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
        'id_number'=> request()->id_number,
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
    {//function when updating admin
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
        $admin->status = 'Blocked';
        $admin->save();
        //$userData->delete();
      }

      return redirect('admins');
    }

}
