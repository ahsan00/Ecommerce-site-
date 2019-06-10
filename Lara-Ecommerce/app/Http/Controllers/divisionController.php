<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\division;
use App\district;

class divisionController extends Controller
{
  public function manageproduct()
  {
    // code...
    $division=division::orderBy('prority','asc')->get();
    return view('admin.pages.division.index')->with('division',$division);
  }
  public function create()
  {
    // code...

    return view('admin.pages.division.create');

  }
public function delete($id)
{
  $division=division::find($id);
  if(!is_null($division))
  {
//if it is parent category delete all of it sub category_id
//delete all district under this divisions
$district=district::where('division_id',$division->id)->get();
foreach ($district as $district) {
  // code...
  $district->delete();
}

    $division->delete();





}


//delete category_id

  return redirect()->route('admin.division');

  // code...
}
public function productedit($id)
{
  $division=division::find($id);
//  return view('admin.pages.category.edit')->with('maincategory','category',$main_category,  $category);
 return view('admin.pages.division.edit',compact('division'));
  // code...
}
public function update(Request $request,$id)
{
  $this->validate($request,[
  'name'=>'required|string',
  'prority'=>'required',
  ]);

  $division=division::find($id);
  $division->name=$request->name;
  $division->prority=$request->prority;


  $division->save();

      return redirect()->route('admin.division');
  // code...
}


  public function store(Request $request)
  {
    $this->validate($request,[
    'name'=>'required|string',
    'prority'=>'required',
    ]);

    $division=new division();
    $division->name=$request->name;
    $division->prority=$request->prority;
    $division->save();

        return redirect()->route('admin.division');


    // code...
  }

    //
}
