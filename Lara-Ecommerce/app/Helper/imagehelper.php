<?php
namespace App\Helper;

 use App\User;
 use App\Helper\gravatorhelper;
class imagehelper
{
  public static function getuserimage($id)
  {
    $user=User::find($id);
    $avatar_url="";
    if(!is_null($user))
    {
      if($user->avatar==NULL)
      {
        if(gravatorhelper::validate_gravator($user->email))
        {
          $avatar_url=gravatorhelper::gravator_image($user->email,100);
        }
        else {
            $avatar_url=url('images\default\user.png');
          // code...
        }
      }


    }
    else {
    }
    return   $avatar_url;
    // code...
  }




}
