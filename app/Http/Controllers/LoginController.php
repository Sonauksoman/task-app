<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function loginView(){

    return view('user.login');

   }

   public function loginSubmit(Request $request){

    $this->validate($request, [
        'email' => 'email:rfc,dns',
        'password'  =>  'required|min:6',
    ]); 
    
    $input= $request->only('email','password'); 
    if(auth()->attempt($input,request()->remember_me)){

        session()->flash('success', 'Welcome To TasK Web');           
        return redirect('/task');
        
     }

     session()->flash('error', 'Incorrect Email Or Password');           
     return redirect('/');
}
}
