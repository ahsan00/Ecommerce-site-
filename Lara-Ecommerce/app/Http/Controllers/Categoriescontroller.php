<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class Categoriescontroller extends Controller
{


  public function index()
  {

    // code...
  }


  public function showcategory($id)
  {
    $category=category::find($id);
    if(!is_null($category))
    {
      return view('pages.catagories.show',compact('category'));
    }
    // code...
  }
    //
}
