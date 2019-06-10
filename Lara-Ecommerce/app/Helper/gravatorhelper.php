<?php
namespace App\Helper;

class gravatorhelper
{
  public static function validate_gravator ($email)
  {

    $hash=md5($email);
    $uri='https://www.gravatar.com/avatar/'.$hash.'?d=404';
    $header=@get_headers($uri);
    if(!preg_match("|200|",$header[0]))
    {

     $has_valid_gravator=FALSE;

    }
    else {
       $has_valid_gravator=TRUE;
    }
    return $has_valid_gravator;
    // code...
  }
  public static function gravator_image($email,$size=0,$d="")
  {
    $hash=md5($email);
    $image_uri='https://www.gravatar.com/avatar/'.$hash.'?s='.$size.'&d='.$d;
    return $image_uri;
    // code...
  }
}
