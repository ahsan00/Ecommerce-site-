<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\User;

class verifycontroller extends Controller
{
  public function verify($token)
  {
    $user=User::where('remember_token',$token)->first();
    $user->status=1;
    $user->remember_token =NULL;
      $user->save();
    session()->flash('sucess','you are logged sucess fully');
    return redirect('login');
    // code...
  }
    //
}
