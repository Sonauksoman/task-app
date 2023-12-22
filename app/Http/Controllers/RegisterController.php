<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   public function registerView(){

    return view('user.register');

   }
   public function registerSubmit(Request $request): RedirectResponse{


         $validator = Validator::make($request->all(), [
          'name' => 'required|min:3|max:50',
          'email' => 'email:rfc,dns|unique:users,email',
          'confirm_password' => 'required_with:password|same:password|min:6' 
        ]);
  
      if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
      }


   $user= new User();
   $user->name=$request->name;
   $user->email=$request->email;
   $user->password=Hash::make($request->password);
   $user->save();

   session()->flash('success', 'Sucessfully Registered To TasK Web');           
   return redirect('/register');

 }
}
