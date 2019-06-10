<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\district;
use App\division;

class userscontroller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    //
    public function dashboard()
    {
      // code...
      $user=Auth::user();
      return view('pages.user.dashboard',compact('user'));
    }
    public function profile()
    {
      $district=district::orderBy('name','asc')->get();
        $division=division::orderBy('prority','asc')->get();
      // code...
      $user=Auth::user();
      return view('pages.user.profile',compact('user','division','district'));
    }
    public function updateprofile(Request $request)
    {
        $user=Auth::user();
      $this->validate($request,[
        'first_name' => 'required|string| max:255',
          'last_name' => 'required|string|max:255',

        'email' => 'required|string |email|max:255|unique:users,email,'.$user->id,
          'division_id' => 'required',
            'district_id' => 'required',
              'phone_no' => 'required|unique:users,phone_no,'.$user->id,
                'street_address' => 'required',
        


      ]);

      $user->first_name=$request->first_name;
      $user->last_name=$request->last_name;

      $user->email=$request->email;
      $user->division_id=$request->division_id;
      $user->district_id=$request->district_id;
      $user->phone_no=$request->phone_no;
      $user->street_address=$request->street_address;
      if($request->password !=NULL || $request->password!="")
      {
                    $user->password = Hash::make($request->password);
      }
      $user->ip_address=request()->ip();
      $user->save();





      return back();
    }
}
