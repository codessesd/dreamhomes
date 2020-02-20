<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function all()
    {
      $admins = Admin::all();
      return view('dashboard.admins',compact('admins'));
    }

    public function addAdmin(Request $request)
    {
     
     $validator = Validator::make($request->all(),[
        'name' => 'required',
        'surname' => 'required',
        'contact' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'admin_level' => 'required|numeric|max:2',
      ]);

      if ($validator->fails())
      {
        $errors = collect($validator->errors()->all());
        $errors->put('type','error');

        return $errors;
      }
      
     $existingAdmin = User::where('email',request()->email)->first();
      if ($existingAdmin->isEmpty)
      {
        storeAdminToDatabase();
        return response()->json([
          'type'=>'success',
          'message' => 'Saved Successfully!']);
      }
      else
        //return ['message'=>'hello all'];
        return response()->json([
          'type'=>'error',
          'message' => 'Admin with the same email already exists']);
    }

    public function storeAdminToDatabase()
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
      Admin::create($adminData);
    }
}
