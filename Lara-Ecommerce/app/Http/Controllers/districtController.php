<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\division;
use App\district;
class districtController extends Controller
{
  public function manageproduct()
  {
    // code...
    $district=district::orderBy('name','asc')->get();
    return view('admin.pages.district.index')->with('district',$district);
  }
  public function create()
  {
    // code...
      $division=division::orderBy('prority','asc')->get();

    return view('admin.pages.district.create',compact('division'));

  }
public function delete($id)
{
  $district=district::find($id);
  if(!is_null($district))
  {
//if it is parent category delete all of it sub category_id

    $district->delete();





}


//delete category_id

  return redirect()->route('admin.district');

  // code...
}
public function productedit($id)
{
  $division=division::orderBy('prority','asc')->get();
  $district=district::find($id);
//  return view('admin.pages.category.edit')->with('maincategory','category',$main_category,  $category);
 return view('admin.pages.district.edit',compact('district','division'));
  // code...
}
public function update(Request $request,$id)
{
  $this->validate($request,[
  'name'=>'required|string',
  'division_id'=>'required',
  ]);

  $district=district::find($id);
  $district->name=$request->name;
  $district->division_id=$request->division_id;


  $district->save();

      return redirect()->route('admin.district');
  // code...
}


  public function store(Request $request)
  {
    $this->validate($request,[
    'name'=>'required|string',
    'division_id'=>'required',
    ]);

    $district=new district();
    $district->name=$request->name;
    $district->division_id=$request->division_id;
    $district->save();

        return redirect()->route('admin.district');


    // code...
  }//
}
